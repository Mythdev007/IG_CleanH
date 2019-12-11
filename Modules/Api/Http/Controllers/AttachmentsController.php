<?php


namespace Modules\Api\Http\Controllers;


use App\Http\Controllers\Controller;
use Cog\Contracts\Ownership\Ownable;
use Illuminate\Http\Request;
use Modules\Api\Traits\CompanyTrait;
use Modules\Api\Traits\RespondTrait;
use Modules\Core\Notifications\GenericNotification;
use Modules\Platform\Core\Helper\FileHelper;
use Modules\Platform\Core\Http\Requests\AttachmentRequest;
use Modules\Platform\Core\Repositories\AttachmentsRepository;
use Modules\Platform\Core\Traits\ModuleOwnableTrait;
use Modules\Platform\Notifications\Entities\NotificationPlaceholder;
use Modules\Platform\User\Entities\User;

class AttachmentsController extends Controller
{

    use RespondTrait, ModuleOwnableTrait, CompanyTrait;


    private $attachmentRepository;

    public function __construct(AttachmentsRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;

        $this->middleware(['jwt.auth']);
    }


    /**
     * Delete attachment
     *
     * @param Request $request
     * @return array
     */
    public function deleteAttachment(Request $request)
    {

        $this->checkCompanyContext();

        $user = \Auth::user();

        $entityId = $request->get('entityId');
        $entityClass = $request->get('entityClass');
        $entityClass = str_replace('&quot;', '', $entityClass);
        $entityClass = str_replace('"', '', $entityClass);

        $key = $request->get('key');


        $entity = app($entityClass)->find($entityId);

        if ($entity != null) {
            $attachment = $entity->attachment($key);


            if ($attachment != null) {
                $result = $attachment->delete();

                if ($result) {
                    return $this->respond(true, [], [], ['message' => trans('core::core.attachment_deleted')]);

                } else {
                    return $this->respond(false, [], ['error' => 'error_while_deleting_attachment'], ['message' => trans('core::core.error_while_deleting_attachment')]);
                }

            }else{
                return $this->respond(false, [], ['error'=>'file_not_found'], ['message' => trans('core::core.file_not_found')]);
            }
        } else {

            return $this->respond(false, [], ['error' => 'entity_not_found'], ['message' => trans('core::core.entity_not_found')]);
        }
    }

    /**
     * Get attachments
     * @param Request $request
     * @return array
     */
    public function getAttachments(Request $request)
    {
        $this->checkCompanyContext();

        $user = \Auth::user();

        $entityClass = $request->get('entityClass');
        $entityId = $request->get('entityId');

        $entityClass = str_replace('&quot;', '', $entityClass);
        $entityClass = str_replace('"', '', $entityClass);

        $entity = app($entityClass)->find($entityId);

        if ($entity != null) {
            $files = [];

            foreach ($entity->attachments as $attachment) {
                $files[] = $this->prepareAttachment($attachment, $entity, $entityId);
            }

            return $this->respond(true, ['files' => $files]);

        }

        return $this->respond(true, ['files' => [

        ]]);

    }

    /**
     * Prepare
     * @param $attachment
     * @param $entity
     * @param $entityId
     * @return array
     */
    private function prepareAttachment($attachment, $entity, $entityId)
    {
        $entityId = $entity->id;


        return [

            'url' => $attachment->url,
            'thumbnailUrl' => FileHelper::displayAttachmentIcon($attachment),
            'name' => $attachment->filename,
            'type' => $attachment->filetype,
            'size' => $attachment->filesize,
            'delete_key' => $attachment->key,

        ];
    }

    /**
     * Upload attachment
     *
     * @param AttachmentRequest $request
     * @return array
     */
    public function uploadAttachments(AttachmentRequest $request)
    {
        $this->checkCompanyContext();

        $user = \Auth::user();


        if (!$user->isAdmin()) {

            if ($user->company != null && $user->company->storage_limit != null && $user->company->storage_limit > 0) {

                $allFileSize = $this->attachmentRepository->countFileSizeForCompany($user->company); // count file sizes

                if ($allFileSize >= $user->company->storage_limit) {

                    return $this->respond(false, [], [
                        'error' => 'you_exceeded_storage_please_switch_plan'
                    ], ['message' => trans('core::core.you_exceeded_storage_please_switch_plan', ['gigs' => $user->company->storage_limit])]);

                }
            }

        }

        $entityClass = $request->get('entityClass');
        $entityId = $request->get('entityId');

        $entityClass = str_replace('&quot;', '', $entityClass);
        $entityClass = str_replace('"', '', $entityClass);

        $entity = app($entityClass)->find($entityId);

        $path = $request->get('path');

        if ($entity != null) {

            $params = [];

            if ($user->company != null && $user->company->id != null) {
                $params = [
                    'company_id' => $user->company_id
                ];
            }

            $attachment = $entity->attach(\Request::file('files'), $params);


            $files[] = $this->prepareAttachment($attachment, $entity, $entityId);

            if (config('vaance.attachment_notification_enabled')) { // Check if attachment notification is enabled
                if ($entity instanceof Ownable) { // Entity is ownable and we can send notification

                    if ($entity->getOwner() instanceof User) {

                        if ($entity->getOwner()->id != \Auth::user()->id) { // Dont send notification for myself
                            try {
                                $commentOn = $entity->name;
                                $commentOn = ' ' . trans('core::core.on') . ' ' . $commentOn;
                            } catch (\Exception $exception) {
                                $commentOn = '';
                            }

                            $placeholder = new NotificationPlaceholder();

                            $placeholder->setRecipient($entity->getOwner());
                            $placeholder->setAuthorUser($user);
                            $placeholder->setAuthor($user->name);
                            $placeholder->setColor('bg-deep-orange');
                            $placeholder->setIcon('attach_file');
                            $placeholder->setContent(trans('notifications::notifications.new_attachment', ['user' => $user->name]) . $commentOn);

                            $placeholder->setUrl($path);

                            $entity->getOwner()->notify(new GenericNotification($placeholder));
                        }
                    }
                }
            }

            return $this->respond(true, ['files' => $files], [], ['message' => trans('core::core.attachment_uploaded')]);
        } else {
            return $this->respond(true, [], [
                'error' => 'entity_not_found'
            ], ['message' => trans('core::core.entity_not_found')]);
        }
    }

}
