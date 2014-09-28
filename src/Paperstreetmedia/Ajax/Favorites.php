<?php namespace Paperstreetmedia\Ajax;

use Illuminate\Database\Capsule\Manager as DB;

class Favorites implements AjaxInterface{
	
	public function post($data = array()){

		 DB::table('favorites')->insert(
			array(
				'name' => $data['fuser'], 
				'mid' => $data['mid'],
			)
		);
		
		return 'has been successfully added to favorites!';
	}
	
	public function get($data = array()){
		
		return DB::table('favorites')
		->where('name', $data['username'])
		->lists('mid');
		
	}
	
	static public function delete($data = array()){
		
		DB::table('favorites')
		->where('mid', $data['mid'])
		->where('name', $data['fuser'])
		->delete();
		
		return 'has been removed from favorites!';
	}
	
	public function getGirlFavoriteCounts($girlid){
	
		return DB::table('favorites')->where('mid', $girlid)->count();
		
	}
	
}