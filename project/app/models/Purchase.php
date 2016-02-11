<?php
class Purchase extends Eloquent {
    public $timestamps = false;
    protected $table = 'tb_purchase'; // ชื่อตาราง

    public static function count($id){
    	$d = self::where('PBID',$id)->count();
    	return $d;
    }
}

?>