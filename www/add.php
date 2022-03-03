<?php
session_start();
?>

<h2>adicionar usuario</h2>
<br><br>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form action="add-action.php" method="POST">

<input type="text" placeholder="nome" name="nome">
<br><br>
<input type="date"  name="idade">
<br><br>

<button type="submit">adicionar</button>
<button><a href="index.php" style="text-decoration:none; color:black;">cancelar</a></button>

</form>