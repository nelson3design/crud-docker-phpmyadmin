<?php
session_start();

include 'config.php';

$nome= filter_input(INPUT_POST, 'nome');
$idade= filter_input(INPUT_POST, 'idade');

$sql= $pdo->prepare("SELECT * FROM tb_user WHERE nome=:nome");
$sql->bindValue(':nome', $nome );
$sql->execute();
if($sql->rowCount() ===0){

    if($nome && $idade){
    
        $sql= $pdo->prepare("INSERT INTO tb_user (nome, idade) VALUES (:nome,:idade)");
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':idade', $idade );
        $sql->execute();
    
     header("location: index.php");
     $_SESSION['msg']='<p style="color: #32CD32;">usuário foi adicionado com sucesso!</p>';
     exit;
    
    }else{
        header("location: add.php");
        $_SESSION['msg']='<p style="color: red;">usuário não foi adicionado com sucesso!</p>';
        exit;
    }
}else{
    header("location: add.php");
    $_SESSION['msg']='<p style="color: red;">usuário ja existe!</p>';
    exit;
}


?>