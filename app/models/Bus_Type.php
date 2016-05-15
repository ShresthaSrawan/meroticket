<?php


class Bus_Type extends Base_Model{
    protected $table = 'bus_type';

    public static $rules = array(
        'name'=>'required|min:2'
    );

    public static $rulesMessages = array(
        'name.required' => 'You need to provide the name of your bus type. You cannot leave it blank.',
    	'name.min:2' => 'Name of the bus type must be at least 2 character.'
    );

    public static function getbustype(){
    	$results = DB::table('bus_type')->where('status', 1)->get();

    	if($results) return $results;
        return false;
    }

    public static function getTrashBusType(){
        $results = DB::table('bus_type')->where('status','=','0')->get();

        if($results) return $results;
        return false;
    }

    public static function postDeleteTrashBusType($id){
        $deletebustype = DB::table('bus_type')->where('id','=',$id)->delete();
        if($deletebustype) return true;
        return false;
    }

    public static function postUndoTrashBusType($id){
        $undotrashbustype = DB::table('bus_type')->where('id', '=', $id)->update(['status'=>'1']);
        if($undotrashbustype) return $undotrashbustype;
        return false;
    }
}