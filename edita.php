<?php
$servidor = "localhost";
$DB = "mini_mundo";
$nome = "root";
$senha = "123456";
$con = mysqli_connect($servidor,$nome,$senha,$DB);

    if(!$con) {
        die("MORREU". mysqli_connect_error());
        }
    echo "SUCESSO";



$id = $_POST['id'];
$query = "SELECT * FROM Pessoa where id=$id";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)
    echo "<form action=\"editaXiba.php\" method=\"post\">";

    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>  id velho:<input type='text' name=\"idOld\" value='" . $row['id'] . "'><br>";
            echo "<td>  id novo:<input type='text' name=\"idNew\" value='" . $row['id'] . "'><br>";
            echo "<td> nome:<input type='text' name=\"nome\" value='" . $row['nome'] . "'><br>";
            echo "<td> email<input type='text' name=\"email\" value='" . $row['email'] . "'><br>";
            echo "<input type=\"submit\">";
            echo "</tr>";
    }
    echo "</form>";

?>



