<?php


class AccountController extends BaseController {

    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {
        if ($this->isPost) {
            $username = $_POST['username'];
            if ($username == null || strlen($username) < 3) {
                $this->addErrorMessage('Невалидно потребителско име');
            }
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addErrorMessage('Невалиден email адрес');
            }
            $password = $_POST['password'];
            $isRegistered = $this->db->register($username, $password);
            if ($isRegistered) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Успешна регистрация");
                $this->redirect("home",  "index");
            }
            else {
                $this->addErrorMessage("Неуспешна регистрация");
            }
        }
        $this->renderView("register");
    }

    public function login() {
        if ($this->isPost()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);
            if ($isLoggedIn) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Успешен вход");
                return $this->redirect("events", "index");
            }
            else {
                $this->addErrorMessage("Неуспешен вход");
                return $this->renderView("login");
            }
        }
        $this->renderView("login");
    }
    public function logout() {
        unset($_SESSION['username']);
        $this->addInfoMessage("Izhod");
        $this->redirectToUrl("/");
    }

}