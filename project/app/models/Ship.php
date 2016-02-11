<?php
class Ship extends Eloquent {
    protected $table = 'tb_ship'; // ชื่อตาราง

    public static function get(){
    	$d = self::leftJoin('tb_customer', 'tb_ship.CUID', '=', 'tb_customer.CUID')
    	->orderby('tb_ship.id','DESC')
    	->get();
    	return $d;
    }


    public static function one($id){
    	$d = self::leftJoin('tb_customer', 'tb_ship.CUID', '=', 'tb_customer.CUID')
    	->where('id',$id)
    	->orderby('tb_ship.id','DESC')
    	->first();
    	return $d;
    }
}
?>