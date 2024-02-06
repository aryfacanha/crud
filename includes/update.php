<?php

require 'connect.php';

require 'functions.php';

if (!empty($_GET['userId']) && dateFormat($_GET['birthDate'], 'Y-m-d', 'd/m/Y')) {

    try {

        $stmt = $db->prepare("UPDATE `users` SET `name` = :name, `birth_date` = :birth_date, `occupation` = :occupation WHERE `user_id` = :user_id");

        $stmt->bindValue('user_id', $_GET['userId']);

        $stmt->bindValue('name', $_GET['name']);

        $stmt->bindValue('birth_date', $_GET['birthDate']);

        $stmt->bindValue('occupation', $_GET['occupation']);

        $stmt->execute();
    
        $error = false;
    } catch (Exception $e) {
        $error = true;
    }
} else {
    $error = true;
}

if(!$error){
    alert('Sucesso ao atualizar!');

} else {
    alert('Erro ao atualizar!');
}


?>
