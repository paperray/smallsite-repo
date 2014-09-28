<?php
namespace Paperstreetmedia\Repositories;

use  Paperstreetmedia\DataAccessObject\LaravelMysqlObject as Data;

abstract class RepositoryBaseClass
{
	private $dao;
	public function __construct(Data $dao)
	{
		$this->dao = $dao;
		
	}
	
	
}