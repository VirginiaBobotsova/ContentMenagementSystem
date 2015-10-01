<?php

class ExhibitionsController extends BaseController {
    private $db;


    protected function onInit() {
        $this->title = 'Exhibitions';
        $this->db = new ExhibitionsModel();
    }

    public function index($page = 0, $pageSize = 3) {
        $from = $page * $pageSize;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->exhibitions = $this->db->getFilteredExhibitions($from, $pageSize);

        $this->renderView(__FUNCTION__);
    }


    public function showExhibition($id) {
        $this->db = new ExhibitionsModel();
        $this->exhibitions = $this->db->find($id);
        $this->renderView();
    }

    public function getImage($id) {
        $this->exhibitions = $this->db->getAll();
        $image = mysql_query("SELECT image FROM exhibitions WHERE id = $id");
        $image = mysql_fetch_assoc($image);
        header("Content-type: image/jpeg");
    }
}
