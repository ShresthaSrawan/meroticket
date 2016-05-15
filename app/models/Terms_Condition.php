<?php

class Terms_Condition extends Base_Model{
    protected $table = 'terms_condition';

    public static $rules = array(
        'header'    => 'required', // make sure that from is an actual from        
        'description' => 'required'
    );

    public static $messages = array(
        'header.required' => 'Header of the terms and condition is required.', 
        'description.required' => 'Description of the terms and condition is required.'
    );

    // To insert valur of terms and condition into database
    public static function addTermsAndCondition($header, $description){

    	$tm = new Terms_Condition;
    	$tm->header = $header;
    	$tm->description = $description;
    	$tm->created_at = date('Y-m-d H:m:s');
		$tm->updated_at = date('Y-m-d H:m:s');
		$tm->save();
    
    }

    // To edit terms and condition
    public static function editTermsAndCondition($tmid, $tmheader, $tmdescription){
    	$tm = Terms_Condition::find($tmid);
    	$tm->header = $tmheader;
    	$tm->description = $tmdescription;
    	$tm->save();

    	return true;
    }

    // To remove terms and condition
    public static function deleteTermsAndCondition($id){
    	
        $tm = Terms_Condition::find($id);
        $tm->status = 0;
        $tm->save();

    	return true;
    }

    // To get all the terms and condition
    public static function getTermsAndCondition(){
        $result = DB::table('terms_condition')->where('status','=','1')->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    // To get Trashed terms and condition
    public static function getTrashTermsAndCondition(){
        $result = DB::table('terms_condition')->where('status', '=', '0')->get();

        if($result) return $result;
        return false;
    }

    // To delete terms and condition from database
    public static function postDeleteTrashTermsAndCondition($id){
        $result = DB::table('terms_condition')->where('id', '=', $id)->delete();

        if($result) return $result;
        return false;
    }

    // To undo terms and condition
    public static function postUndoTrashTermsAndCondition($id){
        $result = DB::table('terms_condition')->where('id', '=', $id)->update(['status'=>'1']);

        if($result) return $result;
        return false;
    }

}