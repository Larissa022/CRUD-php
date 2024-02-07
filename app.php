<?php

class app{

    private $servidor;
    private $nome;
    private $senha;
    private $DB;
    public $table;

    public function abreConexao($servidor,$nome,$senha,$DB){
        $this->servidor = $servidor;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->DB = $DB;
        $this->table = [];
    }

    public function listarPessoas() {
        $query = "SELECT * FROM Pessoas";
        $result = $this->conexao->query($query);
        $pessoas = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pessoas[] = $row;
            }
        }
        return $pessoas;
    }

    public function showData($table){
        foreach($table as $row){
            echo "<tr>";
            foreach($row as $i){
                echo "<td>".$i."</td>";
            }
            echo "<td><button class='del'>deletar</button><button class='edit'>editar</button>";
            echo "</tr>";
        }
    }

    public function connect(){
        try {
            $conn = new PDO("mysql:host=$this->servidor;dbname=$this->DB", $this->nome, $this->senha);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        return $conn;
    }

    public function insert($conn){
        $dataUser = [
            $_POST['id'],
            $_POST['nome'],
            $_POST['email']
        ];
        try {
            $query = "INSERT INTO Pessoa(id, nome, email) VALUES ('$dataUser[0]', '$dataUser[1]', '$dataUser[2]')";
            $conn->exec($query);
        } catch(PDOException $e){
            echo $query . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function select($conn){
        $data = $conn->query("SELECT * FROM `Pessoa`")->fetchAll();
        foreach($data as $row){
            $arr = [
                $row['id'],
                $row['nome'],
                $row['email'],
            ];
            array_push($this->table, $arr);
        }
        $conn = null;
        $this->showData($this->table);
    }

    public function delete($conn, $id){
        $conn->exec("DELETE FROM Pessoa WHERE id=$id");
        $conn = null;
    }

    public function update($conn, $query){
        $conn->exec("$query");
        $conn = null;
    }
}

?>