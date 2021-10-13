<?php

namespace Controllers;

include_once 'app/models/NoteManagerment.php';
include_once 'app/models/NoteType.php';

use Models\NoteManagerment;
use Models\NoteType;


class HomeController
{
    public $url_controller = 'index.php?controller=Home';
    public function index()
    {
        $objNoteType = new NoteType();
        $objNote = new NoteManagerment();
        $limit = 5;
        $types = $objNoteType->getAll();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $notes = $objNote->getAll($start, $limit);
        $pages = $objNote->pagination($limit);
        $next = $page + 1;
        $pre = $page - 1;
        include 'app/view/pages/home.php';
    }
    public function sort()
    {
        $col_sort = $_GET['col_sort'];
        $sort_type = $_GET['sort_type'];
        $objNoteType = new NoteType();
        $objNote = new NoteManagerment();
        $limit = 5;
        $types = $objNoteType->getAll();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $notes = $objNote->getAllSort($start, $limit, $col_sort, $sort_type);
        $pages = $objNote->pagination($limit);
        $next = $page + 1;
        $pre = $page - 1;
        include 'app/view/pages/sort.php';
    }
    public function view()
    {
        $note_id = $_GET['note_id'];
        $objNote = new NoteManagerment();
        $note = $objNote->getOne($note_id);
        include 'app/view/pages/view.php';
    }
    public function create()
    {
        $objNoteType = new NoteType();
        $objNote = new NoteManagerment();
        $types = $objNoteType->getAll();
        include 'app/view/pages/create-note.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $type_id = $_POST["type_id"];
            $content = $_POST["content"];
            $objNote->store($title, $type_id, $content);
            $this->redirect($this->url_controller . '&action=index');
        }
    }
    public function edit()
    {
        $note_id = $_GET['note_id'];
        $objNoteType = new NoteType();
        $objNote = new NoteManagerment();
        $types = $objNoteType->getAll();
        $note = $objNote->getOne($note_id);
        include 'app/view/pages/edit.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $type_id = $_POST["type_id"];
            $content = $_POST["content"];
            $objNote->update($title, $type_id, $content, $note_id);
            $this->redirect($this->url_controller . '&action=index');
        }
    }
    public function delete()
    {
        $note_id = $_GET['note_id'];
        $objNote = new NoteManagerment();
        $objNote->delete($note_id);
        $this->redirect($this->url_controller . '&action=index');
    }
    public function seach()
    {
        $title = $_GET['title'];
        $objNoteType = new NoteType();
        $objNote = new NoteManagerment();
        $types = $objNoteType->getAll();
        if (isset($_GET['type_id'])) {
            $type_id = $_GET['type_id'];
            $result = $objNote->seach($title, $type_id);
        } else {
            $result = $objNote->seach($title);
        }
        include 'app/view/pages/seach.php';
    }
    public function redirect($url)
    {
        ob_start();
?>
        <script>
            window.location.href = '<?php echo $url; ?>';
        </script>
<?php
        echo ob_get_clean();
        die();
    }
}
