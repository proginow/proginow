<?php

namespace Core\Classes;

use Exception;

class Errorhandler{

    public static function handleErrors($error_number, $error_message, $error_file, $error_line){
        $error="[{$error_number}] And Error occurred in file
        {$error_file} on line $error_line: $error_message";

        $environment=$_ENV['APP_ENV'];

        if($environment==='local'){
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        }else{
            ErrorHandler::log($error);
        }
    }

    private static function log($error){
        return file_put_contents(__DIR__."/../../storage/log/".time(),$error);
    }
}

?>