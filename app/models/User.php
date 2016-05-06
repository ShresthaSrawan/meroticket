<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Base_Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public static $rules = array(
        'firstname'=>'required|alpha|min:2',
        'lastname'=>'required|alpha|min:2',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

    public static $messages = array(
        'email.required' => 'Mero Ticket requires your email address',
        'firstname.required' => 'Please provide your first name to Mero Ticket',
        'lastname.required' => 'Please provide your full last name to Mero Ticket',
        'password.required' => 'You have to set a password',
        'password_confirmation.required' => 'Oops! Two password did not match'
    );

}
