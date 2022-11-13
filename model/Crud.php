<?php

abstract class Crud extends PDO
{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=pdo; port=3306; charset=utf8', 'root', '');
    }

    public function select($champ = 'id', $order = 'ASC')
    {
        $sql = "SELECT * FROM $this->table ORDER BY $champ $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function selectId($value)
    {
        // var_dump($value);
        // die();
        $sql = "SELECT * FROM $this->table WHERE $this.primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location: ../../home/error");
        }
    }

    public function insert($data)
    {
        $nomChamp = implode(", ", array_keys($data));
        $valeurChamp = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            return $this->lastInsertId();
        }
    }

    public function update($table, $data, $champId = 'id')
    {
        $champRequete = null;
        foreach ($data as $key => $value) {
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $table SET $champRequete WHERE $champId = :$champId";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($table, $id, $champId = 'id', $url = 'client-index.php')
    {

        $sql = "DELETE FROM $table WHERE $champId = :$champId";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId", $id);
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } else {
            header('Location: ' . $url);
        }
    }
}
