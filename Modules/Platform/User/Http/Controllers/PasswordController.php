<?php

namespace Modules\Platform\User\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Modules\Platform\User\Entities\User;
use Illuminate\Support\Facades\Validator;
use Modules\PolizzaCar\Entities\PolizzaCar;


class PasswordController extends Controller
{

    public function edit($verificationToken)
    {
        $user = User::where('verification_token', $verificationToken)->firstOrFail();
        return view('auth.passwords.set', compact('user'));
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validator->fails()) {
            //return view('index')->with('signflag', 'signup')->withErrors($validator);
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('verification_token', $request->verification_token)->firstOrFail();

        $user->password = bcrypt($request->password);
        // $user->status_id = 2; // From Invited to Active
        // $user->email_verified_at = \Carbon\Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
        // $user->updated_at = $user->created_at;
        $user->verification_token = '';
        $user->save();

        // $importModel = ImportModel::where('linked_user_id', $user->id)->first();
        //if ($importModel) {
        //    $importModel->update([
        //        'status_id' => 3
        //    ]);
        //}

        \Auth::login($user);

        $polizzaCar = PolizzaCar::where('company_email', $user->email)->firstOrFail();
        
        return redirect()->route('polizzacar.polizzacar.show', ['polizzacar' =>$polizzaCar->id]);

        //return redirect()->route('password.edit', ['verification_token' => $request->verification_token])
        //    ->withMessage(trans('core::core.password_changed_successfully'));
    }

}
