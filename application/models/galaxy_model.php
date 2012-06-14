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
        //To make iterative if the execution pile don't support it
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
        protected function explore_node($node) {
                //TODO : get author, public, non existing
                $node->children = $this->db->select('*')
                                            ->from('node')
                                            ->where(array('id_parent' => $node->id))
                                            ->get()->result();
                foreach($node->children as $child)
                    $child = $this->explore_node($child);
                return $node;
        }
}