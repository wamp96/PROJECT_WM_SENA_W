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

//
$routes->group("profile",['filter' => 'AuthCheck'], function ($routes) {
  $routes->get("show/(:num)", "Profile::index/$1");
  $routes->post("create", "Profile::create");
  $routes->post("update", "Profile::update");
});

//ROUTES CRUD LOGIN---------------------------------------------------------
$routes->group("login", function ($routes) {
  $routes->get("/", "Login::index",['filter' => 'AlreadyLoggedIn']);
  $routes->get("show", "Login::index",['filter' => 'AlreadyLoggedIn']);
  $routes->post("logIn", "Login::logIn");
  $routes->post("signOff", "Login::signOff");
  $routes->post("forgerPassword", "Login::forgerPassword");
});

//ROUTES CRUD DASHBOARD---------------------------------------------------------
$routes->group("dashboard", function ($routes) {
  $routes->get("/", "Dashboard::index",['filter' => 'AuthCheck']);
  
});

//---------------------------ROUTES CRUD USER----------------------------------------------------------------

$routes->group("user", function($routes){
  $routes->get("/", "user::index");
    $routes->get("show", "user::index");
    $routes->get("edit/(:num)","user::singleUser/$1");
    $routes->get("delete/(:num)","user::delete/$1");
    $routes->post("add","user::create");
    $routes->post("update","user::update");
  });
  
//ROUTES CRUD USERSTATUS---------------------------------------------------------
$routes->group("userStatus", function($routes){
  $routes->get("/", "userStatus::index");
  $routes->get("show", "UserStatus::index");
  $routes->get("edit/(:num)","UserStatus::singleUserStatus/$1");
  $routes->get("delete/(:num)","UserStatus::delete/$1");
  $routes->post("add","UserStatus::create");
  $routes->post("update","UserStatus::update");
});

//ROUTES CRUD CITY----------------------------------------------------------------
$routes->group("city", function($routes){
  $routes->get("/", "City::index");
  $routes->get("show", "City::index");
  $routes->get("edit/(:num)","City::singleCity/$1");
  $routes->get("delete/(:num)","City::delete/$1");
  $routes->post("add","City::create");
  $routes->post("update","City::update");
});

//ROUTES CRUD AREA----------------------------------------------------------------
$routes->group("area", function($routes){
  $routes->get("/", "Area::index");
  $routes->get("show", "Area::index");
  $routes->get("edit/(:num)","Area::singleArea/$1");
  $routes->get("delete/(:num)","Area::delete/$1");
  $routes->post("add","Area::create");
  $routes->post("update","Area::update");
});

//ROUTES CRUD ROLE----------------------------------------------------------------
$routes->group("role", function($routes){
  $routes->get("/", "role::index");
  $routes->get("show", "role::index");
  $routes->get("edit/(:num)","role::singleRole/$1");
  $routes->get("delete/(:num)","role::delete/$1");
  $routes->post("add","role::create");
  $routes->post("update","role::update");
});



//--------------------------------------ROUTES CRUD ELEMENT----------------------------------------------------------------
$routes->group("element", function($routes){
  $routes->get("/", "element::index");
  $routes->get("show", "element::index");
  $routes->get("edit/(:num)","element::singleElement/$1");
  $routes->get("delete/(:num)","element::delete/$1");
  $routes->post("add","element::create");
  $routes->post("update","element::update");
});

//ROUTES CRUD MODEL----------------------------------------------------------------
$routes->group("model", function($routes){
  $routes->get("/", "Model::index");
  $routes->get("show", "Model::index");
  $routes->get("edit/(:num)","Model::singleModel/$1");
  $routes->get("delete/(:num)","Model::delete/$1");
  $routes->post("add","Model::create");
  $routes->post("update","Model::update");
});

//ROUTES CRUD BRAND----------------------------------------------------------------
$routes->group("brand", function($routes){
  $routes->get("/", "Brand::index");
  $routes->get("show", "Brand::index");
  $routes->get("edit/(:num)","Brand::singleBrand/$1");
  $routes->get("delete/(:num)","Brand::delete/$1");
  $routes->post("add","Brand::create");
  $routes->post("update","Brand::update");
});
//ROUTES CRUD ELEMENTSTATUS----------------------------------------------------------------
$routes->group("elementStatus", function($routes){
  $routes->get("/", "elementStatus::index");
  $routes->get("show", "elementStatus::index");
  $routes->get("edit/(:num)","elementStatus::singleElementStatus/$1");
  $routes->get("delete/(:num)","elementStatus::delete/$1");
  $routes->post("add","elementStatus::create");
  $routes->post("update","elementStatus::update");
});

//ROUTES CRUD CATEGORY----------------------------------------------------------------
$routes->group("category", function($routes){
  $routes->get("/", "category::index");
  $routes->get("show", "category::index");
  $routes->get("edit/(:num)","category::singleCategory/$1");
  $routes->get("delete/(:num)","category::delete/$1");
  $routes->post("add","category::create");
  $routes->post("update","category::update");
});

$routes->group("userElement", function($routes){
  $routes->get("/", "UserElement::index");
  $routes->get("view", "UserElement::viewElement");
});



/**
 * Routes for requestStatus
 */
$routes->group("requestStatus", function($routes){
  $routes->get("/", "requestStatus::index");
  $routes->get("show", "requestStatus::index");
  $routes->get("edit/(:num)","requestStatus::RequestStatus/$1");
  $routes->get("delete/(:num)","requestStatus::delete/$1");
  $routes->post("add","requestStatus::create");
  $routes->post("update","requestStatus::update");
});

/**
 * Routes for request
 */
$routes->group("request", function($routes){
  $routes->get("/", "Request::index");
  $routes->get("show", "Request::index");
  $routes->get("view", "Request::viewRequest");
  $routes->get("edit/(:num)","Request::request/$1");
  $routes->get("delete/(:num)","Request::delete/$1");
  $routes->post("add","Request::create");
  $routes->post("update","Request::update");
});

$routes->group("module",['filter' => 'AuthCheck'],function($routes){
  $routes->get("/", "Module::index");
  $routes->get("show", "Module::index");
  $routes->get("edit/(:num)", "Module::singleModule/$1");
  $routes->get("delete/(:num)", "Module::delete/$1");
  $routes->post("add", "Module::create");
  $routes->post("update", "Module::update");
});

$routes->group("roleModule",['filter' => 'AuthCheck'],function($routes){
  $routes->get("/", "RoleModule::index");
  $routes->get("show", "RoleModule::index");
  $routes->get("edit/(:num)", "RoleModule::singleRoleModule/$1");
  $routes->get("editPermission/(:num)", "RoleModule::singlePermissionsModuleId/$1");
  $routes->get("editModules/(:num)", "RoleModule::singleRoleModuleId/$1");
  $routes->get("delete/(:num)", "RoleModule::delete/$1");
  $routes->post("add", "RoleModule::create");
  $routes->post("update", "RoleModule::update");
});



//ROUTES CRUD PERMISSION----------------------------------------------------------------

$routes->group("permission", function($routes){
  $routes->get("/", "Permission::index");
  $routes->get("show", "Permission::index");
  $routes->get("edit/(:num)","Permission::singlePermission/$1");
  $routes->get("delete/(:num)","Permission::delete/$1");
  $routes->post("add","Permission::create");
  $routes->post("update","Permission::update");
});

  // $routes->group("permission",['filter' => 'AuthCheck'],function($routes){
  //   $routes->get("/", "Permission::index");
  //   $routes->get("show", "Permission::index");
  //   $routes->get("edit/(:num)", "Permission::singlePermission/$1");
  //   $routes->get("delete/(:num)", "Permission::delete/$1");
  //   $routes->post("add", "Permission::create");
  //   $routes->post("update", "Permission::update");
  // });
  $routes->get("/", "Login::index",['filter' => 'AlreadyLoggedIn']);