<?php
require_once 'vendor/autoload.php';
//
//use Illuminate\Database\Capsule\Manager as DB;



/**/


//$capsule = new DB;

/*$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'laraveltubetour',
    'username'  => 'root',
    'password'  => 'secret',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);*/

// Set the event dispatcher used by Eloquent models... (optional)
#use Illuminate\Events\Dispatcher;
#use Illuminate\Container\Container;
#$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
#$capsule->setAsGlobal();

//Set to fecth class in order to return an object
#$capsule->setFetchMode(PDO::FETCH_CLASS);

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
#$capsule->bootEloquent();


//$users = DB::table('girls')->get();

//var_dump($users);

//$girl = new Paperstreetmedia\Girls(new Paperstreetmedia\GirlsSortingAlgorithms\MostRecent(new Paperstreetmedia\Ajax\Ratings, new Paperstreetmedia\Ajax\Favorites));
$girl = new Paperstreetmedia\Repositories\GirlRepository(new Paperstreetmedia\DataAccessObject\LaravelMysqlObject(new Paperstreetmedia\Ajax\Ratings, new Paperstreetmedia\Ajax\Favorites));
var_dump($girl->readAll($data = array()));