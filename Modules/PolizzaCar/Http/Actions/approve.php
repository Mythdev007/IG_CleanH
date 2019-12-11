<?php 

namespace Modules\PolizzaCar\Http\Actions;

use Modules\PolizzaCar\Entities\PolizzaCar;
use Modules\Platform\User\Entities\User;
use App\Notifications\UserInvitationNotification;
use Illuminate\Support\Str;
use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use Modules\Platform\Notifications\Entities\NotificationPlaceholder;

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

        // when the record is approved by Admin or Supervisor

        $polizza = PolizzaCar::find($entity->id);

        $user = auth()->user();

        activity()
            ->causedBy($user)
            ->performedOn($polizza)
            ->log('CAR Request Approved');

        //check if the user already exists
        $existingUsersEmails = User::pluck('email')->toArray();

        if (!in_array($entity->company_email, $existingUsersEmails)) 
        {
            $user = User::create([
                'first_name'            => $entity->company_name,
                'email'                  => $entity->company_email,
                'password'               => bcrypt(Str::random(8)),
                'verification_token'     => Str::random(64)
            ]);

            $user->roles()->attach(5);
            // user created with role 5

            // $user->notify(new UserInvitationNotification($polizza, 'invite'));
            //user notified with email where he will set password

            
            $polizza = PolizzaCar::find($entity->id);

            $user = auth()->user();

            activity()
                ->causedBy($user)
                ->performedOn($polizza)
                ->log(trans('PolizzaCar::PolizzaCar.invite_sent_with_login'));

            flash(trans('PolizzaCar::PolizzaCar.invite_sent_with_login'))->success();
            // notification on screen

        } else {

            // the user exists so it will be notified
            $setWho = $polizza->company_email;

            \Notification::route('mail', $setWho)
                ->notify(new UserInvitationNotification($polizza, 'send_to_contractor')); 

                $user = User::where('email', $polizza->company_email)->first();

                $messaggio = 'Preventivo n. '. $entity->id .' - '. $entity->company_name .' approvato. In attesa di Documenti Firmati.';
                
                $placeholder = new NotificationPlaceholder();
                $placeholder->setRecipient($user);
                $placeholder->setContent($messaggio);

                $placeholder->setColor('bg-green');
                $placeholder->setIcon('assignment');
                $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));
                
                // $user->notify(new GenericNotification($placeholder));

                $Supervisor = User::where('id', 2)->first();


                $messaggio = 'Preventivo n. '. $entity->id .' - '. $entity->company_name .' approvato. In attesa di Documenti firmati.';
    
                $placeholder = new NotificationPlaceholder();
                $placeholder->setContent($messaggio);
                $placeholder->setRecipient($Supervisor);

                $placeholder->setColor('bg-green');
                $placeholder->setIcon('assignment');
                $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));
    
                // $Supervisor->notify(new GenericNotification($placeholder));

                $polizza = PolizzaCar::find($entity->id);

                $user = auth()->user();

                activity()
                    ->causedBy($user)
                    ->performedOn($polizza)
                    ->log(trans('PolizzaCar::PolizzaCar.invite_sent'));
                
                flash(trans('PolizzaCar::PolizzaCar.invite_sent'))->success();
        }

        $polizza->update([
            'status_id'      => 3, // Waiting Signed Documents
        ]);

        // $procurement = PolizzaCarProcurement::where('id', $entity->procurement_id)->first();
        // $procurement->update([
        //     'has_policy'      => 1, // mark as used so it can't be reused
        // ]);

        // $procurement = PolizzaCarProcurement::where('id', $entity->procurement_id)->first();
        $procurement = PolizzaCarProcurement::where('id', $entity->procurement_id)->first();
        if($procurement) {
            $procurement->update([
                'insurance_policy' => $polizza->id, // mark as used so it can't be reused
            ]);
        }
        
