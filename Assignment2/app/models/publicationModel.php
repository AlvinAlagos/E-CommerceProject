<?php
    class publicationModel{
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getPublication($publicationId) {
            //inner join to get profile information with publication
            $this->db->query('SELECT publication_id, publication_title, publication_text, timestamp, publication_status, first_name, middle_name, last_name FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id WHERE author_id = author_id');
            $this->db->bind(':publicationid', $publicationId);
            return $this->db->getSingle();
        }

        //getting publications sorted by timestamps
        public function getPublications() {
            $this->db->query('SELECT publication_id, publication_title, publication_text, timestamp, publication_status, first_name, middle_name, last_name FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id ORDER BY timestamp');
            return $this->db->getResultSet();
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