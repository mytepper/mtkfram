<?php
class ReceiveList extends Eloquent {
    protected $table = 'tb_receive_list'; // ชื่อตาราง

    public static function count($id){
		$d = self::where('bill_id',$id)->count();
		return $d;
	}

	public static function get($id){
		$d = self::leftjoin('tb_product','tb_receive_list.PID','=','tb_product.PID')
		    ->where('bill_id',$id)
		    ->orderby('id','desc')
		    ->get();
		return $d;
	}

	
}
?>