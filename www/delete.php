<?php
session_start();
include 'config.php';
$id= filter_input(INPUT_GET, 'id');


    if($id){
    
        $sql= $pdo->prepare("DELETE FROM tb_user WHERE id= :id");
        $sql->bindValue(':id', $id );
        $sql->execute();
    
     header("location: index.php");
     $_SESSION['msg']='<p style="color: #32CD32;">usuário foi excluido com sucesso!</p>';
     exit;
    
    }else{
        header("location: index.php");
        $_SESSION['msg']='<p style="color: red;">usuário não foi excluido com sucesso!</p>';
        exit;
    }


?>