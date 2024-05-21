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

$routes->group("role", function($routes){
    $routes->get("/", "role::index");
    $routes->get("show", "role::index");
    $routes->get("edit/(:num)","role::singleRoles/$1");
    $routes->get("delete/(:num)","role::delete/$1");
    $routes->post("add","role::create");
    $routes->post("update","role::update");
});

$routes->group("user", function($routes){
    $routes->get("/", "user::index");
    $routes->get("show", "user::index");
    $routes->get("edit/(:num)","user::singleUser/$1");
    $routes->get("delete/(:num)","user::delete/$1");
    $routes->post("add","user::create");
    $routes->post("update","user::update");
});

$routes->group("permission", function($routes){
    $routes->get("/", "Permission::index");
    $routes->get("show", "Permission::index");
    $routes->get("edit/(:num)","Permission::singlePermission/$1");
    $routes->get("delete/(:num)","Permission::delete/$1");
    $routes->post("add","Permission::create");
    $routes->post("update","Permission::update");
});

$routes->group("elementStatus", function($routes){
    $routes->get("/", "elementStatus::index");
    $routes->get("show", "elementStatus::index");
    $routes->get("edit/(:num)","elementStatus::singlePermission/$1");
    $routes->get("delete/(:num)","elementStatus::delete/$1");
    $routes->post("add","elementStatus::create");
    $routes->post("update","elementStatus::update");
});
