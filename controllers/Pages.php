<?php

class Pages extends Controller{
    function __construct() {
        parent::__construct();
    }
    function index() {
        $this->view('main', [
            'title' => 'Home',
        ]);
    }
}