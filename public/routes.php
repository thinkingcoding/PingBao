<?php

// define routes

$routes = array(
    array(
        "pattern" => "index",
        "controller" => "home",
        "action" => "index"
    ),
    array(
        "pattern" => "register",
        "controller" => "users",
        "action" => "register"
    ),
    array(
        "pattern" => "login",
        "controller" => "users",
        "action" => "login"
    ),
    array(
        "pattern" => "logout",
        "controller" => "users",
        "action" => "logout"
    ),
    array(
        "pattern" => "reviews/add/step1",
        "controller" => "reviews",
        "action" => "add_step1"
    ),
    array(
        "pattern" => "reviews/add/step2",
        "controller" => "reviews",
        "action" => "add_step2"
    ),
    array(
            "pattern" => "reviews/add/step3",
            "controller" => "reviews",
            "action" => "add_step3"
    )
);

// add defined routes

foreach ($routes as $route)
{
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals

unset($routes);
