<?php

namespace FCLLA\Http\Files\Auth;

use FCLLA\User;
use Illuminate\Support\Facades\Mail;

class CreateNewPassword
{
    public $user;
    /**
     * CreateNewPassword constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = User::findOrFail($user->id);
    }

    public function create()
    {
        $temppass = str_random(10);
        $newPass = bcrypt($temppass);
        $this->user->update(['password' => $newPass]);
        $this->user->save();
        return $this->sendPassEmail($temppass);
    }

    public function sendPassEmail($newPass)
    {
        $data = array('newPass'=>$newPass, 'user'=>$this->user);
        Mail::send('emails.tempuserpass', $data,  function($m) use ($data) {
            $m->from('info@fclla.org', 'Faulkner County Landlord Association');
            $m->to($data['user']->email, $data['user']->name)->subject('FCLLA User Credentials');
            $m->bcc('nashultz07@gmail.com', 'Nathon Shultz');
        });
    }
}
