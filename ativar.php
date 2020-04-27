<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}

    if(!empty($_GET['oab'])) {
        $r = $db->prepare("UPDATE advogado SET ativo=1 WHERE oab=?");
        $r->execute(array(base64_decode($_GET['oab'])));
        $_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Advogado Oab ".base64_decode($_GET['oab'])." ativado', status: 'success'})</script>";
        header("location: admIndex.php");
    }
?>