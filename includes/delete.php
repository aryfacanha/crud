<?php

require 'connect.php';

require 'functions.php';    

if (!empty($_GET['user_id'])) {

    try {

        $stmt = $db->prepare("DELETE FROM `users` WHERE `user_id` = :user_id");

        $stmt->bindParam('user_id', $_GET['user_id']);

        $stmt->execute();

        $error = false;
    } catch (Exception $e) {
        $error = true;
    }
} else {

    $error = true;
}

if(!$error){
    alert('Sucesso ao excluir!');

    echo("<script>remove('reg{$_GET['user_id']}')</script>");

} else {
    alert('Erro ao excluir!');
}

