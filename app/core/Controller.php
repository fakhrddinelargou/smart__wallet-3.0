<?php
class Controller
{
    protected function view($path, $data = [])
    {
        extract($data);
        $url = "../app/views/" . $path . ".php";
        require $url;
    }
}
?>