<?php 

class AdminController extends BaseController{
    public $restful = true;

    public function getAdminIndex(){
        return View::make('admin.superAdmin.dashboard');
    }

    public function getConfirmationView(){
    	$results = DB::table('owner')->where('status','=','1')->get();

    	return View::make('admin.superAdmin.confirmOwner')->with('results', $results);
    }

    public function postConfirmationView(){

    	$input = Input::all();

    	$ownerid = $input['ownerid'];

    	$owner = Owner::find($ownerid);
		$owner->status = 2;
		$owner->save();

		return Redirect::route('getConfirmationView')->with('message','Owner has been successfully confirmed.');
    }

    public function postDeleteConfirmation(){

    	$input = Input::all();

    	$ownerid = $input['ownerid'];

    	$owner = Owner::find($ownerid);
		$owner->status = 0;
		$owner->save();

		return Redirect::route('getConfirmationView')->with('message','Owner has been successfully deleted.');
    }

    public function viewAllOwner(){

    	$results = DB::table('owner')->get();
    	$pending = DB::table('owner')->where('status','=','1')->get();
    	$confirmed = DB::table('owner')->where('status','=','2')->get();
    	$deleted = DB::table('owner')->where('status','=','0')->get();

    	return View::make('admin.superAdmin.viewOwner')
    		->with('results', $results)
    		->with('pendingowner', $pending)
    		->with('confirmedowner',$confirmed)
    		->with('deletedowner', $deleted);
    }

    //To get add cities view
    public function getAddCities(){
        return View::make('admin.superAdmin.city.addCities');
    }

    //To post cities into database
    public function postAddCities(){
        $input = Input::all();

        $validator = Validator::make($input, City::$rules, City::$messages);

        if($validator->fails()){
            return Redirect::route('getAddCities')->withErrors($validator)->with('errormessage', 'You did something wrong');
        }

        $addCity = City::addCity($input);

        if($addCity){
            return Redirect::route('getAddCities')->with('message', 'City has been successfully added.');
        }
    }

    public function getViewAddCities(){
        $results = City::getAllCity();

        return View::make('admin.superAdmin.city.viewCities')->with('results', $results);
    }

    //To edit city
    public function postEditAddCity(){

        $cityid = Input::get('id');
        $cityname = Input::get('city');

        $editcity = City::editAddCities($cityid, $cityname);

        if($editcity){
            return Redirect::route('getViewAddCities')->with('message', 'City has been successfully edited.')->with('results', City::all());
        }
    }

    //To move to trash
    public function postDeleteAddCity(){
        $cityid = Input::get('cityid');

        $editcity = City::deleteAddCities($cityid);

        if($editcity){
            return Redirect::route('getViewAddCities')->with('message', 'City has been successfully moved to trash.')->with('results', City::all());
        }
    }

    // To get add terms and condition page
    public function getAddTermsAndCondition(){
        return View::make('admin.superAdmin.termsAndCondition.addTermsAndCondition');
    }

    // TO post terms and condition into table
    public function postAddTermsAndCondition(){
        $input = Input::all();

        $validator = Validator::make($input, Terms_Condition::$rules, Terms_Condition::$messages);

        if($validator->fails()){
            
            return Redirect::route('getTermsAndCondition')->withErrors($validator);
        }

        $header = $input['header'];
        $description = $input['description'];

        Terms_Condition::addTermsAndCondition($header, $description);

        $message = "Terms and Condition has been successfully added.";
        return Redirect::route('getTermsAndCondition')->with('message', $message);
    }

    // To get view page of terms and condition
    public function getViewTermsAndCondition(){
        $result = Terms_Condition::where('status','=','1')->get();

        if($result==null){
            return View::make('admin.superAdmin.termsAndCondition.viewTermsAndCondition')->with('errormessage', 'You have not added any terms and condition yet.');
        }
        
        return View::make('admin.superAdmin.termsAndCondition.viewTermsAndCondition')->with('results', $result);
    }

    // To edit terms and condition
    public function postEditTermsAndCondition(){
        $id = Input::get('id');
        $header = Input::get('header');
        $description = Input::get('description');

        $edit = Terms_Condition::editTermsAndCondition($id, $header, $description);

        if($edit){
            $result = Terms_Condition::where('status','=','1')->get();

            $message = "Edit has been successfully done.";
            return Redirect::route('getViewTermsAndCondition')->with('results', $result)->with('message', $message);
        }
    }

    // To delete terms and condition
    public function postDeleteTermsAndCondition(){
        $id = Input::get();

        $delete = Terms_Condition::deleteTermsAndCondition($id);

        if($delete){
            $result = Terms_Condition::where('status','=','1')->get();

            $message = "Terms and Condition has been successfully removed from database.";
            return Redirect::route('getViewTermsAndCondition')->with('results', $result)->with('message', $message);
        }
    }

    // To get add privacy policy page
    public function getAddPrivacyPolicy(){
        return View::make('admin.superAdmin.privacyPolicy.addPrivacyPolicy');
    }

    // TO post terms and condition into table
    public function postAddPrivacyPolicy(){

        $input = Input::all();

        $validator = Validator::make($input, Privacy_Policy::$rules, Privacy_Policy::$messages);

        if($validator->fails()){
        
            return Redirect::route('getAddPrivacyPolicy')->withErrors($validator);
        }

        $header = $input['header'];
        $description = $input['description'];

        Privacy_Policy::addPrivacyPolicy($header, $description);

        $message = "Privacy Policy has been successfully added.";
        return Redirect::route('getAddPrivacyPolicy')->with('message', $message);
    }

    // To get view page of terms and condition
    public function getViewPrivacyPolicy(){
        $result = Privacy_Policy::where('status','=','1')->get();

        if($result==null){
            return View::make('admin.superAdmin.privacyPolicy.viewPrivacyPolicy')->with('errormessage', 'You have not added any Privacy Policy yet.');
        }
        
        return View::make('admin.superAdmin.privacyPolicy.viewPrivacyPolicy')->with('results', $result);
    }

    // To edit terms and condition
    public function postEditPrivacyPolicy(){

        $id = Input::get('id');
        $header = Input::get('header');
        $description = Input::get('description');

        $edit = Privacy_Policy::editPrivacyPolicy($id, $header, $description);

        if($edit){
            $result = Privacy_Policy::where('status','=','1')->get();

            $message = "Edit has been successfully done.";
            return Redirect::route('getViewPrivacyPolicy')->with('results', $result)->with('message', $message);
        }
    }

    // To delete terms and condition
    public function postDeletePrivacyPolicy(){
        $id = Input::get();

        $delete = Privacy_Policy::removePrivacyPolicy($id);

        if($delete){
            $result = Privacy_Policy::where('status','=','1')->get();

            $message = "Privacy Policy has been successfully removed from database.";
            return Redirect::route('getViewPrivacyPolicy')->with('results', $result)->with('message', $message);
        }
    }

    // To get trashed bus
    public function getTrashBus(){
        $buses = DB::table('bus')
            ->join('owner', 'bus.owner_id','=', 'owner.id')
            ->join('bus_type', 'bus.bus_type_id','=', 'bus_type.id')
            ->where('owner.status','=','2')
            ->where('bus.status','=','0')
            ->select('owner.companyname','bus.id AS busid', 'bus.name AS busname', 'bus.image', 'bus.number', 'bus.description', 'bus_type.name AS bustypename',
                'bus.fs AS front_seat', 'bus.a AS sideA', 'bus.b AS sideB', 'bus.bs AS back_seat')
            ->get();

        if($buses!==null){      
            return View::make('admin.superAdmin.trash.viewTrashBus')->with('buses',$buses);
        }else{
            return View::make('admin.superAdmin.trash.viewTrashBus')->with('errormessage', 'There are not any bus in trash.');            
        }
    }

    // To Delete Trased Bus
    public function postDeleteTrashBus(){

        $busid = Input::get('id');

        if(!is_null($busid)){
            $deletedBus = Bus::postDeleteTrashBus($busid);

            $buses = DB::table('bus')
                ->join('owner', 'bus.owner_id','=', 'owner.id')
                ->join('bus_type', 'bus.bus_type_id','=', 'bus_type.id')
                ->where('owner.status','=','2')
                ->where('bus.status','=','0')
                ->select('owner.companyname','bus.id AS busid', 'bus.name AS busname', 'bus.image', 'bus.number', 'bus.description', 'bus_type.name AS bustypename',
                    'bus.fs AS front_seat', 'bus.a AS sideA', 'bus.b AS sideB', 'bus.bs AS back_seat')
                ->get();
            
            return Redirect::route('getBusTrash')->with('message', 'Bus has been removed from the database.')->with('buses', $buses);
        
        }else{
            
            $buses = DB::table('bus')
                ->join('owner', 'bus.owner_id','=', 'owner.id')
                ->join('bus_type', 'bus.bus_type_id','=', 'bus_type.id')
                ->where('owner.status','=','2')
                ->where('bus.status','=','0')
                ->select('owner.companyname','bus.id AS busid', 'bus.name AS busname', 'bus.image', 'bus.number', 'bus.description', 'bus_type.name AS bustypename',
                    'bus.fs AS front_seat', 'bus.a AS sideA', 'bus.b AS sideB', 'bus.bs AS back_seat')
                ->get();
            return Redirect::route('getBusTrash')->with('errormessage', 'There is no bus to be removed.')->with('buses', $buses);            
        }
    }

    // To undo delete
    public function postUndoTrashBus(){
        $busid = Input::get('id');

        if($busid!==null){
            $undoTrash = Bus::postUndoTrash($busid);

            $buses = DB::table('bus')
                ->join('owner', 'bus.owner_id','=', 'owner.id')
                ->join('bus_type', 'bus.bus_type_id','=', 'bus_type.id')
                ->where('owner.status','=','2')
                ->where('bus.status','=','0')
                ->select('owner.companyname','bus.id AS busid', 'bus.name AS busname', 'bus.image', 'bus.number', 'bus.description', 'bus_type.name AS bustypename',
                    'bus.fs AS front_seat', 'bus.a AS sideA', 'bus.b AS sideB', 'bus.bs AS back_seat')
                ->get();
            return Redirect::route('getBusTrash')->with('message', 'Undo has been successfully done.')->with('buses', $buses);
        }
    }

    // To get trashed route
    public function getTrashRoute(){
        $routes = DB::table('route')->where('status','=','0')->select('id', 'from', 'to')->get();

        if($routes!==null){      
            return View::make('admin.superAdmin.trash.viewTrashRoute')->with('routes',$routes);
        }else{
            return View::make('admin.superAdmin.trash.viewTrashRoute')->with('errormessage', 'Route has not been sent to trash yet.');            
        }
    }

    // To Delete Trased Bus
    public function postDeleteTrashRoute(){

        $routeid = Input::get('id');

        if($busid!==null){
            $deletedBus = Bus::postDeleteTrashRoute($routeid);

            $route = Bus::getAllTrashedRoute($results);
            return Redirect::route('getBusTrash')->with('message', 'Bus has been removed from the database.')->with('buses', $bus);
        }else{
            $bus = Bus::getAllTrashedBus($results);
            return Redirect::route('getBusTrash')->with('message', 'There is no bus to be removed.')->with('buses', $bus);            
        }
    }

    // To get trashed bus type
    public function getBusTypeTrash(){
        $bustype = Bus_Type::getTrashBusType();

        if($bustype){
            return View::make('admin.superAdmin.trash.viewTrashBusType')->with('results', $bustype);
        }else{
            return View::make('admin.superAdmin.trash.viewTrashBusType')->with('errormessage', 'Bus type has not been sen to trash yet.');
        }

    }

    // To post delete trashed bus type
    public function postDeleteTrashBusType(){
        $bustypeid = Input::get('id');

        if($bustypeid){
            $bustype = Bus_Type::postDeleteTrashBusType($bustypeid);
            $bustyperesult = Bus_Type::getTrashBusType();

            return Redirect::route('getBusTypeTrash')->with('results', $bustyperesult)->with('message', 'Bus Type has been successfully removed form the database.');
        }else{
            $bustyperesult = Bus_Type::getTrashBusType();
            return Redirect('getBusTypeTrash')->with('errormessage', 'Bus Type has not been sent to trash yet.');
        }
    }

    // To undo bus type from trash
    public function postUndoTrashBusType(){
        $bustypeid = Input::get('id');

        if($bustypeid){
            $bustype = Bus_Type::postUndoTrashBusType($bustypeid);
            $bustyperesult = Bus_Type::getTrashBusType();
            return Redirect::route('getBusTypeTrash')->with('results', $bustyperesult)->with('message', 'Undo has been successful.');
        }else{
            $bustyperesult = Bus_Type::getTrashBusType();
            return Redirect::route('getBusTypeTrash')->with('results', $bustyperesult)->with('errormessage', 'Undo could not successful.');
        }
    }

    // To get trashed city
    public function getCityTrash(){
        $deletedcity = City::getCityTrash();
        if($deletedcity){
            return View::make('admin.superAdmin.trash.viewTrashCity')->with('results', $deletedcity);
        }else{
            return View::make('admin.superAdmin.trash.viewTrashCity')->with('errormessage', 'There is no city in the trash.');
        }
    }

    // To post deleted city
    public function postDeleteTrashCity(){
        $cityid = Input::get('id');
        if($cityid){
            $result = City::getCityTrash();
            City::postDeleteTrashCity($cityid);
            return Redirect::route('getCityTrash')->with('results', $result)->with('message', 'City has been successfully removed from database :)');

        }
    }

    // To undo trash city
    public function postUndoTrashCity(){
        $cityid = Input::get('id');
        if($cityid){            
            City::postUndoTrashCity($cityid);
            $result = City::getCityTrash();
            return Redirect::route('getCityTrash')->with('results', $result)->with('message', 'Undo has been successfully done :)');
        }
    }

    // To get Trash terms and Condition
    public function getTermsAndConditionTrash(){
        $trash = Terms_Condition::getTrashTermsAndCondition();

        return View::make('admin.superAdmin.trash.viewTrashTermsAndCondition')->with('results', $trash);
    }

    // To post delete terms and condition
    public function postDeleteTrashTermsAndCondition(){
        $tmid = Input::get('id');

        $deleteTM = Terms_Condition::postDeleteTrashTermsAndCondition($tmid);
        if($deleteTM){
            $result = Terms_Condition::getTrashTermsAndCondition();
            return Redirect::route('getTrashTermsAndCondition')->with('results', $result)->with('message', 'Terms and Condition has been successfully removed from database :)');
        }else{
            return Redirect::route()->with('errormessage', 'Could not perform delete action :(');
        }
    }

    // To undo trash terms and Condition
    public function postUndoTrashTermsAndCondition(){
        $tmid = Input::get('id');

        $undo = Terms_Condition::postUndoTrashTermsAndCondition($tmid);

        if($undo){
            $result = Terms_Condition::getTrashTermsAndCondition();
            return Redirect::route()->with('results', $result)->with('message', 'Undo has been successfully fone :)');
        }
    }
}