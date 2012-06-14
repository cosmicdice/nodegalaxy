<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galaxy extends Base_Controller {
	public function __construct() {
        parent::__construct();
            $this->load->model('galaxy_model');
        }
        
        public function index() {
                redirect('galaxy/node/1', 'refresh');
	}
        
        public function node($id_node) {
            $node = $this->galaxy_model->explore($id_node);
            $view_data = array('node'=>$node);
            
            $view = ($node === false) ? 'galaxy/node_not_found' : 'galaxy/node';
            
            $this->load->view('common/header');
            $this->load->view($view, $view_data);
            $this->load->view('common/footer');
        }
        public function create() {
            
        }
}