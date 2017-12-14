<?php
/**
 * Product_model class
 * @author Brian L. Peter Jr.
 * 
 * @property    int        $_id            The identification number in the database for the product.
 * @property    string     $_name          The name of the product.
 * @property    float      $_price         The price the customer would pay.
 * @property    int        $_quantity      The number of items available.
 * @property    bool       $_featured      This tells us if the product is featured or not.
 * @property    string     $_image         This will be the name of the image file.
 * @property    string     $_description   This is the description of the product.
 * 
 * -- Getters --
 * @method get_id()                  Return product ID (based on database).
 * @method get_name()                Return product name.
 * @method get_price()               Return product price.
 * @method get_quantity()            Return product quantity.
 * @method get_featured()            Return whether product is featured or not.
 * @method get_image()               Returns the name of the image belonging to the product.
 * @method get_description()         Return product description.
 * 
 * -- Setters --
 * @method set_id($id)               Sets the ID for this product
 * @method set_name($name)           Sets the name of the product.
 * @method set_price($price)         Sets the price of the product.
 * @method set_quantity($qty)        Sets the quantity of the product.
 * @method set_featured($bool)       Sets whether or not the product is featured.
 * @method set_image($image)         Sets the name of the image belonging to the product.
 * @method set_description($desc)    Sets the products description.
 * 
 * @method fetch_all_products()     Gets a list of all of the products.
 * @method fetch_product()          Gets a the information for one product..
 * @method fetch_products_limited() Returns an array of products with the limits applied and possibly the category.
 * @method fetch_featured_products()Gets a list of the featured products.
 * @method count_products()         Returns a count of the number of products based on parameter.
 * @method set_product_data()       Quickly set's the object properties using setters.
 * @method delete_product($id)      Deletes a product using the provided ID or the objects ID.
 * @method create_product()         Creates a product in the database.
 * @method update_product($id)      Updates a product using the provided ID or the objects ID.
 * 
 */
class Product_model extends CI_Model
{
    // Properties
    private $_id,
            $_name,
            $_price,
            $_quantity,
            $_featured,
            $_image,
            $_description;

    // Getters
    public function get_id() { return $this->_id; }
    public function get_name() { return $this->_name; }
    public function get_price() { return $this->_price; }
    public function get_quantity() { return $this->_quantity; }
    public function get_featured() { return $this->_featured; }
    public function get_image() { return $this->_image; }
    public function get_description() { return $this->_description; }

    // Setters
    public function set_id($id) { $this->_id = $id; }
    public function set_name($name) { $this->_name = $name; }
    public function set_price($price) { $this->_price = $price; }
    public function set_quantity($qty) { $this->_quantity = $qty; }
    public function set_featured($bool) { $this->_featured = $bool; }
    public function set_image($image) { $this->_image = $image; }
    public function set_description($desc) { $this->_description = $desc; }

    /**
     * fetch_all_products function
     *
     * This function simply returns all products in the database.
     * MAX: 12 FEATURED PRODUCTS AT A TIME!
     * 
     * @return array $products
     */
    public function fetch_all_products()
    {
        // Return all of the products from the database.
        $products_array = $this->db->get('products')->result_array();

        // Empty array that will be returned at the end.
        $products = array();

        // Fill the array with products that were selected.
        foreach($products_array as $prod)
        {
            $product = new Product_model();
            $product->set_product_data($prod);
            array_push($products, $product);
        }

        // Return the array of product objects.
        return $products;
    }

    /**
     * fetch_products_limited
     *
     * @param int $start
     * @param int $limit
     * @param int $type
     * 
     * @return array $products
     */
    public function fetch_products_limited($start, $limit, $type = null)
    {
        // Check to see if $type is null.
        if($type === null)
        {
            // Select all products with the limit as there is no type selected.
            $products_array = $this->db->limit($start, $limit)->get("products")->result_array(); 
            
            // Empty array that will be returned at the end.
            $products = array();
            
            // Fill the array with products that were selected.
            foreach($products_array as $prod)
            {
                $product = new Product_model();
                $product->set_product_data($prod);
                array_push($products, $product);
            }
            
            // Return the array of product objects.
            return $products;
        }
        else
        {
            // Get the ID of the type passed in.
            $cat = $this->db->get_where('categories', ['id'=>$type])->result();

            // Select products where the category ID matches the products linked ID.
            $products_array = $this->db->select('*')->
                                from('products')->
                                join('categories_products', 'categories_products.products_id = products.id')->
                                where('categories_products.categories_id', $cat[0]->id)->
                                limit($start, $limit)->
                                get()->
                                result_array();
            
            // Empty array that will be returned at the end.
            $products = array();
            
            // Fill the array with products that were selected.
            foreach($products_array as $prod)
            {
                $product = new Product_model();
                $product->set_product_data($prod);
                array_push($products, $product);
            }
    
            // Return the array of product objects.
            return $products;
        }

        
    }

    /**
     * count_products
     *
     * This function counts the number of results and returns that number.
     * 
     * @param int $type
     * @return int
     */
    public function count_products($type = null)
    {
        // Check if type was passed in.
        if($type === null)
        {
            // If not, return the count of all products.
            return $this->db->get('products')->num_rows();
        }
        else
        {
            // Get the ID of the category
            $cat = $this->db->get_where('categories', ['id'=>$type])->result();

            // Return the number of products linked to that category
            return $this->db->select('*')->
                    from('products')->
                    join('categories_products', 'categories_products.products_id = products.id')->
                    where('categories_products.categories_id', $cat[0]->id)->
                    get()->
                    num_rows();
        }
    }

    /**
     * fetch_product function
     * 
     * This will return a specific record from the database and set the object properties 
     * based on either the id provided via the parameter or the objects id property.
     *
     * @param int $id
     * @return void
     */
    public function fetch_product($id = NULL)
    {
        // Return the product object.
        if($id === NULL)
        {
            // no id was passed in, so select the product based off of this object's id and set the object.
            $this->set_product_data($this->db->get_where('products', ['id' => $this->get_id()])->row());
        } 
        else
        {
            // id was passed in, so select product based off of passed in id and set the object.
            $this->set_product_data($this->db->get_where('products', ['id' => $id])->row());
        }
    }

    /**
     * fetch_featured_products function
     *
     * This function whill retrieve all of the featured products from the database.
     * 
     * @return array
     */
    public function fetch_featured_products()
    {
        // Returns all of the products that are featured.
        $products_array = $this->db->get_where('products', ['featured' => 'on'])->result_array();

        // Empty array that will be returned at the end.
        $products = array();
        
        // Fill the array with products that were selected.
        foreach($products_array as $prod)
        {
            $product = new Product_model();
            $product->set_product_data($prod);
            array_push($products, $product);
        }
        
        // Return the array of product objects.
        return $products;
    }

    /**
     * set_product_data function
     *
     * Utilize the setter functions to set the properties of the product object.
     * 
     * @param mixed $obj
     * @return void
     */
    public function set_product_data($obj)
    {
        // Use setters to setup this objects properties using the object passed in.
        if(is_array($obj))
        {
            // Use array parameters.
            $this->set_id($obj['id']);
            $this->set_name($obj['name']);
            $this->set_price($obj['price']);
            $this->set_quantity($obj['quantity']);
            $this->set_featured($obj['featured']);
            $this->set_image($obj['image']);
            $this->set_description($obj['description']);
        } 
        elseif(is_object($obj))
        {
            // Use object parameters.
            $this->set_id($obj->id);
            $this->set_name($obj->name);
            $this->set_price($obj->price);
            $this->set_quantity($obj->quantity);
            $this->set_featured($obj->featured);
            $this->set_image($obj->image);
            $this->set_description($obj->description);
        }
        else
        {
            // Throw an error
            throw new Exception('The variable passed in is not an object or an array.');
        }
    }

    /**
     * delete_product function
     * 
     * This will delete a product from the db based on the parameter ID or the object's
     * ID, dependent on whether a parameter was supplied.
     *
     * @param int $id
     * @return bool
     */
    public function delete_product($id = NULL)
    {
        // Delete the product by using an ID.
        if($id === NULL)
        {
            // Delete the product by using object's id property.
            return $this->db->delete('products', ['id'=>$this->get_id()]);
        } 
        else 
        {
            // Delete the product by using parameter id.
            return $this->db->delete('products', ['id'=>$id]);
        }
        
    }

    /**
     * create_product function
     * 
     * This function will insert a new product in the database. We do not use set_product_data
     * due to the fact that this object will not insert an id.
     *
     * @param array $data
     * @return mixed
     */
    public function create_product($data)
    {
        // set product properties
        $this->set_name($data['name']);
        $this->set_price($data['price']);
        $this->set_quantity($data['quantity']);
        $this->set_featured($data['featured']);
        $this->set_image($data['image']);
        $this->set_description($data['description']);

        // insert the object into the database
        if($this->db->insert('products', array(
                'name'          =>  $this->get_name(),
                'price'         =>  $this->get_price(),
                'quantity'      =>  $this->get_quantity(),
                'featured'      =>  $this->get_featured(),
                'image'         =>  $this->get_image(),
                'description'   =>  $this->get_description()
                ))) 
        {

            // Return the ID
            return $this->db->insert_id();

        } 
        else 
        {

            // log error
            db_elogger($this->db->error());   

            // return FALSE
            return FALSE;

        }
    }

    /**
     * update_product function
     * 
     * Updates the product in the database.
     * 
     * @return bool
     */
    public function update_product()
    {
        // Update the product based on this objects ID.
        return $this->db->update('products', $this, ['id' => $this->get_id()]);
    }

}