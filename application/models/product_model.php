<?php
/**
 * Product_model class
 * 
 * @property $id                The identification number in the database for the product.
 * @property $name              The name of the product.
 * @property $price             The price the customer would pay.
 * @property $quantity          The number of items available.
 * @property $featured          This tells us if the product is featured or not.
 * @property $description       This is the description of the product.
 * 
 * -- Getters --
 * @method getId()                  Return product ID (based on database).
 * @method getName()                Return product name.
 * @method getPrice()               Return product price.
 * @method getQuantity()            Return product quantity.
 * @method getFeatured()            Return whether product is featured or not.
 * @method getDescription()         Return product description.
 * 
 * -- Setters --
 * @method setId($id)               Sets the ID for this product
 * @method setName($name)           Sets the name of the product.
 * @method setPrice($price)         Sets the price of the product.
 * @method setQuantity($qty)        Sets the quantity of the product.
 * @method setFeatured($bool)       Sets whether or not the product is featured.
 * @method setDescription($desc)    Sets the products description.
 * 
 * @method fetch_product($id)       Gets a list of all of the products.
 * @method fetch_featured_products()Gets a list of the featured products.
 * @method delete_product($id)      Deletes a product using the provided ID or the objects ID.
 * @method create_product()         Creates a product in the database.
 * @method update_product($id)      Updates a product using the provided ID or the objects ID.
 * 
 */
class Product_model extends CI_Model
{
    // Properties
    private $id,
            $name,
            $price,
            $quantity,
            $featured,
            $description;

    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getQuantity() { return $this->quantity; }
    public function getFeatured() { return $this->featured; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setPrice($price) { $this->price = $price; }
    public function setQuantity($qty) { $this->quantity = $qty; }
    public function setFeatured($bool) { $this->featured = $bool; }
    public function setDescription($desc) { $this->description = $desc; }

    public function fetch_product($id = null)
    {

    }

    public function fetch_featured_products()
    {

    }

    public function delete_product($id = null)
    {

    }

    public function create_product()
    {

    }

    public function update_product($id = null)
    {

    }

}