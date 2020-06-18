<?php
session_start();
include 'connexion.php';
include 'header.php';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
else{
    $action='';
}
if($action=='saisiemess')
//saisie
{
    include 'saisiemess.php';
}
//liste
elseif ($action=='listemess'){
     include 'listemess.php';
}
//Suppression
elseif ($action=='supprmess'){
     include 'supprmess.php';
}

elseif ($action==''){
     include 'accueil.php';
}
else{
    echo "erreur d'action";
}

include 'footer.php';
?>
