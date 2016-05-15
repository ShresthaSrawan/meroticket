<?php



class City extends Base_Model {
    protected $table = 'city';

    public static $rules = array(
    	'city'    => 'required',
    );

    public static $messages = array(
    	'city.required' => 'Name of the City is required'
    );

    public static function addCity($name){
        
    	$city = new City;
    	$city->name = $name['city'];
    	$city->save();

    	return $name;
    }

    public static function getAllCity(){
        $result = DB::table('city')->where('status', '=', '1')->select('id', 'name')->orderBy('name', 'asce')->get();

        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public static function editAddCities($id, $name){
    	
        $city = City::find($id);
    	$city->name = $name;
    	$city->save();

    	return true;
    }

    public static function deleteAddCities($id){
    	$city = City::find($id);
    	$city->status = 0;
    	$city->save();

    	return true;
    }

    public static function getCityTrash(){
        $city = DB::table('city')->where('status', '=', '0')->get();

        if($city) return $city;
        return false;
    }

    public static function postDeleteTrashCity($id){
        DB::table('city')->where('id', '=', $id)->delete();
    }

    public static function postUndoTrashCity($id){
        DB::table('city')->where('id', '=', $id)->update(array('status'=>'1'));
    }
}