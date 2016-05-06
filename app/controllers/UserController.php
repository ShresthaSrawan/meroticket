<?php

class UserController extends BaseController{
    public $restful = true;

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function get_registration(){
        return View::make('users.register');
    }

    public function post_create(){

        $validator = Validator::make(Input::all(), User::$rules, User::$messages);

        if ($validator->passes()) {
            // validation has passed, save user in DB

            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
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

    public function get_profile()
    {
        return View::make('users.account');
    }

    public function login(){
        return View::make('users.login');
    }

    public function post_login()
    {
        
        $input = Input::all();
        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if(Session::has('redirect_url')){
                $redirect_url = Session::pull('redirect_url');
                return Redirect::to($redirect_url);
            }
            else{
                return Redirect::to('/');
            }
        }else{
            return View::make('users.login')->withMessage('Username or Password is Incorrect')
                ->withClass('alert alert-dismissible alert-danger')
                ->withHeader('Oh snap!');
        }

    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}