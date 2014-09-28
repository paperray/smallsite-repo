<?php
namespace Paperstreetmedia\DataAccessObject;

use \Paperstreetmedia\Ajax\Ratings;
use \Paperstreetmedia\Ajax\Favorites;

class GirlObjectBaseClass
{
	public $ratings;
	public $favorites;
	
	public function __construct(Ratings $ratings, Favorites $favorite)
	{
		$this->ratings = $ratings;
		$this->favorite = $favorite;
	}
}