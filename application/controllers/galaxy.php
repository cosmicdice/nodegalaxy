<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galaxy extends Base_Controller {
	public function index() {
                redirect('galaxy/node/0', 'refresh');
	}
        public function node($id_node) {
                $user = $this->session->userdata['user'];
                
                $this->load->view('common/header');
		$this->load->view('common/footer');
        }
}