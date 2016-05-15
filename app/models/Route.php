<?php

class RouteModel extends Base_Model {
    protected $table = 'route';

    public static $rules = array(
        'from'    => 'required|alpha|min:2', // make sure that from is an actual from
        'to' => 'required|alpha|min:2' // password can only be alphanumeric and has to be greater than 3 characters
    );

    public static $messages = array(
        'from.required' => 'You can not leave \'From\' field blank.',
        'from.alpha' => '\'From\' field must be character',
        'from.min:2' => 'From route must contain at least 2 character',
        'to.required' => 'You can not leave \'To\' field blank.',
        'to.alpha' => '\'To\' field must be character',
        'to.min:2' => 'To route must contain at least 2 character.'
    );

}