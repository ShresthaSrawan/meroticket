<?php

class HomeController extends BaseController{
    public $restful = true;

    public function get_index(){
        return View::make('layouts.home');
    }

}