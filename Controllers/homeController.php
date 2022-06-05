<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('connection.php');
class HomeController
{
    function index()
    {
        require_once('Views/Home/inicio.php');
    }

    function error()
    {
        require_once('Views/Home/error.php');
    }
    function sesion()
    {
        require_once('Views/Home/sesion.php');
    }
    function login()
    {
        require_once('Views/Home/login.php');
    }

    function restore()
    {
        require_once('Views/Home/restore.php');
    }
    function restorepwd()
    {
        require_once('Views/Home/restorepwd.php');
    }
}
