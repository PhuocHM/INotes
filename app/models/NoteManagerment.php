<?php

namespace Models;

include_once "env.php";

use Model\DatabaseConnect;
use PDO;

class NoteManagerment extends DatabaseConnect
{
    public function pagination($limit)
    {
        $sql = "SELECT count(id) as id FROM note";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $notes = $stmt->fetchAll();
        $total = $notes[0]['id'];
        $pages = ceil($total / $limit);
        return $pages;
    }
    public function getAll($start, $limit)
    {
        $sql = "SELECT note.id,note.title,note.content,note_type.name from note INNER JOIN note_type on note.type_id=note_type.id LIMIT $start,$limit";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $notes = $stmt->fetchAll();
        return $notes;
    }
    public function getAllSort($start, $limit, $col_sort, $sort_type)
    {
        $sql = "SELECT note.id,note.title,note.content,note_type.name from note INNER JOIN note_type on note.type_id=note_type.id  ORDER BY $col_sort $sort_type LIMIT $start,$limit";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $notes = $stmt->fetchAll();
        return $notes;
    }
    public function getOne($id)
    {
        $sql = "SELECT * from note where id='$id'";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $note = $stmt->fetch();
        return $note;
    }
    public function store($title, $note_type, $content)
    {
        $sql = "INSERT INTO note (title,type_id,content) VALUES ('$title','$note_type','$content')";
        $this->_db->query($sql);
    }
    public function update($title, $note_type, $content, $id)
    {
        $sql = "UPDATE note SET title = '$title', type_id = '$note_type', content ='$content' WHERE id = '$id'";
        $this->_db->query($sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM note WHERE id = '$id'";
        $this->_db->query($sql);
    }
    public function seach($title)
    {
        $sql = "SELECT note.id,note.title,note.content,note_type.name from note 
        INNER JOIN note_type on note.type_id=note_type.id where title LIKE '%$title%'";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $notes = $stmt->fetchAll();
        return $notes;
    }
    public function seachWithType($type, $title)
    {
        $sql = "SELECT note.id,note.title,note.content,note_type.name from note 
        INNER JOIN note_type on note.type_id=note_type.id where title LIKE '%$title%' AND type_id='$type'";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $notes = $stmt->fetchAll();
        return $notes;
    }
}
