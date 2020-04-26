<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/64/000000/courthouse.png"/>
    <title>EJuri</title>
</head>
<body>


    <div class="uk-child-width-expand@s" uk-grid>

        <div>
            Menu Superior
        </div>

        <div>
            <h1>Advogados</h1>
            listaAdvogados(order by ativos=1)
        </div>

        <div>
            <h1>Juízes</h1>
            listaJuizes(order by ativos=1)
        </div>

    </div>


</body>
</html>