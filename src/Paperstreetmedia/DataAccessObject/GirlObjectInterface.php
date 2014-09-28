<?php
namespace Paperstreetmedia\DataAccessObject;

interface GirlObjectInterface
{
	public function create();
	public function read($id);
	public function readAll(array $data);
	public function update($id);
	public function delete($id);
	
}