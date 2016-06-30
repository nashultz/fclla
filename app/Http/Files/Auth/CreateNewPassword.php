<?php

namespace FCLLA\Http\Files\Auth;

use FCLLA\User;

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
        $this->user->update('password', $temppass);
        $this->user->save();
        return $this->sendPassEmail($temppass);
    }

    public function sendPassEmail($newPass)
    {
        $u = array('newPass'=>$newPass, $this->user->toArray);
        dd($u);
        Mail::send('emails.tempuserpass', $this->user,  function($m) use ($u) {
            $m->from('info@fclla.org', 'Faulkner County Landlord Association');
            $m->to($u['email'], $u['username'])->subject('FCLLA User Credentials');
            $m->bcc('nashultz07@gmail.com', 'Nathon Shultz');
        });
    }
}
