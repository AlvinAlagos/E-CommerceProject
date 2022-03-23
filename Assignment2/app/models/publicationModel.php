<?php
    class publicationModel{
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getPublication($publicationId) {
            //inner join to get profile and author information with publication
            $this->db->query('SELECT * FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id WHERE :publicationid = publication_id');
            $this->db->bind(':publicationid', $publicationId);
            return $this->db->getSingle();
        }

        public function getPublicationsByProfile($profileId) {
            $this->db->query('SELECT * FROM publication WHERE :profileid = profile_id ORDER BY timestamp DESC');
            $this->db->bind(':profileid', $profileId);
            return $this->db->getResultSet();
        }

        public function getPublications() {
            $this->db->query('SELECT * FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id ORDER BY timestamp DESC');
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

        public function editPublication($data) {
            $this->db->query("UPDATE publication SET publication_title=:title, publication_text=:text, timestamp=:timestamp, publication_status=:status, profile_id=:profileid WHERE publication_id=:publicationid");
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':text', $data['text']);
            $this->db->bind(':timestamp', $data['timestamp']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':profileid', $data['profile_id']);
            $this->db->bind(':publicationid', $data['publication_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletePublication($publicationId) {
            $this->db->query("DELETE FROM publication WHERE publication_id=:publicationid");
            $this->db->bind(':publicationid', $publicationId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function searchPublicationTitle($publicationTitle) {
            $this->db->query('SELECT * FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id WHERE publication_title LIKE :title  ORDER BY timestamp DESC');
            $this->db->bind(':title', "%$publicationTitle%"); //to account for letters before or after search sequence
            return $this->db->getResultSet();
        }

        public function searchPublicationContent($publicationContent) {
            $this->db->query('SELECT * FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id WHERE publication_text LIKE :publicationcontent ORDER BY timestamp DESC');
            $this->db->bind(':publicationcontent', "%$publicationContent%");
            return $this->db->getResultSet();
        }

        public function searchPublicationAuthor($author) {
            $this->db->query('SELECT * FROM publication INNER JOIN profile ON publication.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id 
                    WHERE username LIKE :author OR first_name LIKE :author OR middle_name LIKE :author OR last_name LIKE :author ORDER BY timestamp DESC');
            $this->db->bind(':author', "%$author%");
            return $this->db->getResultSet();
        }
    }
?>