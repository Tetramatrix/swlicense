<?php
/*
*      Copyright (c) 2019 Chi Hoang 
*      All rights reserved
*
*/

namespace SwLicense;

abstract class AbstractDecorator {
    
    private $component;
    const COMPONENT_CLASS = false;
  
    public function __construct($component,$value=null)
    {    
        $this->component=$component;
        $type=constant(get_class($this).'::COMPONENT_CLASS');        
     
        if ($type == "Delete") {
            
            $this->number= $component->number == null ? 0 : $component->number;
            $this->websites=$this->component->websites;
            $this->order($component, $value, $type); 
            $this->$type=$value;
            
        } else if($type == "License")      
        {
            $websites = constant(get_class($this).'::websites');
            $this->websites = $websites =="Infinite" ? INFINITE : $websites;
            $this->number= $component->number == null ? 0 : $component->number;
            $this->$type=$value;
            $this->timestamp = time();
            $this->order($component,  $this->websites); 
            
        } else if ($type == "Website") {
            
            $this->websites=$this->component->websites;
            $t=$this->component->number;
            $this->number=++$t;
            $this->$type=$value;
        }
        return;
    }
  
    public function __call($name, $arguments) 
    {
        if (method_exists($this->component, strtolower($name)))
        {
            return call_user_func_array(array($this->component, strtolower($name)), $arguments);
        } 
    }
    
    public function __get($name)
    {
        return $this->component->$name;
    }
   
    public function __set($name, $value)
    {
        $name=strtolower($name);
        $this->$name = $value;
    }
   
    public function __isset($name)
    {
        return isset($this->component->$name);
    }
}




