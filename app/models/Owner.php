<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Suraj Yogi
 * Date: 04/03/15
 * Time: 12:14
 * To change this template use File | Settings | File Templates.
 */

class Owner extends Base_Model {
    protected $table = 'owner';
    public function bus()
    {
        return $this->hasMany('Bus');
    }
}