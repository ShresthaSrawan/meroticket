<?php

class Bus_Feature extends Base_Model{
    protected $table = 'bus_feature'; 

    public static function getBusFeatureDetails($busid, $featureid){
    	$results = DB::table('bus_feature')
    		->join('bus', 'bus.id','=','bus_feature.bus_id')
    		->join('feature', 'feature.id','=','bus_feature.feature_id')
    		->where('bus_feature.bus_id','=',$busid)
    		->where('bus_feature.feature_id','=',$featureid)
    		->select('bus_feature.id AS busfeatureid', 'bus.id AS busid', 'bus.name AS busname', 'feature.id AS featureid', 'feature.name AS featurename')
    		->get();

    	if($results){            
            return $results;
        }else{
            return false;
        }
    }

}