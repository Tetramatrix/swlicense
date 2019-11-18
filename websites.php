<?php
/*
*      Copyright (c) 2019 Chi Hoang 
*      All rights reserved
*
*/
namespace SwLicense;

Const INFINITE = 9999999;

class AddWebsite extends AbstractDecorator {

    const COMPONENT_CLASS = 'Website';   
  
    public function order($component, $websites=null, $cmd=null)
    {
        if ($this->website == $websites && $cmd == "Delete") {
            $this->number=-1;
        } else if ($cmd == "Delete") {
            --$this->number;
        }
        if ($cmd == null) {
            if ($this->websites!=$websites && $websites!=null) {
                $this->websites=$websites;
            }
            if ($this->number !== null && $this->number > -1  && ($this->websites>=$this->number || $websites == INFINITE)) {
                $component->value["website"][] = "Has $this->website website. ";    
            }    
        }
        parent::order($component, $websites, $cmd);    
    }
}

class DeleteWebsite extends AbstractDecorator {

    const COMPONENT_CLASS = 'Delete';   
  
    public function order($component, $value=null, $cmd=null)
    {                
        parent::order($component, $value, $cmd);    
    }
}