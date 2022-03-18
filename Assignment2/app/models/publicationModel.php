<?php
    class publicationModel{
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getPublication($publicationId) {
            //inner join to get profile information with publication
            $this->db->query('SELECT publication_id, publication_title, publication_text, timestamp, publication_status, first_name, middle_name, last_name, author_id FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id WHERE :publicationid = publication_id');
            $this->db->bind(':publicationid', $publicationId);
            return $this->db->getSingle();
        }

        public function getPublicationsByAuthor($authorId) {
            //inner join to get profile information with publication
            $this->db->query('SELECT publication_id, publication_title, publication_text, timestamp, publication_status, first_name, middle_name, last_name, author_id FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id WHERE :authorid = author_id');
            $this->db->bind(':authorid', $authorId);
            return $this->db->getResultSet();
        }

        //getting publications sorted by timestamps
        public function getPublications() {
            $this->db->query('SELECT publication_id, publication_title, publication_text, timestamp, publication_status, first_name, middle_name, last_name, author_id FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id ORDER BY timestamp');
            return $this->db->getResultSet();
        }
 
        public function createPublication($data) {
            $this->db->query("INSERT INTO publication (publication_title, publication_text, publication_status, profile_id) values (:title, :text, :status, :profileid)");
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':text', $data['text']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':profileid', $data['profile_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        } 

        //you can try to use this method to make publication visible
        public function editPublication($publicationId) {

        }

        public function deletePublication($publicationId) {

        }

        //otherwise, use these methods to change visibility
        public function makePublicationPublic($publicationId) {

        }

        public function makePublicationPrivate($publicationId) {

        }
    }
?>