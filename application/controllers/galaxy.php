<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galaxy extends Base_Controller {
	public function __construct() {
        parent::__construct();
            $this->load->model('galaxy_model');
        }
        
        public function index() {
                redirect('galaxy/explore/1', 'refresh');
	}
        public function node($id_node) {
            $node = $this->galaxy_model->get_node($id_node);
            $view_data = array('node'=>$node);
            
            $view = ($node === false) ? 'galaxy/node_not_found' : 'galaxy/single_node';
            
            $this->load->view('common/header');
            $this->load->view($view, $view_data);
            $this->load->view('common/footer');
        }
        
        
        //test
        public function explore($id_node) {
            $node = $this->galaxy_model->explore($id_node);
            $view_data = array('node'=>$node);
            
            $view = ($node === false) ? 'galaxy/node_not_found' : 'galaxy/explore_node';
            
            $this->load->view('common/header');
            $this->load->view($view, $view_data);
            $this->load->view('common/footer');
        }
}