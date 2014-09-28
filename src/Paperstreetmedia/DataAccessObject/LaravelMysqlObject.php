<?php
namespace Paperstreetmedia\DataAccessObject;

use Illuminate\Database\Capsule\Manager as DB;

class LaravelMysqlObject extends GirlObjectBaseClass implements GirlObjectInterface
{
	public function __construct()
	{
		$capsule = new DB;

		$capsule->addConnection([
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'laraveltubetour',
			'username'  => 'root',
			'password'  => 'secret',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		]);

		// Set the event dispatcher used by Eloquent models... (optional)
		use Illuminate\Events\Dispatcher;
		use Illuminate\Container\Container;
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