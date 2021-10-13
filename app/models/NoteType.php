<?php

namespace Models;

include_once "env.php";

use Model\DatabaseConnect;
use PDO;

class NoteType extends DatabaseConnect
{
    public function getAll()
    {
        $sql = "SELECT * from note_type";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $notes = $stmt->fetchAll();
        return $notes;
    }
    public function getOne($name)
    {
        $sql = "SELECT * from note_type where title='$name'";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $note = $stmt->fetch();
        return $note;
    }
    public function store($name, $description)
    {
        $sql = "INSERT INTO note_type (name,description) VALUES ('$name','$description')";
        $this->_db->query($sql);
    }
    public function update($name, $description, $id)
    {
        $sql = "UPDATE note_type SET name = '$name', description = '$description' WHERE id = '$id'";
        $this->_db->query($sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM note_type WHERE id = '$id'";
        $this->_db->query($sql);
    }
}
