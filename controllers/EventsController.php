<?php
class EventsController extends BaseController
{
    private $db;

    protected function onInit()
    {
        $this->title = 'Events';
        $this->db = new EventsModel();
    }

    public function index($page = 0, $pageSize = 3) {
        $from = $page * $pageSize;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->events = $this->db->getFilteredEvents($from, $pageSize);

        $this->renderView();
    }

    public function showEvent($id) {
        $this->db = new EventsModel();
        $this->events = $this->db->find($id);
        $this->renderView(_Function_);
    }
}