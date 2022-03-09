<?php
    class loginModel{
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getAuthor($username){
            $this->db->query("SELECT * FROM author WHERE username = :username");
            $this->db->bind(':username', $username);
            return $this->db->getSingle();
        }

        public function getAuthorId($username){
            $this->db->query('SELECT author_id FROM author WHERE username = :username');
            $this->db->bind(':username', $username);
            return $this->db->getSingle();
        }

        public function bindId($authorId){
            $this->db->query('SELECT author_id FROM author WHERE author_id = :authorId');
            $this->db->bind(':authorId', $authorId);
            return $this->db->getSingle();
        }

        public function registerAuthor($data){
        $this->db->query("INSERT INTO author (username, password_hash) values (:username, :password_hash)");
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password_hash', $data['password_hash']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

    
        public function createProfile($info){
            $this->db->query("INSERT INTO profile (first_name, middle_name, last_name, author_id) values (:fname, :mname, :lname,:authorId)");
            $this->db->bind(':fname', $info['firstname']);
            $this->db->bind(':mname', $info['middlename']);
            $this->db->bind(':lname', $info['lastname']);
            $this->db->bind(':authorId',$info['authorId'] );

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
    }

?>