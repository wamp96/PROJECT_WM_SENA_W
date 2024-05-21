<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//GROUP CRUD----------------------------------------------------------------

$routes->group("userStatus", function($routes){
    $routes->get("/", "userStatus::index");
    $routes->get("show", "UserStatus::index");
    $routes->get("edit/(:num)","UserStatus::singleUserStatus/$1");
    $routes->get("delete/(:num)","UserStatus::delete/$1");
    $routes->post("add","UserStatus::create");
    $routes->post("update","UserStatus::update");
});

$routes->group("user", function($routes){
    $routes->get("/", "user::index");
    $routes->get("show", "user::index");
    $routes->get("edit/(:num)","user::singleUser/$1");
    $routes->get("delete/(:num)","user::delete/$1");
    $routes->post("add","user::create");
    $routes->post("update","user::update");
});