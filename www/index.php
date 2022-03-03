<?php
session_start();
include('config.php');



 $lista=[];

 $sql=$pdo->query('SELECT * FROM tb_user');

 if($sql->rowCount() > 0){

     $lista= $sql->fetchAll( PDO::FETCH_ASSOC);
     
 }



?>


<h1>crud com docker-phpmyadmin</h1>
<button><a href="add.php" style="text-decoration:none; color:black;">adicionar</a></button>
<br><br>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<table border="1" width= "100%" >

<thead>

<th>Nome</th>
<th>Idade</th>
<th>Acões</th>

</thead>

<tbody>
<?php foreach( $lista as $usuario): ?>

 
<tr>

        <td> <?=$usuario['nome']?></td>
        <td> <?=$usuario['idade']?></td>
       
        <td>
            <a href="edit.php?id=<?=$usuario['id'];?>"><button>editar</button></a>

            <a href="delete.php?id=<?=$usuario['id'];?>" onclick="return confirm('tem certeza de excluir esse usuario?')"><button>excluir</button></a>
        </td>
        
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

