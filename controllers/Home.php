<?php

	class Home extends Controller{
		public function index () {
			echo 'Home index';
		}
		public function username ($n) {
			$this->json(array('name' => $n));
		}
		public function profile() {
			$tmp = $this->model('tmp');
			$tmp->my();
			$name = $this->input_get('name');
			$this->view('profile', array('name'=>$name));
			#sd_redirect(sd_base_url('?route=home/username/khizer'));

		}
		public function basic() {
			require_auth();
			$this->json([
				'status' => true,
				'message' => "Authenticated"
			]);
		}
	}