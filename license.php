<?php
/*
*      Copyright (c) 2019 Chi Hoang 
*      All rights reserved
*
*/
namespace SwLicense;

class License {
    
    public $execute;
    
    public function __construct($execute="Order")
    {
        $this->execute=$execute;
    }    
    
    public function isExpired($arguments)
    {
        return "Is expired: " . ($arguments["isExpired"] < time() ? "Yes." : "No.");
    }

    public function isWebsites($arguments)
    {
 	return implode("",$arguments["website"]);
    }
    
    public function isCustomer($arguments)
    {
	return $arguments;
    }
    
    public function __toString()
    {
	if ($this->value)
	{
	    $_string=$this->value;    
	} else 
	{
	    $_string=$this->execute;
	}
        return $_string;
    }
}