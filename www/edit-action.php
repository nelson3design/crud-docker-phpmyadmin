<?php
session_start();
include 'config.php';
$id= filter_input(INPUT_POST, 'id');
$nome= filter_input(INPUT_POST, 'nome');
$idade= filter_input(INPUT_POST, 'idade');


    if($id && $nome && $idade){
    
        $sql= $pdo->prepare("UPDATE tb_user SET nome=:nome, idade=:idade WHERE id= :id");
        $sql->bindValue(':id', $id );
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':idade', $idade);
        $sql->execute();
    
     header("location: index.php");
     $_SESSION['msg']='<p style="color: #32CD32;">usuário foi editado com sucesso!</p>';
     exit;
    
    }else{
        header("location: edit.php");
        $_SESSION['msg']='<p style="color: red;">usuário não foi editado com sucesso!</p>';
        exit;
    }


?>