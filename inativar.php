<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}

    if(!empty($_GET['oab'])) {
        $r = $db->prepare("SELECT id FROM processo WHERE situacao='andamento' AND oabAdvogado=?");
        $r->execute(array(base64_decode($_GET['oab'])));
        if($r->rowCount()>0) {$_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Advogado com processo em andamento', status: 'danger'})</script>"; header("location: admIndex.php");}
        else {
            $r = $db->prepare("UPDATE advogado SET ativo=0 WHERE oab=?");
            $r->execute(array(base64_decode($_GET['oab'])));
            $_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Advogado Oab ".base64_decode($_GET['oab'])." inativado', status: 'success'})</script>";
            header("location: admIndex.php");
        }
    }

    elseif(!empty($_GET['cod'])) {
        $r = $db->prepare("SELECT id FROM processo WHERE situacao='andamento' AND codJuiz=?");
        $r->execute(array(base64_decode($_GET['cod'])));
        if($r->rowCount()>0) {$_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Juíz com processo em andamento', status: 'danger'})</script>"; header("location: admIndex.php");}
        else {
            $r = $db->prepare("UPDATE juiz SET ativo=0 WHERE cod=?");
            $r->execute(array(base64_decode($_GET['cod'])));
            $_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Juíz Cod ".base64_decode($_GET['cod'])." inativado', status: 'success'})</script>";
            header("location: admIndex.php");
        }
    }

    elseif (!empty($_GET['cpf'])) {
        $r = $db->prepare("SELECT id FROM processo WHERE situacao='andamento' AND cpfCliente=?");
        $r->execute(array(base64_decode($_GET['cpf'])));
        if($r->rowCount()>0) {$_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Cliente com processo em andamento', status: 'danger'})</script>"; header("location: advIndex.php");}
        else {
            $r = $db->prepare("UPDATE cliente SET ativo=0 WHERE cpf=?");
            $r->execute(array(base64_decode($_GET['cpf'])));
            $_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Cliente Cpf ".base64_decode($_GET['cpf'])." inativado', status: 'success'})</script>";
            header("location: advIndex.php");
        }
    }
?>