<?php
/*
*      Copyright (c) 2019 Chi Hoang 
*      All rights reserved
*
*/
namespace SwLicense;

class AddPlusLicense extends AbstractDecorator {

    const COMPONENT_CLASS = 'License';
    const license = "Plus";
    const price = "$99";
    const websites = "3";
    const expire = "1 year";
        
    public function order($component, $websites=null, $cmd=null)
    {
        if (empty($component->value["license"])) {
            $component->value["license"] = self::license;
        }
        if (empty($component->value["price"])) {
            $component->value["price"] = self::price;
        }
        if (empty($component->value["websites"])) {
            $component->value["websites"] = self::websites;
        }
        if (empty($component->value["expire"])) {
            $component->value["expire"] = self::expire;
        }
        if (empty($component->value["timestamp"])) {
            $component->value["timestamp"] = $this->timestamp;
        }
        if (empty($component->value["isExpired"])) {
            $component->value["isExpired"] = strtotime('+1 years', $this->timestamp);
        }
        parent::order($component, $websites, $cmd);    
    }    
}


