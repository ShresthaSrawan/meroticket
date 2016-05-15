<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Owner extends Base_Model implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait;

    protected $table = 'owner';

    protected $hidden = array('password', 'remember_token');
    // public function bus()
    // {
    //     return $this->hasMany('Bus');
    // }

    public static $rules = array(
        'companyname'=>'required|min:2|unique:owner',
        'ownername'=>'required|alpha_dash|min:2',
        'email'=>'required|email|unique:owner',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12',
        'contact_number'=>'required|between:9,10',
        'address'=>'required|min:2|'
    );

    public static $messages = array(
        'companyname.required' => 'You forgot to provide Company Name. Please don\'t try to fool Mero Ticket ',
        'companyname.unique' => 'The company you entered is already got partnership agreement with Mero Ticket. Please don\'t try to fool us.',
        'companyname.min:2' => 'Company Name should have more than two character but you provided less than/equal to two character.',
        'ownername.required' => 'You forgot to provide Owner Name. Please don\'t try to fool Mero Ticket ',
        'email.required' => 'Mero Ticket requires your email address',
        'email.unique' => 'This email is already registered in Mero Ticket.',
        'password.required' => 'You forgot to provide you secret password',
        'password_confirmation.required' => 'You need to provide you passord confirmation',
        'contact_number.required' => 'You forgot to provide Contact Number.',
        'address.required' => 'You forgot to provide Company Address. Please don\'t try to fool Mero Ticket '
    );
}