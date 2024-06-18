<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//GROUP CRUD----------------------------------------------------------------


//$routes->get('/','Home::index');


$routes->group("api", function ($routes){
    $routes->post("register", "Register::index");
    $routes->post("login", "Login::index");
    $routes->get("users", "User::viewList",['filter' => 'authFilter']);
    $routes->get("elements", "Element::viewList",['filter' => 'authFilter']);
});

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

$routes->group("element", function($routes){
    $routes->get("/", "element::index");
    $routes->get("show", "element::index");
    $routes->get("edit/(:num)","element::singleElement/$1");
    $routes->get("delete/(:num)","element::delete/$1");
    $routes->post("add","element::create");
    $routes->post("update","element::update");
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
    $routes->get("edit/(:num)","elementStatus::singleElementStatus/$1");
    $routes->get("delete/(:num)","elementStatus::delete/$1");
    $routes->post("add","elementStatus::create");
    $routes->post("update","elementStatus::update");
});

$routes->group("category", function($routes){
    $routes->get("/", "category::index");
    $routes->get("show", "category::index");
    $routes->get("edit/(:num)","category::singleCategory/$1");
    $routes->get("delete/(:num)","category::delete/$1");
    $routes->post("add","category::create");
    $routes->post("update","category::update");
});

$routes->group("requestStatus", function($routes){
    $routes->get("/", "requestStatus::index");
    $routes->get("show", "requestStatus::index");
    $routes->get("edit/(:num)","requestStatus::RequestStatus/$1");
    $routes->get("delete/(:num)","requestStatus::delete/$1");
    $routes->post("add","requestStatus::create");
    $routes->post("update","requestStatus::update");
});

//GROUP ROUTES
$routes->group("profile",['filter' => 'AuthCheck'], function ($routes) {
    $routes->get("show/(:num)", "Profile::index/$1");
  });
  
  $routes->group("login", function ($routes) {
    $routes->get("/", "Login::index",['filter' => 'AlreadyLoggedIn']);
    $routes->get("show", "Login::index",['filter' => 'AlreadyLoggedIn']);
    $routes->post("logIn", "Login::logIn");
    $routes->post("singOff", "Login::singOff");
    $routes->post("forgerPassword", "Login::forgerPassword");
  });
  
  
  $routes->group("dashboard", function ($routes) {
    $routes->get("/", "Dashboard::index",['filter' => 'AuthCheck']);
  
  });
  
  $routes->get("/", "Login::index",['filter' => 'AlreadyLoggedIn']);
  