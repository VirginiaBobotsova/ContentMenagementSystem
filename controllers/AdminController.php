<?php

class AdminController extends BaseController
{
    private $db;

    public function __construct( $controller = '\Controllers\AdminController', $action = '/views/admin/' ) {
        parent::__construct( $controller, $action );
        $this->controller = $controller;
        $this->action = $action;
        $this->onInit();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->$isPost = true;
        }
        if (isset($_SESSION['username'])) {
            $this->$isLoggedIn = true;
        }
        if (isset($_SESSION['isAdmin'])) {
            $this->$isAdmin = true;
        }

    }
    public function index() {

    }

    public function createExhibition() {
        $this->db = new ExhibitionsModel();
        if ($this->isPost()) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $gallery = $_POST['gallery'];
            $comment = $_POST['comment'];
            $image = $_POST['image'];
            if ($this->db->create($name, $date, $gallery, $comment, $image)) {
                $this->addInfoMessage("Exhibition created.");

            } else {
                $this->addErrorMessage("Cannot create exhibition.");
            }
        }
    }

    public function createPainting($name, $image) {
        $this->db = new PaintingsModel();
        if ($this->isPost()) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            if ($this->db->create($name, $image)) {
                $this->addInfoMessage("Painting created.");

            } else {
                $this->addErrorMessage("Cannot create painting.");
            }
        }
    }

    public function createEvent($name, $image, $comment) {
        $this->db = new EventsModel();
        if ($this->isPost()) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $comment = $_POST['comment'];

            if ($this->db->create($name, $image, $comment)) {
                $this->addInfoMessage("Event created.");

            } else {
                $this->addErrorMessage("Cannot create event.");
            }
        }
    }

    public function editExhibition($id, $name, $date, $gallery, $comment, $image) {
        $this->db = new ExhibitionsModel();

        if ($this->isPost()) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $gallery = $_POST['gallery'];
            $comment = $_POST['comment'];
            $image = $_POST['image'];
            if ($this->db->edit($id, $name, $date, $gallery, $comment, $image)) {
                $this->addInfoMessage("Exhibition edited.");
            } else {
                $this->addErrorMessage("Cannot edit exhibition.");
            }
        }
        $this->exhibitions = $this->db->find($id);
        if (!$this->exhibition) {
            $this->addErrorMessage("Invalid exhibition.");
        }
    }


    public function editPainting($id, $name, $image) {
        $this->db = new PaintingsModel();

        if ($this->isPost()) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            if ($this->db->edit($id, $name, $image)) {
                $this->addInfoMessage("Painting edited.");

            } else {
                $this->addErrorMessage("Cannot edit painting.");
            }
        }
        $this->exhibitions = $this->db->find($id);
        if (!$this->painting) {
            $this->addErrorMessage("Invalid painting.");
        }
    }

    public function editEvent($id, $name, $image, $comment) {
        $this->db = new EventsModel();

        if ($this->isPost()) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $comment = $_POST['comment'];
            if ($this->db->edit($id, $name, $image, $comment)) {
                $this->addInfoMessage("Event edited.");
            } else {
                $this->addErrorMessage("Cannot edit exhibition.");
            }
        }
        $this->events = $this->db->find($id);
        if (!$this->event) {
            $this->addErrorMessage("Invalid event.");
        }
    }
    public function deleteExhibition($id) {
        $this->db = new ExhibitionsModel();
        $this->exhibitions = $this->db->getAll();
        if ($this->db->delete($id)) {
            $this->addInfoMessage("Exhibition deleted.");
        } else {
            $this->addErrorMessage("Cannot delete exhibition #" . htmlspecialchars($id) . '.');
            $this->addErrorMessage("Maybe it is in use.");
        }

    }

    public function deletePainting($id) {
        $this->db = new PaintingsModel();
        $this->paintings = $this->db->getAll();
        if ($this->db->delete($id)) {
            $this->addInfoMessage("Painting deleted.");
        } else {
            $this->addErrorMessage("Cannot delete painting #" . htmlspecialchars($id) . '.');
            $this->addErrorMessage("Maybe it is in use.");
        }

    }

    public function deleteEvent($id) {
        $this->db = new EventsModel();
        $this->events = $this->db->getAll();
        if ($this->db->delete($id)) {
            $this->addInfoMessage("Event deleted.");
        } else {
            $this->addErrorMessage("Cannot delete event #" . htmlspecialchars($id) . '.');
            $this->addErrorMessage("Maybe it is in use.");
        }

    }

}