<?php

class Pages extends Controller{
    function __construct() {
        parent::__construct();
    }
    function index() {
        sd_redirect(sd_base_url('pages/docs'));
    }
    function docs() {
        $this->view('docs', [
            'title' => 'Home',
        ]);
    }
}