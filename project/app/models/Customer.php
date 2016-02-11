<?php
class Customer extends Eloquent {
    public $timestamps = false;
    protected $table = 'tb_customer'; // ชื่อตาราง


    public static function get($order='asc'){
    	$d = self::orderby('CUname',$order)->get();
    	return $d;
    }

}

?>