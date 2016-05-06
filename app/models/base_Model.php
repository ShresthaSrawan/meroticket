<?php

class Base_Model extends Eloquent{

    public static function validate_user($data){
//       echo '<pre>'; var_dump($data);dd(Validator::make($data, static::$rules));
        return Validator::make($data, static::$rules);

    }

}