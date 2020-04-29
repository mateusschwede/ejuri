<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}
    if(!empty($_GET['id'])) {$_SESSION['id'] = base64_decode($_GET['id']);}

    if(!empty($_POST['justificativaInd'])) {
        $r = $db->prepare("UPDATE processo SET situacao='indeferido',dataEncerramento=now(),justificativa=? WHERE id=?");
        $r->execute(array($_POST['justificativaInd'],$_SESSION['id']));
        $_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Processo ".$_SESSION['id']." indeferido', status: 'success'})</script>";
        unset($_SESSION['id']);
        header("location: juIndex.php");
    } elseif (!empty($_POST['justificativaDef'])) {
        $r = $db->prepare("UPDATE processo SET situacao='deferido',dataEncerramento=now(),justificativa=? WHERE id=?");
        $r->execute(array($_POST['justificativaDef'],$_SESSION['id']));
        $_SESSION['msgm'] = "<script>UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Processo ".$_SESSION['id']." deferido', status: 'success'})</script>";
        unset($_SESSION['id']);
        header("location: juIndex.php");
    }
?>

<!doctype html>
<html lang="pt-br">
<body>


    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
                <nav class="uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active"><a href="advIndex.php"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#84160b"><path d="M86,65.84375c-8.19688,0 -15.18438,-5.77812 -17.06562,-13.4375h-28.62188c-2.28437,0 -4.03125,-1.74687 -4.03125,-4.03125c0,-2.28438 1.74688,-4.03125 4.03125,-4.03125h32.25c2.28437,0 4.03125,1.74687 4.03125,4.03125c0,5.24063 4.16563,9.40625 9.40625,9.40625c5.24063,0 9.40625,-4.16562 9.40625,-9.40625c0,-2.28438 1.74688,-4.03125 4.03125,-4.03125h32.25c2.28438,0 4.03125,1.74687 4.03125,4.03125c0,2.28438 -1.74687,4.03125 -4.03125,4.03125h-28.62188c-1.88125,7.65938 -8.86875,13.4375 -17.06562,13.4375z"></path><path d="M86,150.5c-2.28437,0 -4.03125,-1.74687 -4.03125,-4.03125v-84.65625c0,-2.28438 1.74688,-4.03125 4.03125,-4.03125c2.28437,0 4.03125,1.74687 4.03125,4.03125v84.65625c0,2.28438 -1.74688,4.03125 -4.03125,4.03125zM86,38.96875c-1.075,0 -2.15,-0.40313 -2.82188,-1.20938c-0.80625,-0.67187 -1.20937,-1.74687 -1.20937,-2.82187c0,-1.075 0.40313,-2.15 1.20937,-2.82187c1.47813,-1.47813 4.16563,-1.47813 5.64375,0c0.80625,0.80625 1.20938,1.74687 1.20938,2.82187c0,1.075 -0.40313,2.15 -1.20938,2.82187c-0.67187,0.80625 -1.74687,1.20938 -2.82187,1.20938z"></path><path d="M112.875,163.9375c-1.075,0 -2.01562,-0.40312 -2.82187,-1.20937l-3.89688,-3.89688c-5.375,-5.375 -12.49688,-8.33125 -20.15625,-8.33125c-7.65937,0 -14.78125,2.95625 -20.15625,8.33125l-3.89688,3.89688c-1.6125,1.6125 -4.16562,1.6125 -5.64375,0c-1.6125,-1.6125 -1.6125,-4.16563 0,-5.64375l3.89687,-3.89688c6.85312,-6.85312 15.99063,-10.75 25.8,-10.75c9.80938,0 18.94687,3.7625 25.8,10.75l3.89688,3.89688c1.6125,1.6125 1.6125,4.16562 0,5.64375c-0.80625,0.80625 -1.74688,1.20937 -2.82188,1.20937zM38.96875,163.9375c-1.075,0 -2.15,-0.40312 -2.82187,-1.20937c-0.80625,-0.80625 -1.20938,-1.74688 -1.20938,-2.82188c0,-1.075 0.40313,-2.15 1.20938,-2.82188c1.47812,-1.47812 4.16562,-1.47812 5.64375,0c0.80625,0.80625 1.20937,1.74688 1.20937,2.82188c0,1.075 -0.40312,2.15 -1.20937,2.82188c-0.67187,0.80625 -1.74687,1.20937 -2.82187,1.20937z"></path><path d="M126.3125,163.9375h-67.1875c-2.28438,0 -4.03125,-1.74687 -4.03125,-4.03125c0,-2.28438 1.74687,-4.03125 4.03125,-4.03125h67.1875c2.28438,0 4.03125,1.74687 4.03125,4.03125c0,2.28438 -1.74687,4.03125 -4.03125,4.03125zM163.53438,123.89375c0,-0.13437 0.13437,-0.26875 0.13437,-0.40312c0,-0.13437 0.13438,-0.26875 0.13438,-0.40313c0,-0.13437 0,-0.26875 0,-0.40312c0,-0.13437 0,-0.26875 0,-0.40313c0,0 0,0 0,-0.13437c0,-0.13437 0,-0.13437 0,-0.26875c0,-0.13437 0,-0.26875 0,-0.40313c0,-0.13437 0,-0.26875 -0.13438,-0.40312c0,-0.13437 -0.13437,-0.26875 -0.13437,-0.40313c0,-0.13437 -0.13438,-0.26875 -0.13438,-0.40312c0,-0.13437 -0.13437,-0.26875 -0.13437,-0.40313c-0.13438,-0.13437 -0.13438,-0.26875 -0.26875,-0.26875c-0.13438,-0.13437 -0.13438,-0.13437 -0.26875,-0.26875c-0.13437,-0.13437 -0.26875,-0.13437 -0.26875,-0.26875l-0.13437,-0.13437c0,0 0,0 -0.13438,0c-0.13437,-0.13437 -0.26875,-0.13437 -0.40312,-0.26875c-0.13437,0 -0.26875,-0.13437 -0.26875,-0.13437c-0.13437,0 -0.26875,-0.13437 -0.40312,-0.13437c-0.13437,0 -0.26875,-0.13437 -0.40312,-0.13437c-0.13438,0 -0.26875,0 -0.40312,0c-0.13438,0 -0.26875,0 -0.40313,0c0,0 0,0 -0.13437,0h-53.61563c0,0 0,0 -0.13437,0c-0.13437,0 -0.26875,0 -0.40313,0c-0.13437,0 -0.26875,0 -0.40312,0c-0.13437,0 -0.26875,0.13437 -0.40313,0.13437c-0.13437,0 -0.26875,0.13437 -0.40312,0.13437c-0.13437,0 -0.26875,0.13437 -0.26875,0.13437c-0.13437,0.13437 -0.26875,0.13437 -0.40312,0.26875c0,0 0,0 -0.13437,0c-0.13437,0 -0.13437,0.13437 -0.13437,0.13437c-0.13437,0.13437 -0.26875,0.13437 -0.26875,0.26875c-0.13437,0.13437 -0.13437,0.13437 -0.26875,0.26875c-0.13437,0.13437 -0.13437,0.26875 -0.26875,0.26875c-0.13437,0.13437 -0.13437,0.26875 -0.13437,0.40313c0,0.13437 -0.13437,0.26875 -0.13437,0.40312c0,0.13437 -0.13437,0.26875 -0.13437,0.40313c0,0.13437 -0.13437,0.26875 -0.13437,0.40312c0,0.13437 0,0.26875 0,0.40313c0,0.13437 0,0.13437 0,0.26875c0,0 0,0 0,0.13437c0,0.13437 0,0.26875 0,0.40313c0,0.13437 0,0.26875 0,0.40312c0,0.13437 0.13437,0.26875 0.13437,0.40313c0,0.13437 0.13437,0.26875 0.13437,0.40312c0,0.13438 0.13437,0.26875 0.13437,0.26875c0.13437,0.13437 0.13437,0.26875 0.26875,0.40312c0,0 0,0 0,0.13438c7.25625,9.54062 18.275,15.05 30.23437,15.05c11.95937,0 22.97813,-5.50938 30.1,-15.05c0,0 0,0 0,-0.13438c0.13438,-0.13437 0.13438,-0.26875 0.26875,-0.40312c0.13438,0 0.13438,-0.13438 0.13438,-0.26875z"></path><path d="M160.30937,126.3125c-1.47812,0 -2.95625,-0.80625 -3.62812,-2.15l-23.65,-46.62813l-16.52813,33.05625c-0.94062,2.01563 -3.35937,2.82187 -5.375,1.74687c-2.01562,-0.94062 -2.82187,-3.35937 -1.74687,-5.375l20.15625,-40.3125c0.67188,-1.34375 2.01563,-2.28437 3.62813,-2.28437c1.6125,0 2.95625,0.80625 3.62813,2.15l27.14375,53.75c0.94062,2.01563 0.26875,4.43438 -1.74688,5.375c-0.67187,0.5375 -1.34375,0.67188 -1.88125,0.67188zM69.47188,123.89375c0,-0.13437 0.13438,-0.26875 0.13438,-0.40312c0,-0.13437 0.13438,-0.26875 0.13438,-0.40313c0,-0.13437 0,-0.26875 0,-0.40312c0,-0.13437 0,-0.26875 0,-0.40313c0,0 0,0 0,-0.13437c0,-0.13437 0,-0.13437 0,-0.26875c0,-0.13437 0,-0.26875 0,-0.40313c0,-0.13437 0,-0.26875 -0.13438,-0.40312c0,-0.13437 -0.13438,-0.26875 -0.13438,-0.40313c0,-0.13437 -0.13437,-0.26875 -0.13437,-0.40312c0,-0.13437 -0.13438,-0.26875 -0.13438,-0.40313c-0.13438,-0.13437 -0.13438,-0.26875 -0.26875,-0.26875c-0.13438,-0.13437 -0.13438,-0.13437 -0.26875,-0.26875c-0.13438,-0.13437 -0.26875,-0.13437 -0.26875,-0.26875l-0.13438,-0.13437c0,0 0,0 -0.13438,0c-0.13438,-0.13437 -0.26875,-0.13437 -0.40312,-0.26875c-0.13438,0 -0.26875,-0.13437 -0.26875,-0.13437c-0.13438,0 -0.26875,-0.13437 -0.40312,-0.13437c-0.13438,0 -0.26875,-0.13437 -0.40313,-0.13437c-0.13438,0 -0.26875,0 -0.40312,0c-0.13438,0 -0.26875,0 -0.40313,0c0,0 0,0 -0.13438,0h-53.61562c0,0 0,0 -0.13438,0c-0.13437,0 -0.26875,0 -0.40312,0c-0.13438,0 -0.26875,0 -0.40313,0c-0.13438,0 -0.26875,0.13437 -0.40313,0.13437c-0.13437,0 -0.26875,0.13437 -0.40312,0.13437c-0.13437,0 -0.26875,0.13437 -0.26875,0.13437c-0.13437,0.13437 -0.26875,0.13437 -0.40312,0.26875c0,0 0,0 -0.13437,0c-0.13438,0 -0.13438,0.13437 -0.13438,0.13437c0,0.26875 -0.13438,0.40312 -0.26875,0.5375c-0.13437,0.13437 -0.13437,0.13437 -0.26875,0.26875c-0.13438,0.13438 -0.13438,0.26875 -0.26875,0.26875c-0.13438,0.13437 -0.13438,0.26875 -0.13438,0.40312c0,0.13438 -0.13437,0.26875 -0.13437,0.40313c0,0.13437 -0.13438,0.26875 -0.13438,0.40313c0,0.13437 -0.13437,0.26875 -0.13437,0.40312c0,0.13437 0,0.26875 0,0.40313c0,0.13437 0,0.13437 0,0.26875c0,0 0,0 0,0.13437c0,0.13437 0,0.26875 0,0.40313c0,0.13437 0,0.26875 0,0.40312c0,0.13437 0.13437,0.26875 0.13437,0.40313c0,0.13437 0.13438,0.26875 0.13438,0.40312c0,0.13437 0.13437,0.26875 0.13437,0.26875c0.13438,0.13437 0.13438,0.26875 0.26875,0.40312c0,0 0,0 0,0.13437c7.25625,9.27188 18.275,14.78125 30.23438,14.78125c11.95938,0 22.97813,-5.50938 30.1,-15.05c0,0 0,0 0,-0.13438c0.13438,-0.13437 0.13438,-0.26875 0.26875,-0.40312c0.13437,0 0.13437,-0.13438 0.13437,-0.26875z"></path><path d="M66.24688,126.3125c-1.47813,0 -2.95625,-0.80625 -3.62813,-2.15l-23.65,-46.62813l-16.52812,33.05625c-0.94063,2.01563 -3.35937,2.82187 -5.375,1.74687c-2.01563,-0.94062 -2.82188,-3.35937 -1.74688,-5.375l20.15625,-40.3125c0.67188,-1.34375 2.01563,-2.28437 3.62812,-2.28437v0c1.47812,0 2.95625,0.80625 3.62812,2.15l27.14375,53.75c0.94062,2.01563 0.26875,4.43438 -1.74688,5.375c-0.67187,0.5375 -1.34375,0.67188 -1.88125,0.67188z"></path></g></g></svg> EJuri</a></li>
                        </ul>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li class="uk-parent"><a href="logout.php" id="btnRed">oab <?=$_SESSION['nome']?> - Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <h1>Processo <?=base64_decode($_GET['id'])?></h1>
            <?php
                $r = $db->prepare("SELECT * FROM processo WHERE id=?");
                $r->execute(array(base64_decode($_GET['id'])));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {
                    echo "
                        <p class='uk-text-large'>Assunto</p>
                        <p>".$l['assunto']."</p>
                        <p class='uk-text-large'>Descrição</p>
                        <p>".$l['descricao']."</p>
                        <p class='uk-text-large'>Ação</p>
                        <p>".$l['tipoAcao']."</p>
                        <p class='uk-text-large'>Emissão</p>
                        <p>".$l['dataInicio']."</p>
                        <p class='uk-text-large'>Cliente</p>
                    ";
                    $r2 = $db->prepare("SELECT nome FROM cliente WHERE cpf=?");
                    $r2->execute(array($l['cpfCliente']));
                    $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas2 as $l2) {$nome = $l2['nome'];}
                    echo "
                        <p>".$l['cpfCliente']." ".$nome."</p>
                        <p class='uk-text-large'>Advogado</p>
                    ";
                    $r3 = $db->prepare("SELECT nome FROM advogado WHERE oab=?");
                    $r3->execute(array($l['oabAdvogado']));
                    $linhas3 = $r3->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas3 as $l3) {$advogado = $l3['nome'];}
                    echo "
                        <p>".$l['oabAdvogado']." ".$advogado."</p>
                    ";
                }
            ?>
            <button class="uk-button uk-button-default" onclick="window.location.href='juIndex.php'" id="btnRed">Voltar</button>
            <button class="uk-button uk-button-default" onclick="window.print()">Imprimir</button>
            <button class="uk-button uk-button-danger uk-margin-small-right" type="button" uk-toggle="target: #modal-close-default1">Indeferir</button>
            <button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-close-default2">Deferir</button>
        </div>
    </div>


</body>
</html>


<div id="modal-close-default1" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Indeferir processo</h2>
        <form action="processoJuiz.php" method="post">
            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <textarea class="uk-textarea uk-form-width-large" rows="3" required name="justificativaInd" placeholder="Justificativa" style="text-transform: lowercase; resize: none;"></textarea>
                </div>
            </fieldset>
            <button class="uk-button uk-button-default uk-modal-close" type="button" id="btnRed">Voltar</button>
            <button class="uk-button uk-button-default" type="submit">Confirmar</button>
        </form>
    </div>
</div>

<div id="modal-close-default2" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Deferir processo</h2>
        <form action="processoJuiz.php" method="post">
            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <textarea class="uk-textarea uk-form-width-large" rows="3" required name="justificativaDef" placeholder="Justificativa" style="text-transform: lowercase; resize: none;"></textarea>
                </div>
            </fieldset>
            <button class="uk-button uk-button-default uk-modal-close" type="button" id="btnRed">Voltar</button>
            <button class="uk-button uk-button-default" type="submit">Confirmar</button>
        </form>
    </div>
</div>