<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Suraj Yogi
 * Date: 04/03/15
 * Time: 11:58
 * To change this template use File | Settings | File Templates.
 */

class Bus extends Base_Model{
    protected $table = 'bus';
    public function owner()
    {
        return $this->belongsTo('Owner');
    }
    public static function getAllDetails($id)
    {
        $results = DB::table('bus')
            ->join('bus_route','bus.id','=','bus_route.bus_id')
            ->join('route','bus_route.route_id','=','route.id')
            ->join('owner','bus.owner_id','=','owner.id')

            ->join('bus_feature','bus_feature.feature_id','=','bus.id')
            ->join('feature','bus_feature.feature_id','=','feature.id')

            ->where('bus.id','=',$id)->select('bus.bus_name','bus.id','owner.companyname','feature.ticket_price','feature.total_seat'
            ,'owner.contact_number','feature.music','feature.type','feature.reservation_limit','feature.laggage','feature.reservation_limit')
            ->first();
        if($results) return $results;
        return false;
    }
}