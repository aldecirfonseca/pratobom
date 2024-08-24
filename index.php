<?php

require_once "lib/Database.php";

$db = new Database();

$categoria = $db->dbSelect("SELECT * FROM produtocategoria");

print_r($categoria);