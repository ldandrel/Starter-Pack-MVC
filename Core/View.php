<?php

namespace Core;

use App\Config;

class View
{

    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/App/Views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . '/App/Views');
            $twig = new \Twig_Environment($loader);

            $asset = new \Twig_Function('asset', function ($path) {
                return  Config::URL . 'assets/' . $path;
            });

            $title = new \Twig_Function('title', function ($title = null) {
                if($title) return $title . ' - ' . Config::NAME;
                else return Config::NAME;
            });

            $date = new \Twig_Function('date', function ($original_date) {
                return date("l, F jS Y", strtotime($original_date));
            });

            $twig->addFunction($asset);
            $twig->addFunction($title);
            $twig->addFunction($date);


        }


        echo $twig->render($template, $args);
    }
}
