<?php

class booking_details extends Base_Model {

    protected $table = 'booking_details';
    
     public static $rules = array(
        'bus'=>'required',
        'route' => 'required',
        'date' => 'required',
        'ticket_price' => 'required',
        'kid' => 'required',
        'student' => 'required',
        'old' => 'required',
        'below10' => 'required',
        'below50' => 'required',
        'below100' => 'required'
    );

    public static $rulesMessages = array(
        'bus.required' => 'You need to provide the name of your bus type. You cannot leave it blank',
        'route.required' => 'You need to provide route for booking',
        'date.required' => 'You need to set date for booking',
        'ticket_price.required' => 'You need to set ticket price for booking',
        'kid.required' => 'You need to set the discount for kid',
        'student.required' => 'You need to set discount for student',
        'old.required' => 'You need to set disounct for elder',
        'below10.required' => 'You need to set the price for below 10 K.G. luggage',
        'below50.required' => 'You need to set the price for below 50 K.G. luggage',
        'below100.required' => 'You need to set the price for below 100 k.g. luggage'
    );

    public static function getAllBookingDate()
    {
        $results = DB::table('booking_details')
            ->join('bus','bus.id','=','booking_details.bus_id')
            ->join('route','route.id','=','booking_details.route_id')
            ->where('booking_details.status','=','1')
            ->select('booking_details.id AS id','bus.name AS busname','bus.id AS busid','route.id AS routeid', 'route.from', 'route.to', 'date',
                'ticket_price', 'discount_kid AS kid', 'discount_student AS student', 'discount_elder AS elder', 'luggage_below_10 AS luggage10', 'luggage_below_50 AS luggage50', 'luggage_below_100 AS luggage100')
            ->get();
            
        if($results) return $results;
        return false;
    }
}