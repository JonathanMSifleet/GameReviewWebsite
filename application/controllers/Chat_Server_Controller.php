<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Chat_Server_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');

		// when accessing the chat server,
		// if the user is not signed in redirect to sign in page
		if (!$this->session->has_userdata('loggedIn')) {
			redirect(base_url() . "SignIn");
		} else if ($this->session->has_userdata('loggedIn')) {
			if (!$this->session->loggedIn) {
				redirect(base_url() . "SignIn");
			}
		}
	}

	public function loadChatServerView() {
		// load chat server view:
		$data['page'] = "chat_server";
		$data['bodyContent'] = 'chat_server';
		$this->load->view('template', $data);
	}

}
