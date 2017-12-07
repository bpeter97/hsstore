<?php

/**
 * user_model class
 * 
 * @property $id                                The id of the user in the database.
 * @property $username                          The user's username/display name.
 * @property $password                          The user's password.
 * @property $first_name                        The user's first name.
 * @property $last_name                         The user's last name.
 * @property $email                             The user's email.
 *
 * -- Getters --
 * @method int getId()                          getter for $id property
 * @method string getUsername()                 getter for $username property
 * @method string getPassword()                 getter for $password property
 * @method string getFirdstName()               getter for $first_name property
 * @method string getLastName()                 getter for $last_name property
 * @method string getEmail()                    getter for $email property
 * 
 * -- Setters --
 * @method void setId($id)                      setter for $id property
 * @method void setUsername($name)              setter for $username property
 * @method void setPassword($name)              setter for $password property
 * @method void setFirdstName($name)            setter for $first_name property
 * @method void setLastName($name)              setter for $last_name property
 * @method void setEmail($name)                 setter for $email property
 * 
 * @method void fetch_user_data($id)            fetches user data from the database based on $id.
 * @method void set_user_data($user)            sets up the user object using setters and data from the db.
 * @method mixed login_user($username, $password) Checks to see if username and password match db, returns id or false.
 * @method void create_user_session()           Creates the user's session based on the properties of this model.
 * @method void destroy_user_session()          Destroys the user's session without destroying the entire session.
 * 
 */
class User_model extends CI_Model
{
    private $id,
            $username,
            $password,
            $first_name,
            $last_name,
            $email;

    // Getters
    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getFirstName() { return $this->first_name; }
    public function getLastName() { return $this->last_name; }
    public function getEmail() { return $this->email; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setUsername($name) { $this->username = $name; }
    public function setPassword($pass) { $this->password = $pass; }
    public function setFirstName($name) { $this->first_name = $name; }
    public function setLastName($name) { $this->last_name = $name; }
    public function setEmail($email) { $this->email = $email; }

    /**
     * fetch_user_data function
     * 
     * This function will fetch the user's data from the database
     * based on the id that is passed in as a parameter.
     * 
     * 
     * @param [int] $id
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
     * @param [Object] $user 
     * @return void
     */
    public function set_user_data($user)
    {
        $this->setId($user->id);
        $this->setUsername($user->username);
        $this->setPassword($user->password);
        $this->setFirstName($user->first_name);
        $this->setLastName($user->last_name);
        $this->setEmail($user->email);
    }

    /**
     * login_user function
     *
     * This function will check the username and password in the database to see if they match.
     * 
     * @param [string] $username
     * @param [string] $password
     * @return mixed
     */
    public function login_user($username, $password)
    {
        // Select the user based off of the username input.
        $result = $this->db->get_where('users', array('username' => $username));

        // If there was a result->
        if($result){
            // Check to see if user's password matches input password.
            if(password_verify($password, $result->row(2)->password))	{
                // Return user ID if it does.
                return $result->row(0)->id;
            } else {
                // Return false if it does not match!
                return false;
            }
        } else {
            // Return false if there was no result! (meaning username did not match!)
            return false;
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
        $this->setUsername($data['username']);
        $this->setPassword($encrypted_pass);
        $this->setFirstName($data['first_name']);
        $this->setLastName($data['last_name']);
        $this->setEmail($data['email']);

        // insert the object into the database
        if($this->db->insert('users', array(
                'username'  =>  $this->getUsername(),
                'password'  =>  $this->getPassword(),
                'first_name'=>  $this->getFirstName(),
                'last_name' =>  $this->getLastName(),
                'email'     =>  $this->getEmail()
                ))) {

            // Return the ID
            return $this->db->insert_id();

        } else {

            // log error
            db_elogger($this->db->error());   

            // return false
            return false;

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
            'username'      =>  $this->getUsername(),
            'first_name'    =>  $this->getFirstName(),
            'last_name'     =>  $this->getLastName(),
            'email'         =>  $this->getEmail(),
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
        unset($_SESSION['username']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['logged_in']);
    }

}

?>