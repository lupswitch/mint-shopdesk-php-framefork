<?php

	class Home extends Controller{
		public function index_get () {
			echo 'Home index';
		}
		public function username ($n) {
			$this->json(array('name' => $n));
		}
		public function profile_get() {
			$tmp = $this->model('tmp');
			$tmp->my();
			$name = $this->input_get('name');
			$this->view('profile', array('name'=>$name));
			echo "<br>";
		}
		public function basic_get() {
			require_auth();
			$this->json([
				'status' => true,
				'message' => "Authenticated"
			]);
		}
		public function db_get() {
			echo $this->json($this->db_query('SELECT * FROM `users` WHERE 1'));
			// echo $this->json($this->db_query('INSERT INTO `categories`(`category_name`, `user_id`) VALUES ("hello", "10")'));
		}
		public function headers_get () {
			$this->json(sd_headers());
		}
	}