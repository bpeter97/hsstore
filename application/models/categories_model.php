<?php

if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

/**
 * Categories_model class
 * @author Brian L. Peter Jr.
 * 
 * @property    int        $_id            The identification number in the database for the category.
 * @property    string     $_name          The name of the category.
 * @property    int        $_parent_id     The id of the category that this category belongs to.
 * 
 * -- Getters --
 * @method get_id()                  Return category ID (based on database).
 * @method get_name()                Return category name.
 * @method get_parent_id()           Return category parent_id.
 * 
 * -- Setters --
 * @method set_id($id)               Sets the ID for this category
 * @method set_name($name)           Sets the name of the category.
 * @method set_parent_id($parent_id) Sets the parent_id of category.
 * 
 * @method fetch_all_categories()   Gets a list of all of the cateogries.
 * @method create_relationship()    Creates a link between products and categories.
 * 
 */
class Categories_model extends CI_Model
{
    // Properties
    private $_id,
            $_name,
            $_parent_id;

    // Getters
    public function get_id() { return $this->_id; }
    public function get_name() { return $this->_name; }
    public function get_parent_id() { return $this->_parent_id; }

    // Setters
    public function set_id($id) { $this->_id = $id; }
    public function set_name($name) { $this->_name = $name; }
    public function set_parent_id($parent_id) { $this->_parent_id = $parent_id; }

    /**
     * fetch_all_categories()
     *
     * This function simply returns all categories in an array.
     * 
     * @return array
     */
    public function fetch_all_categories()
    {
        return $this->db->get('categories')->result_array();
    }

    /**
     * create_relationship()
     *
     * This function creates a link between a product and a category based on params.
     * 
     * @param int $product_id
     * @param int $category_id
     * @return mixed
     */
    public function create_relationship($product_id, $category_id) 
    {
        // Insert info in database.
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
            // Return false as it did not work!
            return FALSE;
        }

        
    }
}