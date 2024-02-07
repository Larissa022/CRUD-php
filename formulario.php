<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    
    <title>Document</title>
</head>
<body>
    <center>
    <h1>Formulário de Cadastro</h1>
   <form action="formulario.php" method="POST">
      <input  type="text" name="nome" id="nome" placeholder="Nome: " required ><br><br>
      <input type="email" name="email" id="email" placeholder="E-mail: " required ><br><br>
      <input type="number" name="id" id="id" placeholder="id : " required ><br><br>
      <input type=submit  value="Enviar"><br><br>
      </form>
      

<?php

//include "exclui.php";
    
$servidor = "localhost";
$DB = "mini_mundo";
$nome = "root";
$senha = "123456";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

if(!$con) {
    die("MORREU". mysqli_connect_error());
}
echo "SUCESSO";

$query = "SELECT * FROM Pessoa";
$result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0)
    echo "<table border='1'>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>nome</th>";
            echo "<th>email</th>";
            echo "<th>deletar</th>";
            echo "<th>editar</th>";
        echo "</tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>
            <form action='confirma.php' method='post'>
                <center><button type='submit' name='id' value=".$row['id'].">X</button></center>
            </form>
            </td>";
            echo "<td>
            <form action='edita.php' method='post'>
                <center><button type='submit' name='id' value=".$row['id'].">?</button></center>
            </form>
            </td>";
            echo "</tr>";
    }
    echo "</table>";

$nome=$_POST["nome"];
$email=$_POST["email"];
$id=$_POST["id"];

$sql = "INSERT INTO Pessoa VALUES ('$id','$nome','$email')";
mysqli_query($con,$sql) or die ("erro");
mysqli_close($con);
echo "cliente cadastrado";

?>

</center>

</body>
</html>