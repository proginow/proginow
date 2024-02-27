<?php

namespace Core\Classes;


class Session{
    public static function add($name, $value){
        return \Proginow\Cookie\Session::set($name, $value);
    }
    
    public static function update($name, $value){
        return \Proginow\Cookie\Session::set($name, $value);
    }

    public static function get($name){
        return \Proginow\Cookie\Session::get($name);
    }

    public static function has($name){
        return \Proginow\Cookie\Session::has($name);
    }

    public static function remove($name){
        return \Proginow\Cookie\Session::delete($name);
    }
}

?>
