<?php

class HomeController extends BaseController{
    public $restful = true;

    public function get_index(){
    	$result = DB::table('city')->where('status','=','1')->select('name')->get();
		    			
        return View::make('layouts.home')->with('results', $result);
    }

}