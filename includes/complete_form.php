<?php

require 'connect.php';

require 'functions.php';
if (!empty($_GET['user_id'])) {

try {

    $error = false;

        $stmt = $db->prepare("SELECT * FROM `users` WHERE `user_id` LIKE :user_id LIMIT 100");


        $stmt->bindParam(':user_id', $_GET['user_id']);
    

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC) 
?>
        <script>
            $('#user-edit').val('<?php echo $user['name']?>');
            $('#occupation-edit').val('<?php echo $user['occupation']?>');
            $('#data-edit').val('<?php echo dateFormat($user['birth_date'], 'Y-m-d', 'Y-m-d')?>');
            $('#edit-form').attr('data-id', <?php echo $user['user_id']?>);

            var modalEdit = new bootstrap.Modal(document.getElementById('modalEdit'), {
        keyboard: false
        })
        modalEdit.show()
        </script>

<?php
    
} catch (Exception $e) {
    $error = true;
}   
}