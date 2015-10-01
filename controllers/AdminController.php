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
            $this->isPost = true;
        }
        if (isset($_SESSION['username'])) {
            $this->isLoggedIn = true;
        }
        if (isset($_SESSION['isAdmin'])) {
            $this->isAdmin = true;
        }

    }

    public function index() {
        $this->redirect("admin", "adminLogin");
    }
    public function adminLogin() {
        if ($this->isPost()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isAdmin = $this->db->admin($username, $password);
            if ($isAdmin) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Успешен вход");
                return $this->redirect("admin", "controlPanel");
            }
            else {
                $this->addErrorMessage("Неуспешен вход");
                return $this->renderViewAdmin("adminLogin", false);
            }
        }
        $this->renderViewAdmin("adminLogin", false);
    }

    public function logout() {
        unset($_SESSION['username']);
        $this->addInfoMessage("Изход");
        $this->redirect("admin", "adminLogin");
    }

    public function controlPanel() {
        $this->renderViewAdmin(__FUNCTION__);
    }

    public function createExhibition() {
        $this->db = new ExhibitionsModel();
        if ($this->isPost()) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $gallery = $_POST['gallery'];
            $comment = $_POST['comment'];
            $text = $_POST['text'];
            $image = $_POST['image'];
            if ($this->db->create($name, $date, $gallery, $comment, $text, $image)) {
                $this->addInfoMessage("Exhibition created.");

            } else {
                $this->addErrorMessage("Cannot create exhibition.");
            }
        }
        $this->renderViewAdmin(__FUNCTION__);
    }

    public function createPainting() {
        $this->db = new PaintingsModel();
        if ($this->isPost()) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $comment = $_POST['comment'];
            $exhibition = $_POST['exhibition'];
            if ($this->db->create($name, $image, $comment, $exhibition)) {
                $this->addInfoMessage("Painting created.");

            } else {
                $this->addErrorMessage("Cannot create painting.");
            }
        }
        $this->renderViewAdmin(__FUNCTION__);
    }

    public function createEvent() {
        $this->db = new EventsModel();
        if ($this->isPost()) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $comment = $_POST['comment'];
            $text = $_POST['text'];
            if ($this->db->create($name, $image, $comment, $text)) {
                $this->addInfoMessage("Event created.");

            } else {
                $this->addErrorMessage("Cannot create event.");
            }
        }
        $this->renderViewAdmin(__FUNCTION__);
    }

    public function editAllExhibitions() {
         $this->db = new ExhibitionsModel();
        $this->exhibitions = $this->db->getAll();
        $this->renderViewAdmin(__FUNCTION__);
    }

    public function editExhibition() {
        $this->db = new ExhibitionsModel();
        $id = $this->getFieldValue("id");
        $this->exhibitions = $this->db->find($id);
        $this->addFieldValue("name", $name);
        if (!$this->exhibitions) {
            $this->addErrorMessage("Invalid exhibition.");
        }
        if ($this->isPost()) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $gallery = $_POST['gallery'];
            $comment = $_POST['comment'];
            $image = $_POST['image'];
            $text = $_POST['text'];
            if ($this->db->edit($id, $name, $date, $gallery, $comment, $text, $image)) {
                $this->addInfoMessage("Exhibition edited.");
            } else {
                $this->addErrorMessage("Cannot edit exhibition.");
            }
        }

            $this->renderViewAdmin(__FUNCTION__);

    }


    public function editPainting($id) {
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

    public function editEvent($id) {
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

    public function findLastCreatedExhibition() {
        $this->db = new ExhibitionsModel();
        $this->exhibitions = $this->db->findLast();
        $this->renderView(__FUNCTION__, false);
    }

    public function findLastCreatedPainting() {
        $this->db = new ExhibitionsModel();
        $this->exhibitions = $this->db->findLast();
        $this->renderView(__FUNCTION__, false);
    }

    public function findLastCreatedEvent() {
        $this->db = new ExhibitionsModel();
        $this->exhibitions = $this->db->findLast();
        $this->renderView(__FUNCTION__, false);
    }
}