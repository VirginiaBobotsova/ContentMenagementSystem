<?php

class ExhibitionsController extends BaseController {
    private $exhibitionsModel;

protected function onInit() {
$this->title = 'Exhibitions';
$this->exhibitionsModel = new ExhibitionsModel();
}

public function index() {
$this->exhibitions = $this->exhibitionsModel->getAll();
}

public function create() {
if ($this->isPost()) {
$name = $_POST['name'];
if ($this->exhibitionsModel->create($name)) {
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
if ($this->exhibitionsModel->edit($id, $name)) {
$this->addInfoMessage("Exhibition edited.");
$this->redirect("exhibitions");
} else {
$this->addErrorMessage("Cannot edit exhibition.");
}
}

// Display edit author form
$this->exhibitions = $this->exhibitionsModel->find($id);
if (!$this->exhibition) {
$this->addErrorMessage("Invalid exhibition.");
$this->redirect("exhibitions");
}
}

public function delete($id) {
if ($this->exhibitionsModel->delete($id)) {
$this->addInfoMessage("Exhibition deleted.");
} else {
$this->addErrorMessage("Cannot delete exhibition #" . htmlspecialchars($id) . '.');
$this->addErrorMessage("Maybe it is in use.");
}
$this->redirect("exhibitions");
}
}
