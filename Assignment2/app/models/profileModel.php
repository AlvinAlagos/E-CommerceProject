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

        public function createProfile($data){
            $this->db->query("INSERT INTO profile (first_name, middle_name, last_name, author_id) values (:fname, :mname, :lname,:authorId)");
            $this->db->bind(':fname', $data['firstname']);
            $this->db->bind(':mname', $data['middlename']);
            $this->db->bind(':lname', $data['lastname']);
            $this->db->bind(':authorId',$data['authorId'] );

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function editProfile($data) {
            $this->db->query("UPDATE profile SET first_name=:fname, middle_name=:mname, last_name=:lname, author_id=:authorId WHERE profile_id=:profileId");
            $this->db->bind(':fname', $data['firstname']);
            $this->db->bind(':mname', $data['middlename']);
            $this->db->bind(':lname', $data['lastname']);
            $this->db->bind(':authorId',$data['authorId'] );
            $this->db->bind(':profileId',$data['profileId'] );
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>