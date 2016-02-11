<?php
class Bill extends Eloquent {
    protected $table = 'tb_bill'; // ชื่อตาราง

    public static function get(){
    	$d = self::leftJoin('tb_customer', 'tb_bill.CUID', '=', 'tb_customer.CUID')
    	->orderby('tb_bill.id','DESC')
    	->get();
    	return $d;
    }


    public static function one($id){
    	$d = self::leftJoin('tb_customer', 'tb_bill.CUID', '=', 'tb_customer.CUID')
    	->where('id',$id)
    	->orderby('tb_bill.id','DESC')
    	->first();
    	return $d;
    }
}
?>