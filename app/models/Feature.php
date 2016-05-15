<?php

class Feature extends Base_Model{
    protected $table = 'feature';

    public static $rules = array(
        'feature'    => 'required' // make sure that from is an actual from        
    );

    public static $messages = array(
        'feature.required' => 'You can not leave \'Feature\' field blank.'
        
        
    );

}