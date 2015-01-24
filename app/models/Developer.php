<?php

class Developer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'contact_fname' => 'required',
		'contact_lname' => 'required',
		'contact_email' => 'required',
		'contact_phone' => 'required'
	);
}
