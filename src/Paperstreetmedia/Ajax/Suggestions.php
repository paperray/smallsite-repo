<?php namespace Paperstreetmedia\Membersarea\Ajax;

use DB;

class Suggestions implements AjaxInterface{
	
	public function post($data = array()){

		 DB::table('suggestions')->insert(
			array(
				'name' => $data['username'], 
				'email' => '',
				'ip' => \Request::getClientIp(),
				'subject' => $data['subject'],
				'suggestion' => $data['suggestion'],
				'adddate_unix' => $data['suggestion_date'],
			)
		);
		
		return 'Your suggestion has been successfully sent!';
	}
	
	static public function get($data = array()){
		
		return 'get';
	}
	
	static public function delete($data = array()){
		
		return 'delete';
	}
	
}