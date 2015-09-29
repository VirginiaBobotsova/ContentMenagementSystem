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

    public function getImage($id) {
        $this->exhibitions = $this->db->getAll();
        $image = mysql_query("SELECT image FROM exhibitions WHERE id = $id");
        $image = mysql_fetch_assoc($image);
        header("Content-type: image/jpeg");
    }
}
