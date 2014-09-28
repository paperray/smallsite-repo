<?php
namespace Paperstreetmedia\DataAccessObject;

//use Illuminate\Database\Capsule\Manager as DB;
use \DB;
class LaravelMysqlObject extends GirlObjectBaseClass implements GirlObjectInterface
{
	public function create()
	{
	
	}
	
	public function read($id)
	{
	
	}
	
	public function readAll(array $data)
	{
		try {
			$query = DB::table('girls');
			if($data) $query->whereIn('id', $data['girlidlist']);
			$girllists = $query->get();
			$data = array();
			foreach($girllists as $key => $girllist){
				$girllist->ratings = $this->ratings->get(array('girlid' => $girllist->id));
				$girllist->favorites = $this->favorite->getGirlFavoriteCounts($girllist->id);
				$data[] = $girllist;
			}
			
		}catch(\Exception $e){
		
			$data = array();
			
		}
		
		return $data;
	}
	
	public function update($id)
	{}
	public function delete($id)
	{}
}