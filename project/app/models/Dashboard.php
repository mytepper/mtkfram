<?php
class Dashboard extends Eloquent {
	public $timestamps = false;
    public function __construct($tb, array $attributes = array())
    {
        parent::__construct($attributes);

        $this->table = $tb;
    }

}
?>