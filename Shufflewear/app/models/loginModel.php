<?php

class loginModel{

    public function __construct()
    {
        $this->db = new Model;
    }

    public function getUser($username){
        $this->db->query("SELECT * FROM users WHERE Username = :username");
        $this->db->bind(':username', $username);
        return $this->db->getSingle();
    }

    public function createUser($data){
        $this->db->query("INSERT INTO users (username, password_hash, firstName, lastName, email) values(:username, :password_hash, :firstName, :lastName, :email)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password_hash', $data['password_hash']);
        $this->db->bind(':firstName', $data['firstname']);
        $this->db->bind(':lastName', $data['lastname']);
        $this->db->bind(':email', $data['email']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}


?>