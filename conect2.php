<?php
    $db = new PDO('mysql:host=localhost;dbname=ejuri;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
<title>AcompanhAí</title>
<link rel="stylesheet" href="estilo.css">
<link rel="shortcut icon" href="https://img.icons8.com/cotton/64/000000/courthouse.png"/>
<style>:root {--ion-safe-area-top: 20px;--ion-safe-area-bottom: 22px;}</style>