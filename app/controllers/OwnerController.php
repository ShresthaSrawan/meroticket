<?php
// Owner controller extending base controller which extends the eloquent class
class OwnerController extends BaseController{

    //To load owner dashboard
    public function getOwnerIndex(){
        return View::make('admin.busOwner.dashboard');
    }

    // To view owner registration view
	public function get_owner_registration(){
        return View::make('admin.busOwner.register');
    }

    //To add registration details in database
    public function post_owner_registration(){
    	
    	$validator = Validator::make(Input::all(), Owner::$rules, Owner::$messages);

        if ($validator->passes()) {
            // validation has passed, save owner in DB
            $adminemail = DB::table('admin')->select('email')->get();

            

            $owner = new Owner;
            $owner->companyname = Input::get('companyname');
            $owner->ownername = Input::get('ownername');
            $owner->email = Input::get('email');
            $owner->password = Hash::make(Input::get('password'));
            $owner->contact_number = Input::get('contact_number');
            $owner->address = Input::get('address');
            $owner->save();

            return View::make('admin.busOwner.register')->withMessage('Thank You for registering in Mero Ticket, we will get back to you shortly');

        } else {
            // validation has failed, display error messages

            return Redirect::route('getOwnerRegistration')
                ->withInput()
                ->withMessage('Oh Snap! Following error has been occured.')
                ->withErrors($validator);


        }
    } 

    //To load add bus type view
    public function getAddBusType(){
        return View::make('admin.busOwner.bus_type.addBusType');
    }
    
    public function postAddBusType(){

        $validator = Validator::make(Input::all(), Bus_Type::$rules, Bus_Type::$rulesMessages);

        if($validator->fails()){
            return Redirect::route('getAddBusType')->withErrors($validation)->withInput();
        }else{

            $bus_type = new Bus_Type;
            $bus_type->name = Input::get('name');
            $bus_type->status = 1;
            $bus_type->save();

            return Redirect::route('getAddBusType')
                ->with('message', 'Bus type has been successfully added.');
        }
    }

    public function viewBusType(){
        return View::make('admin.busOwner.bus_type.viewBusType')->with('busTypes', Bus_Type::getbustype());
    }

    public function editBusType(){
        $input = Input::all();
        $bustype = Bus_Type::find($input['id']);
        $bustype->name = $input['bustypename'];
        $bustype->save();

        return View::make('admin.busOwner.bus_type.viewBusType')->with('message', 'Bus Type has been successfully updated.')->with('busTypes', Bus_Type::getbustype());
    }
    public function deleteBusType(){
        $id = Input::get('bustypeid');

        $bustype = Bus_Type::find($id);
        $bustype->status = 0;
        $bustype->save(); 

        return View::make('admin.busOwner.bus_type.viewBusType')->with('message', 'Bus Type has been successfully deleted.')->with('busTypes', Bus_Type::getbustype());

    }

    //To get add bus view
    public function getAddBus(){

        $busType_info = Bus_Type::select('id','name')->get();

        return View::make('admin.busOwner.bus.addBus')->with('busType_info', $busType_info);
    }

    //To add bus
    public function postAddBus(){
        $input = Input::all();

        $validator = Validator::make($input, Bus::$addBusRules, Bus::$addBusMessages);

        if($validator->fails()){

            $busType_info = Bus_Type::select('id','name')->get();

            return View::make('admin.busOwner.bus.addBus')->withErrors($validator)->with('busType_info', $busType_info);
        }

        $bustype = $input['bustype'];
        $busname = $input['busname'];
        $busnumber = $input['busnumber'];
        $image = $input['image'];
        $front = $input['frontseat'];
        $sidea = $input['sideA'];
        $sideb = $input['sideB'];
        $back = $input['backseat'];
        $description = $input['description'];
        $owner_id = Auth::owner()->id();

        $destinationPath = 'img/uploads'; // upload path
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $fileName = date('Y-m-d H:m:s').'.'.$extension; // renameing image
        $image->move($destinationPath, $fileName); // uploading file to given path

        $newimage = $destinationPath.$fileName;

        $bus = new Bus;
        $bus->name = $busname;
        $bus->image = $newimage;
        $bus->number = $busnumber;
        $bus->description = $description;
        $bus->owner_id = $owner_id;
        $bus->bus_type_id = $bustype;
        $bus->fs = $front;
        $bus->a = $sidea;
        $bus->b = $sideb;
        $bus->bs = $back;
        $bus->status = 1;
        $bus->created_at = date('Y-m-d H:m:s');
        $bus->updated_at = date('Y-m-d H:m:s');
        $bus->save();

        return Redirect::route('getAddBus')->with('message','Bus has been successfully added.');
    }

    //To view and edit bus
    public function viewBus(){
        $results = DB::table('bus')
            ->join('owner','owner.id','=','bus.owner_id')
            ->join('bus_type','bus_type.id','=','bus.bus_type_id')
            ->where('bus.status','=','1')
            ->select(
                'bus.name AS busname','bus.number AS busnumber','bus.description AS busdescription',
                'owner.companyname','bus_type.name AS bustype_name','bus.id AS busid',
                'bus_type.id AS bustypeid', 'bus.image AS busimage','bus.fs AS front', 'bus.a AS sideA', 'bus.b AS sideB', 'bus.bs AS back'
            )
            ->get();
        $types = DB::table('bus_type')->select('id AS bustypeid','name AS bustypename')->get();

        return View::make('admin.busOwner.bus.viewBus')->with('results', $results)->with('bustypes', $types);
    }

    //To edit bus information
    public function postEditBus(){
        $input = Input::all();

        $busid = $input['id'];
        $ownerid = Auth::owner()->id();
        $busname = $input['busname'];
        $bustype = $input['bustype'];
        $busnumber = $input['busnumber'];
        $description = $input['description'];

        $bus = Bus::find($busid);
        $bus->bus_name = $busname;
        $bus->owner_id = $ownerid;
        $bus->bustype_id = $bustype;
        $bus->number = $busnumber;
        $bus->description = $description;
        $bus->save();
        

        return Redirect::route('viewBus')->with('message', 'Bus edit has been successfully done');
    }

    //To delete bus temporarly
    public function postDeleteBus(){
        $input = Input::all();

        $busid = $input['id'];

        $bus = Bus::find($busid);
        $bus->status = 0;
        $bus->save();

        $message = "Bus has been successfully deleted";
        return Redirect::route('viewBus')->with('message', $message);
    }

    // To get add route view
    public function getAddRoute(){
        $cities = City::getAllCity();
        return View::make('admin.busOwner.route.addRoute')->with('cities', $cities);

    }

    //To add value to 'from' and 'to' into database
    public function addRoute(){

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), RouteModel::$rules, RouteModel::$messages);

        if ($validator->fails()) {
            return Redirect::route('getAddRoute')
                ->with('errormessage', $validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }else {
// 
            // create our user data for the authentication
            $input = Input::all();

            $from = $input['from'];
            $to = $input['to'];

            if(ucfirst($from)==ucfirst($to)){
                return Redirect::route('getAddRoute')->with('errormessage', 'You can not add two same destination.');
            }

            $route = new RouteModel;
            $route->from = $from;
            $route->to = $to;
            $route->status = 1;
            $route->save();
            
            return Redirect::route('getAddRoute')->with('message','Route has been successfully added');            
        }
    }

    public function getViewRoute(){

        $results = RouteModel::where('status','=','1')->select('id', 'from', 'to')->get();

        return View::make('admin.busOwner.route.viewRoute')->with('results', $results);

    }

    // This methis will edit the  route
    public function postEditRoute(){
        $input = Input::all();

        $routeid = $input['routeid'];
        $from = $input['from'];
        $to = $input['to'];

        // Insert date into route table
        $route = RouteModel::find($routeid);
        $route->from = $from;
        $route->to = $to;
        $route->save();

        // Now redirecting to view
        return Redirect::route('getViewRoute')->with('message', 'Route has been successfully edited');
    }

    // This method will temporarly delete the route
    public function postDeleteRoute(){
        $input = Input::all();

        $routeid = $input['routeid'];

        // Insert date into route table
        $route = RouteModel::find($routeid);
        $route->status = 0;
        $route->save();

        $message = "Route has been successfully deleted";
        return Redirect::route('getViewRoute')->with('message', $message);
    }

    //To render add feature
    public function getAddFeature(){

        $results = Feature::where('status','=','1')->select('id', 'name')->get();
        return View::make('admin.busOwner.feature.feature')->with('results', $results);
    }

    //To edit feature
    public function postFeature(){

        $validator = Validator::make(Input::all(), Feature::$rules, Feature::$messages);

        if ($validator->fails()) {

            return Redirect::route('getAddFeature')                
                ->withErrors($validator) // send back all errors to the login form 
                ->with('errormessage', 'Something is wrong!!')               
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
                
        }else {

            $input = Input::all();

            $featurename = $input['feature'];

            $feature_name = Feature::select('name')->get();

            if($feature_name!==null || ucwords($feature_name)==ucwords($featurename)){
                return Redirect::route('getAddFeature')->with('errormessage', 'Feature is invalid');
            }else{

                $feature = new Feature;
                $feature->name = $featurename;
                $feature->status = 1;
                $feature->save();


                $results = Feature::where('status','=','1')->select('id', 'name')->get();
                
                return Redirect::route('getAddFeature')->with('results', $results);
            }
        }
    }

    //To edit feature
    public function postEditFeature(){
        
        $input = Input::all();

        $id = $input['id'];
        $featurename = $input['feature'];

        $feature = Feature::find($id);
        $feature->name = $featurename;
        $feature->save();

        return Redirect::route('getAddFeature')->with('message', 'Edit has been successfully done');
    }

    //To delete the feature
    public function postDeleteFeature(){
        
        $input = Input::all();
        $featureid = $input['id'];


        $feature = Feature::find($featureid);
        $feature->status = 0;
        $feature->save();

        return Redirect::route('getAddFeature')->with('message','Feature has been Successfully deleted');
    }

    //To get add bus feature view
    public function getAddBusFeature(){

        $bus = Bus::where('status','=',1)->select('id', 'name')->get();
        $feature = Feature::where('status','=',1)->select('id', 'name')->get();
        
        if($bus==null){

            return View::make('admin.busOwner.busFeature.addBusFeature')->with('errormessage', 'You have not added any bus yet');

        }elseif($feature==null){

            return View::make('admin.busOwner.busFeature.addBusFeature')->with('errormessage', 'You have not added any feature yet.');

        }else{

            return View::make('admin.busOwner.busFeature.addBusFeature')->with('buses', $bus)->with('features', $feature);    
        }         
    }

    //To add bus feature in database
    public function postAddBusFeature(){


        $input = Input::all();

        $bus = $input['bus'];
        $feature = $input['feature'];
        if($bus=='0'){

            return Redirect::route('getAddBusFeature')->with('errormessage', 'Please select the Bus');
        
        }elseif($feature=='0'){

            return Redirect::route('getAddBusFeature')->with('errormessage', 'Please select the bus feature');   
        }else{

            $busFeature = new Bus_Feature;
            $busFeature->feature_id = $feature;
            $busFeature->bus_id = $bus;
            $busFeature->save();

            $bus = Bus::where('status','=',1)->select('id', 'name')->get();
            $feature = Feature::where('status','=',1)->select('id', 'name')->get();

            return Redirect::route('getAddBusFeature')->with('buses', $bus)->with('features', $feature)->with('message', 'Bus feature has been successfully added.');
        }
    }

    //To view bus feature and edit
    public function getViewBusFeature(){
       
        $buses = DB::table('bus')->where('status','=', '1')->select('id')->get();
        $feature = DB::table('feature')->where('status','=', '1')->select('id')->get();

        $result = Bus_Feature::getBusFeatureDetails($buses, $feature);

        if($feature==null){

            return View::make('admin.busOwner.busFeature.viewBusFeature')->with('errormessage', 'You have not added any bus feature yet.');

        }elseif($buses==null){

            return View::make('admin.busOwner.busFeature.viewBusFeature')->with('errormessage', 'You have not added any bus yet.');

        }elseif($result==null){

            return View::make('admin.busOwner.busFeature.viewBusFeature')->with('errormessage', 'You have not added any feature to any bus yet.');

        }        
        else{

            return View::make('admin.busOwner.busFeature.viewBusFeature')->with('results', $result);    
        }   
    }

    //To set ticket booking date for bus
    public function getSetBookingDate(){

        $bus = Bus::where('status','=','1')->select('id', 'name')->get();
        $route = RouteModel::where('status','=','1')->select('id', 'from', 'to')->get();

        
        return View::make('admin.busOwner.booking.setBookingDate')->with('buses', $bus)->with('routes', $route);    

    } 

    public function postSetBookingDate(){

        $validator = Validator::make(Input::all(), booking_details::$rules, booking_details::$rulesMessages);

        if($validator->fails()){

            return Redirect::route('getSetBookingDate')->withErrors($validator)->withInput();

        }

        $input = Input::all();

        $busid = $input['bus'];
        $routeid = $input['route'];
        $date = $input['date'];
        $time = $input['time'];
        $seatlimit = $input['seatlimit'];
        $ticket_price = $input['ticket_price'];
        $kid = $input['kid'];
        $student = $input['student'];
        $old = $input['old'];
        $below10 = $input['below10'];
        $below50 = $input['below50'];
        $below100 = $input['below100'];


        $booking_details = new booking_details;
        $booking_details->bus_id = $busid;
        $booking_details->route_id = $routeid;
        $booking_details->date = $date;
        $booking_details->time = $time;
        $booking_details->seatLimit = $seatlimit;
        $booking_details->ticket_price = $ticket_price;
        $booking_details->discount_kid = $kid;
        $booking_details->discount_student = $student;
        $booking_details->discount_elder = $old;
        $booking_details->luggage_below_10 = $below10;
        $booking_details->luggage_below_50 = $below50;
        $booking_details->luggage_below_100 = $below100;
        $booking_details->status = 1;
        $booking_details->save();

        $bus = Bus::where('status','=','1')->select('id', 'name')->get();
        $route = RouteModel::where('status','=','1')->select('id', 'from', 'to')->get();

        return Redirect::route('getAddBookingDate')->with('buses', $bus)->with('routes', $route)->with('message','Booking date has been successfully set.');
    }

    public function viewBookingDate(){

        $results = booking_details::getAllBookingDate();

        $buses = DB::table('bus')->where('status','=','1')->select('id', 'name')->get();
        $routes = DB::table('route')->where('status','=','1')->select('id', 'from', 'to')->get();

        return View::make('admin.busOwner.booking.viewBookingDate')->with('results',$results)->with('buses', $buses)->with('routes', $routes);

    }

    public function postEditBookingDate(){
        $input = Input::all();

        $id = $input['id'];
        $busid = $input['bus'];
        $routeid = $input['route'];
        $date = $input['date'];
        $ticket_price = $input['ticket_price'];
        $kid = $input['kid'];
        $student = $input['student'];
        $old = $input['elder'];
        $below10 = $input['luggage10'];
        $below50 = $input['luggage50'];
        $below100 = $input['luggage100'];


        //To inserting into table
        $booking_details = booking_details::find($id);
        $booking_details->bus_id = $busid;
        $booking_details->route_id = $routeid;
        $booking_details->date = $date;
        $booking_details->ticket_price = $ticket_price;
        $booking_details->discount_kid = $kid;
        $booking_details->discount_student = $student;
        $booking_details->discount_elder = $old;
        $booking_details->luggage_below_10 = $below10;
        $booking_details->luggage_below_50 = $below50;
        $booking_details->luggage_below_100 = $below100;
        $booking_details->save();

        return Redirect::route('viewBookingDate')->with('message', 'Edit has been successfully done.')->with('results', booking_details::getAllBookingDate());
    }

    public function postDeleteBookingDate(){
        $input = Input::all();

        $id = $input['id'];
        

        $booking_details = booking_details::find($id);
        $booking_details->status = 0;
        $booking_details->save();

        return Redirect::route('viewBookingDate')->with('message', 'Booking Date has been successfully deleted.')->with('results', booking_details::getAllBookingDate());
    }

    public function getBookingConfirmation(){
        
        $results = Booking::getAllBooking();

        return View::make('admin.busOwner.booking.confirmBooking')->with('results', $results); 
    }

    public function postConfirmBooking(){
        $input = Input::all();

        $bookingid = $input['bookingid'];
        
        $booking = Booking::find($bookingid);
        $booking->status = 2;
        $booking->save();

        $results = Booking::getAllBooking();
        return Redirect::route('viewBookingConfirmation')->with('message', 'Booking has been successfully confirmed.')->with('results', $results);
    }

    public function postCancelBooking(){
        $input = Input::all();

        $bookingid = $input['bookingid'];
        
        $booking = Booking::find($bookingid);
        $booking->status = 0;
        $booking->save();

        $results = Booking::getAllBooking();
        return Redirect::route('viewBookingConfirmation')->with('message', 'Booking has been successfully canceled.')->with('results', $results);
    }




// -----------------------------------------------------------------------------------------------------------------------------------------------


    //To add bus type information in database
    public function postAddBusTypee(){
        // validate the info, create rules for the inputs
        $rules = array(
            'image' => 'image' // make sure the email is an actual email
            
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('getAddBusType')->with('message','Something went wrong')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }else {
        
            $input = Input::all();

            $destinationPath = 'images/uploads/'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $input['image']->move($destinationPath, $fileName)->resize(468, 249); // uploading file to given path

            $image = $destinationPath.$fileName;
// Image::make($image->getRealPath())->resize(468, 249)->save('imges/uploads/'.$filename);
            $busTypeName = $input['bustypename'];
            $ticketPrice = $input['ticketprice'];
            $totalSeat = $input['totalseat'];
            $fs = $input['frontseat'];
            $bs = $input['backseat'];
            $sideA = $input['sideAseat'];
            $sideB = $input['sideBseat'];

            //insert data into table once it is ready
            DB::table('bus_type')->insert(
                array(

                    'busType_name' => $busTypeName,
                    'image' => $image,
                    'ticket_price' => $ticketPrice,
                    'total_seat' => $totalSeat,
                    'front_seat' => $fs,
                    'back_seat' => $bs,
                    'side_a' => $sideA,
                    'side_b' => $sideB

                )
            );
            //once the data is saved in database then load the view
            return Redirect::route('getAddBusType')->with('message','Bus Type has been successfully added.');

        }      

    }

   
 
    

    

    //to get view of edit, delete and update
    public function getViewBusDetails(){
        $results = DB::table('bus')
            ->join('owner','owner.id','=','bus.owner_id')
            ->join('bus_type','bus_type.id','=','bus.bustype_id')
            ->where('bus.status','=','1')
            ->select('bus.bus_name','bus.bus_number','bus.description','owner.companyname','bus_type.bustype_name','bus.id AS busid','bus_type.id AS bustypeid')
            ->get();
        $types = DB::table('bus_type')->select('id','bustype_name')->get();

        return View::make('admin.busOwner.bus.viewBus')->with('results',$results)->with('bustypes',$types);
    }    
        
}