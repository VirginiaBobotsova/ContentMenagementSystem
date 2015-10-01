<?php
class PaintingsController extends BaseController {

    private $db;

    protected function onInit() {
        $this->title = 'Paintings';
        $this->db = new PaintingsModel();
    }

    public function index() {

        $this->paintings = $this->db->getAll();
        $this->renderView();
    }


    public function showPainting($id) {
        $this->db = new PaintingsModel();
        $this->paintings = $this->db->find($id);
        $this->renderView(_Function_);
    }
}
