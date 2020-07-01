<?php

// Connexion à la BDD sur MAC
$pdo = new PDO('mysql:host=localhost;dbname=boutique','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Connexion à la BDD sur PC
// $pdo = new PDO('mysql:host=localhost;dbname=boutique','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// variable globale
$content = "";

// Ouverture d'une session
session_start();

//	d�finition de constante
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/iim/');
define("URL", "http://" . $_SERVER['HTTP_HOST'] . "/iim/");

require_once("fonction.php");
?>