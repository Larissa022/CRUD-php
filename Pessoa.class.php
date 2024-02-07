<?php
class Pessoa{
    public $id;
    public $nome;
    public $email;

/*
    public function __construct($id, $nome, $email) {
        echo "construido";
      $this->id=$id;
      $this->nome=$nome;
      $this->email=$email;
      
    }
*/

private function abreConexao(){
    $servidor = "localhost";
    $DB = "mini_mundo";
    $nome = "root";
    $senha = "123456";

    $con = mysqli_connect($servidor,$nome,$senha,$DB);
    return $con;
}

private function fechaConexao($con){
    mysqli_close($con);
}

public function cadastrar($pessoa){
    $sql = "INSERT INTO Pessoa VALUES ('$this->id','$this->nome','$this->email')";
    $conn=$this->abreConexao();
    mysqli_query($conn,$sql) or die ("erro");
    $this->fechaConexao($conn);
}


public function listarum (int $id){

    $query = "SELECT * FROM Pessoa where id = $id";
    
    $conn=$this->abreConexao();
    
    $result=mysqli_query($conn,$query) or die ("erro");
    
    $pessoas = [];

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $p = new Pessoa;
            $p->id=$row['id'];
            $p->nome=$row['nome'];
            $p->email=$row['email'];
            
            $pessoas[] = $p;
        }
    }
    return $pessoas;
    $this->fechaConexao($conn);
}


public function listar(){
    
    $query = "SELECT * FROM Pessoa";
    
    $conn=$this->abreConexao();
    
    $result=mysqli_query($conn,$query) or die ("erro");
    
    $pessoas = [];

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $p = new Pessoa;
            $p->id=$row['id'];
            $p->nome=$row['nome'];
            $p->email=$row['email'];
            
            $pessoas[] = $p;
        }
    }
    return $pessoas;
    $this->fechaConexao($conn);
}

public function excluir($id){
    $query = "DELETE FROM Pessoa WHERE id=$id";
    
    $conn=$this->abreConexao();
    
    mysqli_query($conn,$query) or die ("erro");
    $this->fechaConexao($conn);    
}

public function editar($p,$id){
    $query = "UPDATE Pessoa SET nome=\"$p->nome\", email=\"$p->email\", id=$p->id WHERE id=$id";
    
    
    $conn=$this->abreConexao();
    
    mysqli_query($conn,$query) or die ("erro");
    $this->fechaConexao($conn);    
} 
}

?>