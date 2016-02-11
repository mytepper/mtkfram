<?php
class Receive extends Eloquent {
    protected $table = 'tb_receive'; // ชื่อตาราง

    public static function get(){
    	$d = self::leftJoin('tb_customer', 'tb_receive.CUID', '=', 'tb_customer.CUID')
    	->orderby('tb_receive.id','DESC')
    	->get();
    	return $d;
    }


    public static function one($id){
    	$d = self::leftJoin('tb_customer', 'tb_receive.CUID', '=', 'tb_customer.CUID')
    	->where('id',$id)
    	->orderby('tb_receive.id','DESC')
    	->first();
    	return $d;
    }
}
?>