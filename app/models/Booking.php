<?php

class Booking extends Base_Model {
    protected $table = 'booking';

    public static function getAllBooking(){
        $results = DB::table('booking')

            ->join('bus','bus.id','=','booking.bus_id')
            ->join('users','users.id','=','booking.user_id')
            ->join('route', 'route.id','=','booking.route_id')
            
            ->where('booking.status','=','1')
            ->select(
                'booking.id AS booking_id','users.id AS user_id', 'users.firstName AS firstname', 'users.lastName AS lastname', 
                'bus.id AS bus_id', 'bus.name AS busname', 'route.id AS route_id', 'route.from', 
                'route.to', 'date', 'total_price', 'total_passenger', 'seat'
            )
            ->get();

        if($results) return $results;
        return false;
    }

}