<?php
namespace Admin\Controllers;

class ExhibitionsController extends AdminController {

    public function __construct() {
        parent::__construct( get_class(), 'artist', '/views/admin/artists/' );

    }
}