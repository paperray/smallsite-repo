<?php 
namespace Paperstreetmedia;

class Girls
{
	public $girlorder;
	
	public function __construct(GirlsSortingAlgorithms\GirlsSortInterface $girlorder)
	{
		$this->girlorder = $girlorder;
	}
	
	public function showAll()
	{
		var_dump($this->girlorder->sortGirls());
	}
}