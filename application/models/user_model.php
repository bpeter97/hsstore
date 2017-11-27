<?php

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

    // Get the user's data from the database.
    public function fetch_user_data($id)
    {
        $this->set_user_data($this->db->get_where('users', ['id'=>$id])->row());
    }

    public function set_user_data($user)
    {
        $this->setId($user->id);
        $this->setUsername($user->username);
        $this->setPassword($user->password);
        $this->setFirstName($user->first_name);
        $this->setLastName($user->last_name);
        $this->setEmail($user->email);
    }

    public function login_user($username, $password)
    {
        $result = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		
		if($result)	{
			return $result->row(0)->id;
		} else {
			return false;
		}
    }

}

?>