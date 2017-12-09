<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Categories_model class
 * 
 */
class Categories_model extends CI_Model
{
    private $id,
            $name,
            $parent_id;

    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function get_parent_id() { return $this->parent_id; }

    public function set_id($id) { $this->id = $id; }
    public function set_name($name) { $this->name = $name; }
    public function set_parent_id($parent_id) { $this->parent_id = $parent_id; }

    public function fetch_all_categories()
    {
        return $this->db->get('categories')->result_array();
    }

    public function create_relationship($product_id, $category_id) 
    {
        if($this->db->insert('categories_products', array(
                'categories_id'   =>  $category_id,
                'products_id'     =>  $product_id
                )))
        {
            // Return the ID
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }

        
    }
}