<?php
namespace Admin\Controllers;
class Admin_Controller extends BaseController
{

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
}