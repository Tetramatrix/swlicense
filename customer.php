<?php
/*
*      Copyright (c) 2019 Chi Hoang 
*      All rights reserved
*
*/
namespace SwLicense;

class Customer  {
    
    private $name;
    private $pwd;
    private $email;
    private $timestamp;
    
    private $component;
    
    public function __construct($name,$pwd,$email) 
    {
        $this->name=$name;
        $this->pwd=$pwd;
        $this->email=$email;
    }
    
    public function __call($name, $arguments) 
    {
        if (method_exists($this->component, strtolower($name))) 
        {
            return call_user_func_array(array($this->component, strtolower($name)), $arguments);
        }
    }
    
    public function debug($arguments)
    {
        return print_r($this->component->value);
    }
    
    public function license($arguments)
    {
	echo "License: ".$this->component->value["license"].chr(0xA).
        "Price: ".$this->component->value["price"].chr(0xA).
        "Websites: ".$this->component->value["websites"].chr(0xA).
        "Expire: ".$this->component->value["expire"].chr(0xA).
        $this->isExpired($this->component->value).chr(0xA);
    }
    
    public function websites($arguments)
    {
	echo "Websites: ".$this->isWebsites($this->component->value).chr(0xA);
    }
    
    public function customer($arguments)
    {
	echo "Customer: ".$this->isCustomer($arguments).chr(0xA);
    }
     
    public function order($component, $websites=null)
    {
        if ($component->execute != "") {
            $this->component=$component;
            $component->value["customer"]=$this->{$component->execute}("Customer: ".$this->name." PWD: ".$this->pwd." email: ".$this->email);
        }
    }
}