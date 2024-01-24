<?php
include 'config.php';

spl_autoload_register(function ($className) {
    include 'class/' . $className . '.php';
});

$area = ($_REQUEST['area']) ?? '';
$checkLogin = ($_POST['checkLogin']) ?? '';
$action = ($_REQUEST['action']) ?? '';
$passwort = ($_POST['passwort']) ?? '';
$seite = ($_POST['seite']) ?? '';
Session_start();
//    if (isset($_SESSION['userId'])) {
//        $u= new User();
//        $user = $u->getObjectById($_SESSION['userId']);
//    } else {
//        if ($action === 'checkLogin') {
//            $view =  User::checkLogin($name,$passwort);
//            if(isset($_SESSION['userId'])) {
//
//                $u = new  User();
//                $u->getObjectById($_SESSION['userId']);
//                $user= $u->getObjectById($_SESSION['userId']);
//
//                $area = 'haupseite';
//                $view='view';
//                $a = new Aufgaben();
//                $aArr = $a->getAllAsObjects();
//            }
//        } else {
//            $view = 'login';
//            //include PATH_TO_VIEW.'/login.php';
//        }
//    }

if ($action == 'showaufgabeBild') {
    $a = new Aufgaben();
    $aArr = $a->getAllAsObjects()[0];
}
if ($action == 'showaufgabeBild') {
    include 'view/aufgabeBild.php';

} else {
    include 'view/hauptseite.php';
}




