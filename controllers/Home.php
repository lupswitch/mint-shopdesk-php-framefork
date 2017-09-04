<?php

	class Home extends Controller{
		public function index () {
			echo 'Home index';
		}
		public function userName ($n) {
			$this->json(array('name' => $n));
		}
		public function profile() {
			$tmp = $this->model('tmp');
			$tmp->my();
			$name = $this->input_get('name');
			$this->view('profile', array('name'=>$name));
			sd_redirect(sd_base_url('home/username/khizer'));

		}
	}