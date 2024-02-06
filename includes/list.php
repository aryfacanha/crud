<?php

require 'connect.php';

require 'functions.php';

try {

    $error = false;

    if (!empty($_GET['filter'])) {

        $filter = '%'.$_GET['filter'].'%';
    } else {
        $filter = '%%';
    }


        $stmt = $db->prepare("SELECT * FROM `users` WHERE `name` LIKE :name LIMIT 100");


        $stmt->bindParam(':name', $filter);
    

    $stmt->execute();

    if($stmt->rowCount()){

   

    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr id="reg<?=$user['user_id']?>">
            <td><?php echo $user['user_id']?></td>
            <td><?php echo $user['name']?></td>
            <td><?php echo $user['occupation']?></td>
            <td><?php echo calculateAge($user['birth_date'])?></td>
            <td class="text-center">
            <button type="button" class="btn btn-outline-secondary btn-edit"  data-id="<?php echo $user['user_id']?>"><i class="fa fa-pen-to-square fa-sm"></i></button>   
            <button type="button" class="btn btn-outline-secondary btn-delete" data-id="<?php echo $user['user_id']?>"><i class="fa-solid fa-xmark fa-sm"></i></button>  
            </td>  
        </tr>

<?php
    }       
} else {
?>

<tr>
    <td colspan="5" class="text-center"><strong>Nenhum registro encontrado.</strong></td>
</tr>

<?php
}
} catch (Exception $e) {
    $error = true;
}

if($error){
    alert('Erro ao listar!');
}

