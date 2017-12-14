<?php

/**
 * user_model class
 * @author Brian L. Peter Jr.
 * 
 * @property    int         $_id                 The id of the user in the database.
 * @property    string      $_username           The user's username/display  name.
 * @property    string      $_password           The user's password.
 * @property    string      $_first_name         The user's first name.
 * @property    string      $_last_name          The user's last name.
 * @property    string      $_email              The user's email.
 *
 * -- Getters --
 * @method int get_id()                          getter for $id property
 * @method string get_username()                 getter for $username property
 * @method string get_password()                 getter for $password property
 * @method string get_first_name()               getter for $first_name property
 * @method string get_last_name()                 getter for $last_name property
 * @method string get_email()                    getter for $email property
 * 
 * -- Setters --
 * @method void set_id($id)                      setter for $id property
 * @method void set_username($name)              setter for $username property
 * @method void set_password($name)              setter for $password property
 * @method void set_first_name($name)            setter for $first_name property
 * @method void set_last_name($name)              setter for $last_name property
 * @method void set_email($name)                 setter for $email property
 * 
 * @method void fetch_user_data($id)            fetches user data from the database based on $id.
 * @method void set_user_data($user)            sets up the user object using setters and data from the db.
 * @method mixed login_user($username, $password) Checks to see if username and password match db, returns id or FALSE.
 * @method void create_user_session()           Creates the user's session based on the properties of this model.
 * @method void destroy_user_session()          Destroys the user's session without destroying the entire session.
 * @method check_user_type()                    Checks to see if the user is of type $type, which is passed in as a parameter.
 * 
 */
class User_model extends CI_Model
{
    private $_id,
            $_username,
            $_password,
            $_first_name,
            $_last_name,
            $_user_type,
            $_email;

    // Getters
    public function get_id() { return $this->_id; }
    public function get_username() { return $this->_username; }
    public function get_password() { return $this->_password; }
    public function get_first_name() { return $this->_first_name; }
    public function get_last_name() { return $this->_last_name; }
    public function get_user_type() { return $this->_user_type; }
    public function get_email() { return $this->_email; }

    // Setters
    public function set_id($id) { $this->_id = $id; }
    public function set_username($name) { $this->_username = $name; }
    public function set_password($pass) { $this->_password = $pass; }
    public function set_first_name($name) { $this->_first_name = $name; }
    public function set_last_name($name) { $this->_last_name = $name; }
    public function set_user_type($type) { $this->_user_type = $type; }
    public function set_email($email) { $this->_email = $email; }

    /**
     * fetch_user_data function
     * 
     * This function will fetch the user's data from the database
     * based on the id that is passed in as a parameter.
     * 
     * 
     * @param int $id
     * @uses set_user_data() to quickly set the user object.
     * @return void
     */
    public function fetch_user_data($id)
    {
        $this->set_user_data($this->db->get_where('users', ['id'=>$id])->row());
    }

    /**
     * set_user_data function
     * 
     * This function will be used to easily set the user object's attributes.
     *
     * @param Object $user 
     * @return void
     */
    public function set_user_data($user)
    {
        // Validation
        if(is_object($user))
        {
            $this->set_id($user->id);
            $this->set_username($user->username);
            $this->set_password($user->password);
            $this->set_first_name($user->first_name);
            $this->set_last_name($user->last_name);
            $this->set_user_type($user->user_type);
            $this->set_email($user->email);
        }
    }

    /**
     * login_user function
     *
     * This function will check the username and password in the database to see if they match.
     * 
     * @param string $username
     * @param string $password
     * @return mixed
     */
    public function login_user($username, $password)
    {
        // Select the user based off of the username input.
        $result = $this->db->get_where('users', array('username' => $username));

        // If there was a result->
        if($result)
        {
            // Check to see if user's password matches input password.
            if(password_verify($password, $result->row(2)->password))	{
                // Return user ID if it does.
                return $result->row(0)->id;
            } 
            else 
            {
                // Return FALSE if it does not match!
                return FALSE;
            }
        } 
        else 
        {
            // Return FALSE if there was no result! (meaning username did not match!)
            return FALSE;
        }
		
    }

    /**
     * register_user()
     *
     * This function will retrieve information from user input and insert it into the database.
     * 
     * @param array $data
     * @return void
     */
    public function register_user($data)
    {
        // Encrypt the user's password.
        $encrypted_pass = password_hash(
            $data['password'],
            PASSWORD_DEFAULT,
            [
                'cost' => 10,
            ]
        );

        // user setters to set the properties
        $this->set_username($data['username']);
        $this->set_password($encrypted_pass);
        $this->set_first_name($data['first_name']);
        $this->set_last_name($data['last_name']);
        $this->set_user_type('User');
        $this->set_email($data['email']);

        // insert the object into the database
        if($this->db->insert('users', array(
                'username'  =>  $this->get_username(),
                'password'  =>  $this->get_password(),
                'first_name'=>  $this->get_first_name(),
                'last_name' =>  $this->get_last_name(),
                'user_type' =>  $this->get_user_type(),
                'email'     =>  $this->get_email()
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
     * create_user_session function
     * 
     * This function will create a user session based off of this objects properties.
     *
     * @return void
     */
    public function create_user_session()
    {
        // create array to pass into session
        $data = array(
            'user_id'       =>  $this->get_id(),
            'username'      =>  $this->get_username(),
            'first_name'    =>  $this->get_first_name(),
            'last_name'     =>  $this->get_last_name(),
            'email'         =>  $this->get_email(),
            'logged_in'     =>  TRUE
        );

        // insert data into session.
        $this->session->set_userdata($data);
    }

    /**
     * destroy_user_session function
     * 
     * This function will destroy a user session without destroying the entire session.
     *
     * @return void
     */
    public function destroy_user_session()
    {
        // create array to pass into session
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['logged_in']);
    }

    /**
     * check_user_type
     * 
     * Returns true or false depending on parameters entered.
     *
     * @param int $id
     * @param string $type
     * @return bool
     */
    public function check_user_type($id, $type)
    {
        $this->fetch_user_data($id);
        if($this->get_user_type() == $type)
        {
            return TRUE;
        } 
        else
        {
            return FALSE;
        }
    }

}