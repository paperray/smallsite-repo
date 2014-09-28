<?php namespace Paperstreetmedia\Ajax;

interface AjaxInterface{

    public function post($data = array());
	
    public function get($data = array());
	
    static public function delete($data = array());
	
}