<?php
class EventsController extends BaseController
{
    private $db;

    protected function onInit()
    {
        $this->title = 'Events';
        $this->db = new EventsModel();
    }

    public function index()
    {
        $this->authorize();
        $this->events = $this->db->getAll();
        $this->renderView();
    }
}