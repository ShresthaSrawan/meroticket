<?php

class BookController extends BaseController{
    public $restful = true;

    public function getSearch(){
        return View::make('Book.search');
    }

    public function getSearchResult(){

        $input = Input::all();

        $from = strtolower($input['from']);
        $date = $input['date'];
        $to = strtolower($input['to']);


      
        $results = DB::table('booking_details')
            ->distinct()
            ->join('bus','bus.id','=','booking_details.bus_id')
            ->join('bus_type', 'bus.bus_type_id','=', 'bus_type.id')
            
            ->join('route','booking_details.route_id','=','route.id')
            ->join('owner','bus.owner_id','=','owner.id')
            ->join('bus_feature','bus_feature.bus_id','=','bus.id')
            ->join('feature','feature.id','=','bus_feature.feature_id')

            ->where('route.to','=',$to)
            ->where('route.from','=',$from)
            ->where('booking_details.date','=',date($date))
            ->where('booking_details.status','=','1')

            ->select('booking_details.id AS booking_details_id','bus.name AS busname','bus.id AS busid','route.id AS routeid','route.from','route.to','owner.companyname','bus.fs AS front_seat',
                'bus.bs AS back_seat','booking_details.ticket_price', 'bus_type.name AS bustypename',
                'bus.a AS side_a','bus.b AS side_b', 'bus.image')
            ->orderBy('bus.name', 'asce')            
            ->get();
        
        return View::make('Book.result')->with('results',$results);
    }

    public function viewBookingDetails($bookingid){
        
        if(Auth::admin()->check()===false && Auth::owner()->check()===false && Auth::user()->check()===false){            
            $currentURL = Request::url();
            Session::put('redirect_url', $currentURL);
        }
        return View::make('Book.viewbus')
            ->with('bus', Bus::getAllDetails($bookingid))->with('features', Bus::getBusFeature($bookingid))->with('bookingid',$bookingid);
    }

    public function getSeat($bookingid){

        intval($bookingid);
        return View::make('Book.seatselection')
            ->with('result', Bus::getAllDetails($bookingid))->with('bookingid',$bookingid);
    }

    // To select the seat
    public function postSelectSeat(){
        $input = Input::all();

        $bookingid = $input['bookingid'];
        $ticket_price = $input['ticket_price'];
        $adults = $input['adults'];
        $student = $input['student'];
        $kids = $input['kids'];
        $elder = $input['old'];
        $luggage = $input['luggage'];
        $date = $input['date'];

        $total_passenger = $adults+$student+$kids+$elder;

        if($total_passenger>4){
            $error = "You can not book for more than 4 people at a time.";
            return View::make('Book.seatselection')
                ->with('result', Bus::getAllDetails($bookingid))
                ->with('errormessage', $error)
                ->with('bookingid',$bookingid); 
        }else{

            return View::make('Book.selectSeat')
                ->with('result', Bus::getAllDetails($bookingid))
                ->with('bookingid', $bookingid)
                ->with('ticket_price', $ticket_price)
                ->with('adults', $adults)
                ->with('student', $student)
                ->with('kids', $kids)
                ->with('elder', $elder)
                ->with('luggage', $luggage)
                ->with('date', $date);
        }
    }

    public function getBookingTicket(){
        $input = Input::all();        

        $adults = $input['adults'];
        $ticket_price = $input['ticket_price'];
        $total_student = $input['student'];
        $total_kids = $input['kids'];
        $total_old = $input['elder'];
        $luggage = $input['luggage'];
        $bookingid = (int) $input['bookingid'];  
        

        $date = $input['date'];
        $user_id = Auth::user()->id();
        
        $amount = Bus::getamount($bookingid);

        $student_discount = $amount["discount_student"];
        $kids_discount = $amount['discount_kid'];
        $old_discount = $amount['discount_elder'];


        $student_amount = $ticket_price - ($student_discount * $ticket_price / 100);
        $kids_amount = $ticket_price - ($kids_discount * $ticket_price / 100);
        $old_amount = $ticket_price - ($old_discount * $ticket_price / 100);

        //To assign luggage amount to variable
        if($luggage == 'below10'){
            $luggage_amount = $amount['luggage_below_10'];
        }elseif($luggage == 'below50'){
            $luggage_amount = $amount['luggage_below_50'];
        }elseif($luggage == 'below100'){
            $luggage_amount = $amount['luggage_below_100'];
        }else{
            $luggage_amount = 0;
        }
        
        $adults_amount = $ticket_price*$adults;
        $total_student_amount = $total_student * $student_amount;
        $total_kids_amount = $total_kids * $kids_amount;
        $total_old_amount = $total_old * $old_amount;        

        $total_price = $adults_amount+$total_student_amount + $total_kids_amount + $total_old_amount + $luggage_amount;
        $total_passanger = $adults+$total_student + $total_kids + $total_old;
        $expiry_date = date('Y-m-d h:i:s', strtotime('+48 hour'));
        $seat = implode(',',$input['seat']);

        $booking = Bus::ticketBooking($user_id,$bookingid, $total_price, $total_passanger, $seat, $date);        

        if($booking){
            $message = "Booking has been successfully done :)";
            return View::make('Book.bookingMessage')->with('message', $message);
        }else{
            $message = "We are very sorry to announce that your booking could not be successful :(";
            return View::make('Book.bookingMessage')->with('message', $message);
        }
    }

    public function getReservedSeat()
    {
        # code...
        $bookingid = Input::all()['bookingid'];
        $date = Input::all()['date'];
        $reservedSeats = DB::table('booking')
            ->join('booking_details','booking.booking_details_id','=','booking_details.id')
            ->select('seat')
            ->where('booking.status','=','1')
            ->where('booking_details.id','=',$bookingid)
            ->where('booking_details.date','=',date($date))
            ->get();
            $allreservedseat = '';
            foreach ($reservedSeats as $reservedSeat) {
                # code...
                $allreservedseat = $allreservedseat . $reservedSeat['seat'].",";

            }
            return $allreservedseat;
    }
}