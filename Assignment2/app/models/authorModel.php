<?php
    class authorModel {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getAuthor($username){
            $this->db->query("SELECT * FROM author WHERE username = :username");
            $this->db->bind(':username', $username);
            return $this->db->getSingle();
        }

        //check if needed after separating profile and author
        // public function getAuthorId($username) {
        //     $this->db->query('SELECT author_id FROM author WHERE username = :username');
        //     $this->db->bind(':username', $username);
        //     return $this->db->getSingle();
        // }

        //check if needed after fix
        // public function bindId($authorId){
        //     $this->db->query('SELECT author_id FROM author WHERE author_id = :authorId');
        //     $this->db->bind(':authorId', $authorId);
        //     return $this->db->getSingle();
        // }

        public function createAuthor($data){
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
    }
?>