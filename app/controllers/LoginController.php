<?php 

class LoginController extends BaseController{
	
	public function doLogin(){
		return View::make('users.login');
	}

	public function logout(){
		Auth::user()->logout();
		Auth::admin()->logout();
		Auth::owner()->logout();
		return Redirect::to('/login');
	}

	public function post_login(){
    	// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		    );

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::route('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		    } else {

			    // create our user data for the authentication
		    	$userdata = array(
		    		'email'     => Input::get('email'),
		    		'password'  => Input::get('password')
		    		);
			    // attempt to do the login
		    	if (Auth::admin()->attempt($userdata)) {
			    	// validation successful!
			        // redirect them to the secure section
		    		return Redirect::to('admin/dashboard');

		    	}else if (Auth::owner()->attempt($userdata)){

		    		if(Auth::owner()->get()->status==2) {
			    	// validation successful!
			        // redirect them to the secure section
		    			return Redirect::to('owner/dashboard');
		    		}
		    		else{
		    			Auth::owner()->logout();
		    			return Redirect::to('/login')->withMessage('Login Failed. Your account has not been verified yet.');
		    			
		    		}

		    	}else if (Auth::user()->attempt($userdata)) {
			        // validation successful!
			        // redirect them to the secure section
		    		if(Session::has('redirect_url')){
		    			$redirect_url = Session::pull('redirect_url');
		    			return Redirect::to($redirect_url);
		    		}else{
		    			$result = DB::table('route')->select('id', 'from', 'to')->get();

		    			return Redirect::route('home')->with('results', $result);
		    		} 
		    	}else{
		    		return Redirect::route('login')->withMessage('Username or Password is invalid');

		    	}		        

		    }
		}
	}
	?>