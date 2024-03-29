<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galaxy_model extends MY_Model
{
        public function create_node($id_parent, $id_user, $title, $text, $link) {
                $node = array('title' => $title, 'text' => $text, 'link' => $link, 'id_parent' => $id_parent, 'id_user' => $id_user);
                return (bool) $this->db->set($node)
                                        ->set(array('update' => 'CURRENT_TIMESTAMP'), null, false)
                                        ->insert('node');
        }

        public function get_node($id_node) {
                $node = $this->db->select('*')
                                    ->from('node')
                                    ->where(array('id'=>$id_node))
                                    ->limit(1)
                                    ->get()->result();
                if(empty($node))
                    return false;
                else
                    return $node[0];
        }
        
        //recursive exploration
        //To limit in depth
        public function explore($id_root){
                $root = $this->get_node($id_root);
                if($root === false) 
                    return false;
                else {
                    $root = $this->explore_node($root);
                }
                return $root;
        }
        protected function explore_node($node, $depth = 5, $orderby = 'weight', $orderby_mode = 'desc') {
                //TODO : get author, public, non existing ?
                       //parameter to set orderby? date/weight asc or desc, or random
                $children = $this->db->select('*')
                                            ->from('node')
                                            ->where(array('id_parent' => $node->id))
                                            ->order_by($orderby,$orderby_mode)
                                            ->get()->result();
                if ($depth <=0) {
                    $node->children = array();
                }
                else {
                    $node->children = $children;
                    foreach($node->children as $child)
                        $child = $this->explore_node($child, $depth-1);
                }
                return $node;
        }
        public function refresh_added($node_id){ //refresh the branch with $node_id id of node added
                $current_node = $this->get_node($node_id);
                $current_node->weight = 0;
                while ($current_node !== false) {
                    $success = (bool) $this->db->set(array('weight' => $current_node->weight +1))
                    				->set(array('update' => 'CURRENT_TIMESTAMP'), null,false)
                    				->where(array('id' => $current_node->id))
                    				->update('node');
                    $current_node = $this->get_node($current_node->id_parent);
                }
        }
}