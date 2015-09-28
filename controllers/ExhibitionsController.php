<?php

class ExhibitionsController extends BaseController {
    private $db;

    protected function onInit() {
        $this->title = 'Exhibitions';
        $this->db = new ExhibitionsModel();
    }

    public function index() {

        $this->exhibitions = $this->db->getAll();
        $this->renderView();
    }


    public function showExhibitions() {
        $this->exhibitions = $this->db->getAll();
        $this->renderView(_Function_, false);
    }

public function create() {
if ($this->isPost()) {
$name = $_POST['name'];
if ($this->db->create($name)) {
$this->addInfoMessage("Exhibition created.");
$this->redirect("exhibitions");
} else {
$this->addErrorMessage("Cannot create exhibition.");
}
}
}

public function edit($id) {
if ($this->isPost()) {
// Edit the author in the database
$name = $_POST['name'];
if ($this->db->edit($id, $name)) {
$this->addInfoMessage("Exhibition edited.");
$this->redirect("exhibitions");
} else {
$this->addErrorMessage("Cannot edit exhibition.");
}
}

// Display edit author form
$this->exhibitions = $this->db->find($id);
if (!$this->exhibition) {
$this->addErrorMessage("Invalid exhibition.");
$this->redirect("exhibitions");
}
}

public function delete($id) {
if ($this->db->delete($id)) {
$this->addInfoMessage("Exhibition deleted.");
} else {
$this->addErrorMessage("Cannot delete exhibition #" . htmlspecialchars($id) . '.');
$this->addErrorMessage("Maybe it is in use.");
}
$this->redirect("exhibitions");
}


    public function getImage($id) {
        $this->exhibitions = $this->db->getAll();
        $image = mysql_query("SELECT image FROM exhibitions WHERE id = $id");
        $image = mysql_fetch_assoc($image);
        header("Content-type: image/jpeg");
    }
}
