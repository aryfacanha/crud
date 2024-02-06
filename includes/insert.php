<?php

require 'connect.php';

require 'functions.php';

if(!empty($_GET['name']) && !empty($_GET['birthDate']) && !empty($_GET['occupation']) && dateFormat($_GET['birthDate'], 'Y-m-d', 'd/m/Y')){

try {

$stmt = $db->prepare("INSERT INTO `users` (`name`, `birth_date`, `occupation`) VALUES (:name, :birth_date, :occupation)");


$stmt->bindValue(':name', $_GET['name']);

$stmt->bindValue(':birth_date', $_GET['birthDate']); 

$stmt->bindValue(':occupation', $_GET['occupation']);

$stmt->execute();

    $msg = 'Usuário cadastrado com sucesso!';
    $error = false;

}
catch (Exception $e) {

    $error = true;
}

} else {

    $error = true;
}

if(!$error){
    alert('Sucesso ao cadastrar!');

} else {
    alert('Erro ao cadastrar!');
}





