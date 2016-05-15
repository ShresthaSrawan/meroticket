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
        'username'=>'required|alpha_dash|unique:users|min:2',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

    public static $messages = array(
        'email.required' => 'Mero Ticket requires your email address',
        'firstname.required' => 'Please provide your first name to Mero Ticket',
        'lastname.required' => 'Please provide your full last name to Mero Ticket',
        'username.required' => 'Please provide your username to Mero Ticket',
        'username.unique' => 'The username is already taken. Pleas enter a different username.',
        'password.required' => 'You have to set a password',
        'password.confirmed' => 'Oops! Two password did not match',
        'password_confirmation.required' => 'Please provide you password confirmation'
    );

    public static function getAllBooking(){
        
        $results = DB::table('booking')
            ->join('booking_details', 'booking.booking_details_id','=','booking_details.id')
            ->join('route', 'route.id','=', 'booking_details.route_id')
            ->where('booking.user_id','=', Auth::user()->get()->id)
            ->select('booking.id AS bookingid', 'route.from', 'route.to', 'booking.total_passenger', 'total_price', 'booking.date')
            ->get();

        if($results){
            return $results;
        }else{
            return false;
        }
    }

    public static function getUserDetails(){
        $id = Auth::user()->get()->id;

        $results = DB::table('users')->where('id','=', $id)->select('id', 'firstName', 'lastName', 'userName', 'email')->get();
        
        if($results){
            return $results;
        }else{
            return false;
        }
    }

}
