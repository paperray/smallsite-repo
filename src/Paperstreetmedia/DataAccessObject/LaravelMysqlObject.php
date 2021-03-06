<?php
namespace Paperstreetmedia\DataAccessObject;

use PDO;
use \Paperstreetmedia\Ajax\Ratings;
use \Paperstreetmedia\Ajax\Favorites;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class LaravelMysqlObject extends GirlObjectBaseClass implements GirlObjectInterface
{
	public function __construct(Ratings $ratings, Favorites $favorite)
	{
		$this->ratings = $ratings;
		$this->favorite = $favorite;
		$capsule = new DB;

		$capsule->addConnection([
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'laraveltubetour',
			'username'  => 'laraveltubetour',
			'password'  => '6ZHo1eCBv32jVAp',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		]);

		
		$capsule->setEventDispatcher(new Dispatcher(new Container));

		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();

		//Set to fecth class in order to return an object
		$capsule->setFetchMode(PDO::FETCH_CLASS);

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();
	}
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
			//var_dump($girllists);die();
			$data = array();
			foreach($girllists as $key => $girllist){
				$girllist->ratings = $this->ratings->get(array('girlid' => $girllist->id));
				//$girllist->favorites = $this->favorite->getGirlFavoriteCounts($girllist->id);
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