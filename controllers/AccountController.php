<?php

class AccountController extends BaseController {

    private $db;

    public function onInit() {
        $this->$db = new AccountModel();
    }

    public function register() {
        if ($this->isPost) {
            $username = $_POST['username'];
            if ($username == null || strlen($username) < 3) {
                $this->addErrorMessage('Невалидно потребителско име');
            }
            $password = $_POST['password'];
            $isRegistered = $this->db->register($username, $password);
            if ($isRegistered) {
                $this->redirect("home");
            }
            else {
                $this->addErrorMessage("Неуспешна регистрация");
            }
        }
        $this->renderView("home");
    }

    public function login() {

    }

}