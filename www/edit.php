<?php
session_start();
 include 'config.php';

 $info=[];
 $id=filter_input(INPUT_GET,'id');
 
 
 if($id){
     
    $sql= $pdo->prepare("SELECT * FROM tb_user WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();


    if($sql->rowCount() > 0){

        $info= $sql->fetch( PDO::FETCH_ASSOC);


    }else{
        header("location: index.php");
        exit;
        
    }
 }else{

header("location: index.php");
exit;

 }

 
 

?>

<h2>editar usuario</h2>

<form action="edit-action.php" method="POST">

<input type="hidden"  name="id" value="<?=$info['id'];?>">

<input type="text" placeholder="nome" name="nome" value="<?=$info['nome'];?>">
<br><br>

<input type="date"  name="idade" value="<?=$info['idade'];?>">
<br><br>

<button type="submit">salvar</button>
<button><a href="index.php" style="text-decoration:none; color:black;">cancelar</a></button>

</form>