<?php
    session_start();
    require_once 'conect2.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<body>
<ion-app>
<ion-tabs>


        <ion-tab tab="music">
            <ion-header translucent>
                <ion-toolbar>
                    <ion-title size="large">Processos</ion-title>
                </ion-toolbar>
                <ion-button href="appLogout.php" color="danger" size="small"><ion-icon name="power"></ion-icon> Logout</ion-button>
            </ion-header>

            <ion-content fullscreen class="ion-padding">
                <ion-list>
                    <ion-list-header>Andamento</ion-list-header>
                    <?php
                        $r = $db->prepare("SELECT * FROM processo WHERE situacao='andamento' AND cpfCliente=? ORDER BY id");
                        $r->execute(array($_SESSION['nome']));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas as $l) {
                            $r2 = $db->prepare("SELECT comarca FROM juiz WHERE cod=?");
                            $r2->execute(array($l['codJuiz']));
                            $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
                            foreach($linhas2 as $l2) {$comarca = $l2['comarca'];}
                            echo "
                                <ion-item>
                                    <ion-label>
                                        <h2>".$l['id']."- ".$l['assunto']."</h2>
                                        <h3>".$l['dataInicio'].", Oab ".$l['oabAdvogado']."</h3>
                                        <h5>Ação: ".$l['tipoAcao'].", Valor hora R$ ".$l['valorHora']."</h5>
                                        <p>Juiz cod ".$l['codJuiz']."- Comarca: ".$comarca."</p>
                                        <p>".$l['descricao']."</p>
                                    </ion-label>
                                </ion-item>    
                            ";
                        }
                    ?>
                </ion-list>
                <ion-list>
                    <ion-list-header>Deferido</ion-list-header>
                    <?php
                    $r = $db->prepare("SELECT * FROM processo WHERE situacao='deferido' AND cpfCliente=? ORDER BY id");
                    $r->execute(array($_SESSION['nome']));
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $r2 = $db->prepare("SELECT comarca FROM juiz WHERE cod=?");
                        $r2->execute(array($l['codJuiz']));
                        $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas2 as $l2) {$comarca = $l2['comarca'];}
                        echo "
                                <ion-item>
                                    <ion-label>
                                        <h2>".$l['id']."- ".$l['assunto']."</h2>
                                        <h3>".$l['dataInicio'].", Oab ".$l['oabAdvogado']."</h3>
                                        <h5>Ação: ".$l['tipoAcao'].", Valor hora R$ ".$l['valorHora']."</h5>
                                        <p>Juiz cod ".$l['codJuiz']."- Comarca: ".$comarca."</p>
                                        <p>".$l['descricao']."</p>
                                    </ion-label>
                                </ion-item>    
                            ";
                    }
                    ?>
                </ion-list>
                <ion-list>
                    <ion-list-header>Indeferido</ion-list-header>
                    <?php
                    $r = $db->prepare("SELECT * FROM processo WHERE situacao='indeferido' AND cpfCliente=? ORDER BY id");
                    $r->execute(array($_SESSION['nome']));
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $r2 = $db->prepare("SELECT comarca FROM juiz WHERE cod=?");
                        $r2->execute(array($l['codJuiz']));
                        $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas2 as $l2) {$comarca = $l2['comarca'];}
                        echo "
                                <ion-item>
                                    <ion-label>
                                        <h2>".$l['id']."- ".$l['assunto']."</h2>
                                        <h3>".$l['dataInicio'].", Oab ".$l['oabAdvogado']."</h3>
                                        <h5>Ação: ".$l['tipoAcao'].", Valor hora R$ ".$l['valorHora']."</h5>
                                        <p>Juiz cod ".$l['codJuiz']."- Comarca: ".$comarca."</p>
                                        <p>".$l['descricao']."</p>
                                    </ion-label>
                                </ion-item>    
                            ";
                    }
                    ?>
                </ion-list>
                <ion-list>
                    <ion-list-header>Cancelado</ion-list-header>
                    <?php
                    $r = $db->prepare("SELECT * FROM processo WHERE situacao='cancelado' AND cpfCliente=? ORDER BY id");
                    $r->execute(array($_SESSION['nome']));
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $r2 = $db->prepare("SELECT comarca FROM juiz WHERE cod=?");
                        $r2->execute(array($l['codJuiz']));
                        $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas2 as $l2) {$comarca = $l2['comarca'];}
                        echo "
                                <ion-item>
                                    <ion-label>
                                        <h2>".$l['id']."- ".$l['assunto']."</h2>
                                        <h3>".$l['dataInicio'].", Oab ".$l['oabAdvogado']."</h3>
                                        <h5>Ação: ".$l['tipoAcao'].", Valor hora R$ ".$l['valorHora']."</h5>
                                        <p>Juiz cod ".$l['codJuiz']."- Comarca: ".$comarca."</p>
                                        <p>".$l['descricao']."</p>
                                    </ion-label>
                                </ion-item>    
                            ";
                    }
                    ?>
                </ion-list>
                <ion-button onclick="scrollToTop()" expand="block" fill="outline">Voltar ao topo</ion-button>
            </ion-content>
        </ion-tab>

        <ion-tab tab="movies">
            <ion-header translucent>
                <ion-toolbar>
                    <ion-title size="large">Contato</ion-title>
                </ion-toolbar>
            </ion-header>

            <ion-content fullscreen class="ion-padding">
                <h2>Sac e Ouvidoria</h2>
                <p><ion-icon name="logo-whatsapp"></ion-icon> (51)9 9666-2828</p>
                <h2>Região Metropolitana</h2>
                <p><ion-icon name="call"></ion-icon> 0800 734 9834</p>
                <h2>Demais Regiões</h2>
                <p><ion-icon name="call"></ion-icon> 0800 722 3030</p>
                <h3>Email</h3>
                <p><ion-icon name="mail"></ion-icon> contato@acompanhai.com</p>
            </ion-content>
        </ion-tab>

        <ion-tab tab="games">
            <ion-header translucent>
                <ion-toolbar>
                    <ion-title size="large">Perfil</ion-title>
                </ion-toolbar>
            </ion-header>

            <ion-content fullscreen class="ion-padding">
                <?php
                    $r = $db->prepare("SELECT nome,nascimento,sexo,estadoCivil,endereco FROM cliente WHERE cpf=?");
                    $r->execute(array($_SESSION['nome']));
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $nome = $l['nome'];
                        $nascimento = $l['nascimento'];
                        $sexo = $l['sexo'];
                        $estadoCivil = $l['estadoCivil'];
                        $endereco = $l['endereco'];
                    }
                ?>
                <h1 class="ion-text-center"><strong><?=$nome?></strong></h1>
                    <h5 class="ion-text-center"><?=$_SESSION['nome']?></h5>

                <h6><strong>Nascimento:</strong> <?=$nascimento?></h6>
                <h6><strong>Sexo:</strong> <?=$sexo?></h6>
                <h6><strong>Est. Civil:</strong> <?=$estadoCivil?></h6>
                <h6><strong>Endereço:</strong> <?=$endereco?></h6>
            </ion-content>
        </ion-tab>

        <ion-tab-bar slot="bottom">
            <ion-tab-button tab="movies">
                <ion-label>Contato</ion-label>
                <ion-icon name="call"></ion-icon>
            </ion-tab-button>
            <ion-tab-button tab="music">
                <ion-label>Home</ion-label>
                <ion-icon name="home"></ion-icon>
            </ion-tab-button>
            <ion-tab-button tab="games">
                <ion-label>Perfil</ion-label>
                <ion-icon name="person"></ion-icon>
            </ion-tab-button>
        </ion-tab-bar>


</ion-tabs>
</ion-app>
</body>
</html>


<script>
    function getContent() {return document.querySelector('ion-content');}
    function scrollToTop() {getContent().scrollToTop(500);}
</script>