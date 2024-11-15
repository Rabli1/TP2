<?php


function uriPath() : string{

    $url = $_SERVER['REQUEST_URI'];

    $urlParts = parse_url($url);
    
    return $urlParts['path'];

}


function routeToController(string $path) : void {

    $validRouteController = false;

    if (array_key_exists($path, ROUTES)) {

        $filePath = 'controllers/' . ROUTES[$path];

        if ( file_exists($filePath) ) {

            $validRouteController = true;
            require $filePath;
            
        }

    } 

    if (! $validRouteController) {

        require "views/page-not-found.php";
        
    }

}

function urlActive(string|array $paths, string $class) : string
{

    $path = uriPath();

    if ( is_array($paths) && in_array($path, $paths) ) {
        return $class;
    } 
    
    if ( $path === $paths ) {
        return $class;
    }

    return "";

}

function redirect(string $path) : void 
{
    header('Location: ' . $path);
    exit;

}