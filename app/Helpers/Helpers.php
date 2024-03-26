<?php

use Illuminate\Support\Str;

define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("DEFAULTPASSWORD", "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi");

function userFullName(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nom;

        if($i < sizeof(auth()->user()->roles) - 1){
            $rolesName .= ",";
        }
        $i++;
    }

    return $rolesName;
    
}

function setMenuClasse($route, $classe){
    $routeActuel = request()->route()->getName();

    if( contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if( $routeActuel === $route) {
        return 'active';
    }
    return "";
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}

