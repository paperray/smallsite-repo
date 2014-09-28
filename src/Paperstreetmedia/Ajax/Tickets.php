<?php namespace Paperstreetmedia\Membersarea\Ajax;

use DB;

class Tickets implements AjaxInterface{
	
	public function post($data = array()){

		 DB::table('tickets')->insert(
			array(
				'name' => $data['username'], 
				'email' => '',
				'ip' => \Request::getClientIp(),
				'subject' => $data['subject'],
				'message' => $data['message'],
				'adddate_unix' => $data['message_date'],
			)
		);
		
		return 'Your ticket has been successfully sent!';
	}
	
	static public function get($data = array()){
		
		return 'get';
	}
	
	static public function delete($data = array()){
		
		return 'delete';
	}
	
}