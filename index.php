<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . "/inc/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI']);
parse_str($uri["query"], $query_arr);
$params = '';

switch(array_keys($query_arr)[0]){
case 'products':
    $uri_endpoint = 'products'; 
    break;
case 'product':
    $uri_endpoint = 'product';
    $params = $query_arr['product'];
    break;
case 'groups':
    $uri_endpoint = 'groups'; 
    break;
case 'group':
    $uri_endpoint = 'group'; 
    $params = $query_arr['group'];
    break;
default:
    $uri_endpoint = 'main';
}
require PROJECT_ROOT_PATH . "/Controller/Api/ShopController.php";

$objUser = new ShopController();
$strMethodName = 'get' . ucfirst($uri_endpoint) . 'Action';

if(isset($params)) {
    $objUser->{$strMethodName}($params);
    return;
}
$objUser->{$strMethodName};