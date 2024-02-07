<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
<?php
/*
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
*/
include 'Pessoa.class.php';

$p = new Pessoa();

$p->id=22;
$p->nome="Paulo Bône";
$p->email="P@.com";

$p->cadastrar($p);

$listCadastrados=$p->listar();

foreach($listCadastrados as $p){
    echo $p->id ," - ";
    echo $p->nome."<br>";
    echo $p->email."<br>";
}
$id=12;
$listCadastrados=$p->excluir($id);

?>


</body>
</html>


