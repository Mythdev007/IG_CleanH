<?php

namespace Modules\Platform\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Krucas\Settings\Facades\Settings;
use Modules\Platform\Core\Http\Controllers\AppBaseController;
use Modules\Platform\Core\Repositories\AttachmentsRepository;
use Modules\Platform\User\Repositories\UserRepository;

class SettingsController extends AppBaseController
{

    private $attachmentRepo;

    private $userRepo;

    public function __construct(AttachmentsRepository $repository, UserRepository $userRepository)
    {
        parent::__construct();

        $this->attachmentRepo = $repository;
        $this->userRepo       = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();
        $company = $user->company;

        if($company == null ){
            $company = session()->get('currentCompany');
        }

        return view('settings::index')
            ->with('company',$company)
            ->with('companyFileSize',$this->attachmentRepo->countFileSizeForCompanyFormatted($company))
            ->with('currentUsers',   $this->userRepo->countUsersForCompany($company))
            ->with('cron_last_run',Settings::get('cron_last_run',null));
    }
}
