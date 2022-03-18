<?php
    class profileModel{
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getProfile($profileId) {
            $this->db->query('SELECT * FROM profile WHERE profile_id = :profileid');
            $this->db->bind(':profileid', $profileId);
            return $this->db->getSingle();
        }

        public function getAuthorProfile($authorId) {
            $this->db->query('SELECT * FROM profile INNER JOIN author ON profile.author_id = author.author_id WHERE profile.author_id = :authorid');
            $this->db->bind(':authorid', $authorId);
            return $this->db->getSingle();
        }
    }
?>