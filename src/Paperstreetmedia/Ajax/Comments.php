<?php namespace Paperstreetmedia\Membersarea\Ajax;

use DB;

class Comments implements AjaxInterface{
	
	public function post($data = array()){
	
		DB::table('comments')->insert(
			array(
				'name' => $data['commentor_name'], 
				'comment' => $data['comment'],
				'comment_type' => $data['comment_type'],
				'comment_girl_name' => $data['comment_girl_name'],
				'created_at' => $data['comment_date'],
			)
		);
		
		return 'Your Comment has been successfully posted!';
		
	}
	
	public function get($data = array()){
		$query = DB::table('comments');
		$query->where('comment_girl_name', $data['girlname']); /* AND clause */
		$query->where('comment_type', $data['type']);
		if(isset($data['commentlimit']) && isset($data['commentstart'])) $query->skip($data['commentstart'])->take($data['commentlimit']);
		$query->orderBy('created_at', 'desc');
		return $query->get();
		//
	}

	static public function delete($data = array()){
	
		return 'deleted';
		
	}
	
}