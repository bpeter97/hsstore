<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Cart_model class
 * 
 * @property    array   $items
 * @property    float   $cost_before_tax
 * @property    float   $total_cost
 * @property    float   $total_tax
 * @property    int     $total_items
 * @property    float   $tax_rate
 *
 * -- Getters --
 * @method get_items()
 * @method get_cost_before_tax()
 * @method get_total_cost()
 * @method get_total_items()
 * @method get_tax_rate()
 * @method get_total_tax()
 * 
 * -- Setters --
 * @method set_items()
 * @method set_cost_before_tax()
 * @method set_total_cost()
 * @method set_total_items()
 * @method set_tax_rate()
 * @method set_total_tax()
 * 
 * @method add_item()
 * @method remove_item()
 * @method update_cart()
 * @method clear_cart()
 * @method calculate_total()
 * @method calculate_tax()
 * @method calculate_total_items()
 * 
 */
class Cart_model extends CI_Model
{

}