<?php

class UserController extends BaseController{
    public $restful = true;

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    // To get registration 
    public function get_registration(){
        return View::make('users.register');
    }
    
    // To add the registration info into database
    public function post_create(){

        $validator = Validator::make(Input::all(), User::$rules, User::$messages);

        if ($validator->passes()) {
            // validation has passed, save user in DB

            $user = new User;
            $user->firstName = Input::get('firstname');
            $user->lastName = Input::get('lastname');
            $user->userName = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return View::make('users.login')->withMessage('You have successfully register yourself to Mero Ticket. Please Sign In')
                ->withClass('alert alert-dismissible alert-success')
                ->withHeader('Well Done!');

        } else {
            // validation has failed, display error messages

            return Redirect::route('register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // To get user profile view
    public function get_profile()
    {
        $records = User::getAllBooking();

        if($records==null){

        }
        return View::make('users.account');
    }

    // To get edit user profile
    public function getEditUserProfile(){
        
        $results = User::getUserDetails();
        
        return View::make('users.accountSetting')->with('results', $results);
    }

    // To add edited value into database
    public function postEditUserProfile(){
        $input = Input::all();

        $validator = Validator::make($input, User::$rules, User::$messages);

        if($validator->passes()){

            $user = User::find($input['userid']);
            $user->firstName = Input::get('firstname');
            $user->lastName = Input::get('lastname');
            $user->userName = Input::get('username');
            $user->email = Input::get('email');
            $user->save();
        
        }else{
            $results = User::getUserDetails();

            return View::make('users.accountSetting')->with('results', $results)->withInput()
                ->withErrors($validator);
        }
    }

    // To get terms and condition
    public function getTermsAndCondition(){
        $tm = Terms_Condition::getTermsAndCondition();
        return View::make('TM.termsAndCondition')->with('tds', $tm);
    }

    // To get privacy policy
    public function getPrivacyPolicy(){
        $pp = Privacy_Policy::getAllPrivacyPolicy();

        if($pp){
            return View::make('pp.privacy_policy')->with('PPs', $pp);
        }else{
            return View::make('pp.privacy_policy')->with('message', 'Hello there! We are very glad to see you here. Unfortunetly Privacy Policy of Mero Ticket is not currently available :(');
        }
    }

    //To get all booking for user
    public function viewUserBookingHistory(){
        $result = User::getAllBooking();

        if($result){
            return View::make('users.viewAllBooking')->with('results', $result);
        }
    }

}