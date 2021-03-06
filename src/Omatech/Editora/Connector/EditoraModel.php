<?php

namespace Omatech\Editora\Connector;

use App;
use Omatech\Editora\Extractor\Extractor;

class EditoraModel
{
    public static $debugMessages = "";

    public static function extractor($params=array()) {
        $editora_conn_array = array(
            'dbname' =>  env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'driver' => 'pdo_mysql',
            'charset' => 'utf8'
        );

        if (!array_key_exists('lang', $params)){
            $params['lang'] = App::getLocale();
        }

        if (!array_key_exists('metadata', $params)){
            $params['metadata'] = true;
        }

        if (!array_key_exists('timings', $params)){
            $params['timings'] = true;
        }
        if (!array_key_exists('show_inmediate_debug', $params)){
            $params['show_inmediate_debug'] = true;
        }

        $extractor = new Extractor($editora_conn_array, $params);


        return $extractor;
    }


}
