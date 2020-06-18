<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$user = 'root';
$pass = 'azerty';
//
$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'"; //encodage utf-8
$connexion = new PDO('mysql:host=localhost;dbname=bd_messages', $user, $pass, $pdo_options);
//permet de récuperer les erreurs de la base
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
