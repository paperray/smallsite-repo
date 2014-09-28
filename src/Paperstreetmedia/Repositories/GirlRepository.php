<?php
namespace Paperstreetmedia\Repositories;

use Paperstreetmedia\DataAccessObject\LaravelMysqlObject as Data;

class GirlRepository implements RepositoryInterface
{
	public function __construct(Data $dao)
	{
		$this->dao = $dao;
	}
	
	public function create()
	{
	
	}
	public function read($id)
	{
	
	}
	public function readAll(array $data)
	{
		return $this->dao->readAll($data);
	}
	public function update($id)
	{
	
	}	
	public function delete($id)
	{
	
	}
}