<?php
$servidor = "localhost";
$DB = "mini_mundo";
$nome = "root";
$senha = "123456";
$con = mysqli_connect($servidor,$nome,$senha,$DB);
var_dump($_POST);
$idOld=$_POST['idOld'];
$idNew=$_POST['idNew'];
$nome=$_POST['nome'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $query = "UPDATE Pessoa SET nome=\"$nome\", email=\"$email\", id=$idNew WHERE id=$idOld";
    echo $query;

    $result = mysqli_query($con,$query);

    if (mysqli_query($con, $query)) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conn);
    }
    mysqli_close($con);



header("Location: formulario.php");
?>