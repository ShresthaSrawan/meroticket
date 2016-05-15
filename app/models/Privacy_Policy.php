<?php

class Privacy_Policy extends Base_Model{
    protected $table = 'privacy_policy';

    public static $rules = array(
        'header'    => 'required', // make sure that from is an actual from        
        'description' => 'required'
    );

    public static $messages = array(
        'header.required' => 'Header of the terms and condition is required.', 
        'description.required' => 'Description of the terms and condition is required.'
    );

    // To insert valur of terms and condition into database
    public static function addPrivacyPolicy($header, $description){

    	$tm = new Privacy_Policy;
    	$tm->header = $header;
    	$tm->description = $description;
    	$tm->created_at = date('Y-m-d H:m:s');
		$tm->updated_at = date('Y-m-d H:m:s');
		$tm->save();
    
    }

    // To edit terms and condition
    public static function editPrivacyPolicy($ppid, $ppheader, $ppdescription){

    	$pp = Privacy_Policy::find(intval($ppid));
    	$pp->header = $ppheader;
    	$pp->description = $ppdescription;
    	$pp->save();

    	return true;
    }

    // To remove terms and condition
    public static function removePrivacyPolicy($id){
    	
        $tm = Privacy_Policy::find($id)->first();
        $tm->status = 0;
        $tm->save();

    	return true;
    }

    // To get all the privacy and policy
    public static function getAllPrivacyPolicy(){
        $result = DB::table('privacy_policy')->where('status','=','1')->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

}