<?php

class Subdivision extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'developer_id' => 'required',
		'name' => 'required',
		'address' => 'required',
		'city' => 'required',
		'state' => 'required',
		'zip' => 'required'
	);
}
