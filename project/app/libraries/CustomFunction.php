<?php 
class Function{
    static function dateFormat($date){
    	$date1 = explode('-',$date);
		$day = $date1['2'];
		$mount = $date1['1'];
		$year = $date1['0'];
		return $day." / ".$mount." / ".$year;	
  	}
}
?>