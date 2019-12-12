<?php 

namespace Modules\PolizzaCar\Http\Actions;

use Modules\Platform\Core\Datatable\ActivityLogDataTable;
        
        if ($this->permissions['browse'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['browse'])) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        $repository = $this->getRepository();

        $entity = $repository->find($identifier);


        $this->entity = $entity;

        if (empty($entity)) {
            flash(trans('core::core.entity.entity_not_found'))->error();

            return redirect(route($this->routes['index']));
        }

        if ($this->blockEntityOwnableAccess()) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        $this->entityIdentifier = $entity->id;

        $this->entity = $entity;

        $this->beforeShow(request(), $entity);

        if (request('mode') == 'json') {
            return response()->json($this->entity);
        }

        $view = view('polizzacar::show');

        $view->with('entity', $entity);
        $view->with('show_fields', $this->showFields);
        $view->with('show_fileds_count', count($this->showFields));

        $view->with('next_record', $repository->next($entity));
        $view->with('prev_record', $repository->prev($entity));
        $view->with('disableNextPrev', $this->disableNextPrev);

        $this->setupCustomButtons();
        $this->setupActionButtons();
        $view->with('customShowButtons', $this->customShowButtons);
        $view->with('actionButtons',$this->actionButtons);
        $view->with('commentableExtension', false);
        $view->with('actityLogDatatable', null);
        $view->with('attachmentsExtension', true);
        $view->with('entityIdentifier', $this->entityIdentifier);


        $view->with('hasExtensions', false);

        $view->with('relationTabs', $this->setupRelationTabs($entity));

        $view->with('baseIcons', $this->baseIcons);

        /*
         * Extensions
         */

        if (in_array(self::COMMENTS_EXTENSION, class_uses($this->entity))) {
            $view->with('commentableExtension', true);
            $view->with('hasExtensions', true);
        }
        if (in_array(self::ACTIVITY_LOG_EXTENSION, class_uses($this->entity))) {
            $activityLogDataTable = \App::make(ActivityLogDataTable::class);
            $activityLogDataTable->setEntityData(get_class($entity), $entity->id);
            $view->with('actityLogDatatable', $activityLogDataTable->html());
            $view->with('hasExtensions', true);
        }
        if (in_array(self::ATTACHMENT_EXTENSION, class_uses($this->entity))) {
            $view->with('attachmentsExtension', true);
            $view->with('hasExtensions', true);
        }

        /*
         * add pdf parts.
         */
        if (!empty($entity->pdf_signed_contract) || !empty($entity->pdf_payment_proof)) {
            $view->with('hasPdfs', true);
            $pdfshowFields = [
                'signed_pdf' => [
                    'pdf_signed_contract' => [
                        'type' => 'aTag',
                        'col-class' => 'col-lg-5 col-md-5 col-sm-5 col-xs-5',
                        'href' => route('polizzacar.polizzacar.showPDF', ['pdf'=>$entity->pdf_signed_contract]),
                    ],
                    'pdf_payment_proof' => [
                        'type' => 'aTag',
                        'col-class' => 'col-lg-5 col-md-5 col-sm-5 col-xs-5',
                        'href' => route('polizzacar.polizzacar.showPDF', ['pdf'=>$entity->pdf_payment_proof]),
                    ],
                ],
            ];
            $view->with('pdfshowFields', $pdfshowFields);
        } else {
            $view->with('hasPdfs', false);
        }

        \JavaScript::put([
            'polizza_Id' => $entity->id,
        ]);