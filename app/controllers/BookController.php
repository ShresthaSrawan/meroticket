<?php

class BookController extends BaseController{
    public $restful = true;

    public function getSearch(){
        return View::make('Book.search');
    }

    public function search(){
        $input = Input::all();
        $from = strtolower($input['from']);
        $date = $input['start'];
        $to = strtolower($input['to']);

        //conversion of date
        $newDate = date_parse_from_format('Y M d', $date);
        $newDate['month'] = (intval($newDate['month'])<10) ? '0'.$newDate['month']: $newDate['month'];
        $newDate = $newDate['year'].'-'.$newDate['month'].'-'.$newDate['day'];

//        $date = DB::table("bus_route")->select();
        $results = DB::table('bus')
            ->join('bus_route','bus.id','=','bus_route.bus_id')
            ->join('route','bus_route.route_id','=','route.id')
            ->join('owner','bus.owner_id','=','owner.id')
            ->join('bus_feature','bus_feature.feature_id','=','bus.id')
            ->join('feature','bus_feature.feature_id','=','feature.id')
            ->where('route.to','=',$to)
            ->where('route.from','=',$from)
            ->where('bus_route.date','=',date($newDate))
            ->select('bus.bus_name','bus.id','owner.companyname','feature.ticket_price')->get();

        return View::make('Book.result')->with('results',$results);
    }

    public function getResult($from, $to){

    }

    public function viewBus($id){
        if(Auth::check()===false){
            $currentURL = $_SERVER['REDIRECT_URL'];
            Session::put('redirect_url', $currentURL);
        }
        return View::make('Book.viewbus')
            ->with('bus', Bus::getAllDetails($id));
    }

    public function getSeat($id){
        intval($id);
        return View::make('Book.seatselection')
            ->with('bus', Bus::getAllDetails($id));
    }

//    public function getSeat($id){
//
//        return View::make('Book.seatselection')
//            ->with('bus', Bus::getAllDetails($id));
//
//    }
}