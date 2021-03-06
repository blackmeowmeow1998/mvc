<?php
namespace Black;

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/mvc/src/" 
            || $url == "/mvc/")
        {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 3);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}
?>