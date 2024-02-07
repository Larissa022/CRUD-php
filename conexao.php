<?php

$servidor = "localhost";
$DB = "mini_mundo";
$nome = "root";
$senha = "123456";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

include "exclui.php";

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
            echo "<th>excluir</th>";
        echo "</tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href='conexao.php?'id'<button type='button' value='$id'>X</button></a></td>";
            echo "</tr>";
    }
    echo "</table>";

?>

