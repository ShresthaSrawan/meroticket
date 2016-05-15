<?php

class Bus extends Base_Model {
    protected $table = 'bus';
    

    public static $addBusRules = array(
        'bustype'=>'required',
        'busname'=>'required|alpha|min:2',
        'number'=>'required|alpha_dash|unique:bus',
        'image'=>'required|image',
        'frontseat'=>'required|alpha_num|between:1,14',
        'side_a'=>'required|alpha_num|between:6,18',
        'side_b'=> 'required|alpha_num|between:6, 18',
        'backseat'=> 'required|alpha_num|between:1, 10',
        'description'=> 'required|alpha'
    );

    public static $addBusMessages = array(
        'bustype.required' => 'You need to provide the name of you bus type.',
        'busname.required' => 'You need to provide the name of your bus.',
        'busname.alpha' => 'You can not use numbers or any special character for name of your bus.',
        'busname.min:2' => 'Name of you bus should at least contain 2 character.',
        'busnumber.required' => 'You need to provide number of your bus.',
        'busnumber.unique:bus' => 'Bus containing this number has already been register in Mero Ticket bus another owner.',
        'image.required' => 'You need to provide the image for your bus.',
        'image.image' => 'Please only upload image.',
        'image.mimes:jpg, jpeg, png, bmp, gif' => 'You can only upload image that has extinction of .jpg, .jpeg, .png, .bmp, .gif.'
    );
    
    public static function getAllDetails($bookingid)
    {
        $results = DB::table('booking_details')
            ->distinct()
            ->join('bus','bus.id','=','booking_details.bus_id')
            ->join('bus_type', 'bus.bus_type_id','=', 'bus_type.id')
            
            ->join('route','booking_details.route_id','=','route.id')
            ->join('owner','bus.owner_id','=','owner.id')
            ->join('bus_feature','bus_feature.bus_id','=','bus.id')
            ->join('feature','feature.id','=','bus_feature.feature_id')

            ->select('bus.name AS busname','bus.id AS busid','bus.description','owner.companyname', 'bus_type.name AS bustypename',
                'owner.contact_number','bus.fs AS front_seat','bus.bs AS back_seat',
                'bus.a AS side_a','bus.b AS side_b','booking_details.ticket_price', 
                'bus.image', 'route.id AS routeid', 'route.from', 'route.to', 'booking_details.luggage_below_10 AS below10', 
                'booking_details.luggage_below_50 AS below50', 
                'booking_details.luggage_below_100 AS below100',
                'booking_details.discount_kid AS kid', 'booking_details.discount_student AS student',
                'booking_details.discount_elder AS elder',
                'booking_details.date AS date'
                )
            ->first();

        if($results) return $results;
        return false;        
    }

    public static function getBusFeature($bookingid){
        $features = DB::table('booking_details')
        ->join('bus','booking_details.bus_id','=','bus.id')
        ->join('bus_feature','bus_feature.bus_id','=','bus.id')
            ->join('feature', 'bus_feature.feature_id','=','feature.id')
            ->where('booking_details.id', '=',$bookingid)
            ->select('feature.name AS featurename')->get();  

        if($features) return $features;
        return false; 
    }


    public static function getamount($bookingid){
        $amount = DB::table('booking_details')
            ->where('id','=',$bookingid)
            ->select('discount_kid', 'discount_student', 'discount_elder', 'luggage_below_10', 
                'luggage_below_50', 'luggage_below_100')
            ->first();
        if($amount) return $amount;
        return false;
    }

    //to insert booking details into database
    public static function ticketBooking($user_id,$bookingid, $total_price, $total_passenger, $seat, $date){

        $booking = new Booking();
        $booking->user_id = $user_id;
        $booking->booking_details_id = $bookingid;
        $booking->date = $date;
        $booking->total_price = $total_price;
        $booking->total_passenger = $total_passenger;
        $booking->seat = $seat;
        $booking->save();

        return true;
    }

    // To get all the trashed bus
    public static function getAllTrashBus(){
        $results = DB::table('bus')
            ->join('owner', 'bus.owner_id','=','owner.id')
            ->join('bus_type', 'bus.bus_type_id','=','bus_type.id')
            ->where('owner.status','=','1')
            ->where('bus.status','=','0')
            ->select('owner.companyname','bus.id AS busid', 'bus.name AS busname', 'bus.image', 'bus.number', 'bus.description', 'bus_type.name AS bustypename',
                'bus.fs AS front_seat', 'bus.a AS sideA', 'bus.b AS sideB', 'bus.bs AS back_seat')
            ->get();

        if($results){            
            return $results;
        }else{
            return false;
        }
    }

    // To delete the bus from database
    public static function postDeleteTrashBus($id){
        $deleteBus = Bus::find($id);
        $deleteBus->delete();
    }

    // To undo trash
    public static function postUndoTrash($id){
        $deleteBus = Bus::find($id);
        $deleteBus->status = 1;
        $deleteBus->save();
    }
}