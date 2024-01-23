<?php
include 'config.php';

spl_autoload_register(function ($className) {
    include 'class/' . $className . '.php';
});

$area = ($_REQUEST['area']) ?? '';
$checkLogin = ($_POST['checkLogin']) ?? '';
$action = ($_REQUEST['action']) ?? '';

Session_start();
    if (isset($_SESSION['userId'])) {
        $u= new User();
        $user = $u->getObjectById($_SESSION['userId']);
    } else {
        if ($action === 'checkLogin') {
            $view =  User::checkLogin($name,$passwort);
            if(isset($_SESSION['userId'])) {

                $u = new  User();
                $u->getObjectById($_SESSION['userId']);
                $user= $u->getObjectById($_SESSION['userId']);

                $area = 'mitarbeiter';
                // $view = 'liste';
                $m = new Mitarbeiter();
                $mArr = $m->getAllAsObjects();
            }
        } else {
            $view = 'login';
            //include PATH_TO_VIEW.'/login.php';
        }
    }//echo $view;


