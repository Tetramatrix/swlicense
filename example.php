<?php
/*
*      Copyright (c) 2019 Chi Hoang 
*      All rights reserved
*/

error_reporting(E_ERROR | E_PARSE);

require_once ("decorator.php");
require_once ("license.php");
require_once ("customer.php");
require_once ("pluslic.php");
require_once ("infinilic.php");
require_once ("singlelic.php");
require_once ("websites.php");

use PHPUnit\Framework\TestCase;

$customer=new SwLicense\Customer("John","Doe","JohnDoe@test.com");
$customer=new SwLicense\AddInfiniteLicense($customer);
$customer=new SwLicense\AddWebsite($customer,"www.test1.com");
$customer=new SwLicense\AddWebsite($customer,"www.test2.com");
$customer=new SwLicense\AddWebsite($customer,"www.test3.com");
$customer=new SwLicense\AddWebsite($customer,"www.test4.com");

echo $customer->order(new SwLicense\License("Customer"));
echo $customer->order(new SwLicense\License("License"));
echo $customer->order(new SwLicense\License("Websites"));

$customer=new SwLicense\AddSingleLicense($customer);
$customer=new SwLicense\AddWebsite($customer,"www.test5.com");
$customer=new SwLicense\DeleteWebsite($customer,"www.test1.com");
$customer=new SwLicense\DeleteWebsite($customer,"www.test3.com");
$customer=new SwLicense\AddWebsite($customer,"www.test6.com");

echo $customer->order(new SwLicense\License("Customer"));
echo $customer->order(new SwLicense\License("License"));
echo $customer->order(new SwLicense\License("Websites"));

$customer=new SwLicense\AddPlusLicense($customer);
echo $customer->order(new SwLicense\License("Customer"));
echo $customer->order(new SwLicense\License("License"));
echo $customer->order(new SwLicense\License("Websites"));

echo $customer->order(new SwLicense\License("Debug"));

