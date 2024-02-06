<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=simple_crud;charset=utf8', 'root', '');

} 
catch (Exception $e) {
    echo 'Erro ao conectar-se ao Banco de Dados.';
}

