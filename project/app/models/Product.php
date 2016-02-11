<?php
class Product extends Eloquent {
    public $timestamps = false;
    protected $table = 'tb_product'; // ชื่อตาราง


     public static function get($order='asc'){
    	$d = self::leftjoin('tb_product_type','tb_product.TID','=','tb_product_type.TID')
    		->orderby('tb_product_type.Tname',$order)
    		->get();
    	return $d;
     }
}
