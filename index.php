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
$neueslevel = ($_GET['neueslevel']) ?? -1;
if ($neueslevel==''){
    $neueslevel=1;

}

echo '<pre>';
print_r($neueslevel);
echo '</pre>';
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
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
if ($action == 'showaufgabeBild') {
    $a = new Aufgaben();
    $aArr = $a->getAllAsObjects()[$neueslevel-1];
    print_r($aArr);
    $v = new Sprache();
    $id = $aArr['sprachdateiId'];
    echo $id;
    $vArr = $v->getObjectById($id);
    $win = $aArr['loesung1'];
    $l1 = $a->getLoesung01($neueslevel);
    $l2 = $a->getLoesung02($neueslevel);
    $l3 = $a->getLoesung03($neueslevel);
    $l4 = $a->getLoesung04($neueslevel);

}

if ($action == 'showaufgabeBild') {

    if ($neueslevel>=0 && $neueslevel <= 9) {
        include 'view/aufgabeBild.php';
    } elseif ($neueslevel <= 18) {
        include 'view/aufgabeZweiBilder.php';
    } elseif ($neueslevel <= 54) {
        include 'view/aufgabeZahlenschlange.php';
    } elseif ($neueslevel <= 144) {
        include 'view/aufgabePlusMinus.php';
    }
    } else {
        include 'view/hauptseite.php';
    }





