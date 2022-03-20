<?php
    class commentModel {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getComment($commentId) {
            $this->db->query('SELECT * FROM publication_comment INNER JOIN profile ON publication_comment.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id WHERE publication_comment_id=:commentid');
            $this->db->bind(':commentid', $commentId);
            return $this->db->getSingle();
        }

        public function getCommentsByPublication($publicationId) {
            $this->db->query('SELECT * FROM publication_comment INNER JOIN profile ON publication_comment.profile_id = profile.profile_id INNER JOIN author ON profile.author_id = author.author_id WHERE publication_id=:publicationid ORDER BY timestamp');
            $this->db->bind(':publicationid', $publicationId);
            return $this->db->getResultSet();
        }

        public function getCommentsByProfile($profileId) {
            $this->db->query('SELECT * FROM publication_comment INNER JOIN publication ON publication.publication_id = publication_comment.publication_id WHERE publication_comment.profile_id=:profileid ORDER BY publication_comment.timestamp');
            $this->db->bind(':profileid', $profileId);
            return $this->db->getResultSet();
        }

        public function createComment($data) {
            $this->db->query("INSERT INTO publication_comment (publication_comment_text, profile_id, publication_id) values (:text, :profileid, :publicationid)");
            $this->db->bind(':text', $data['text']);
            $this->db->bind(':profileid', $data['profile_id']);
            $this->db->bind(':publicationid', $data['publication_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function editComment($data) {
            $this->db->query("UPDATE publication_comment SET publication_comment_text=:text, timestamp=:timestamp, profile_id=:profileid, publication_id=:publicationid WHERE publication_comment_id=:commentid");
            $this->db->bind(':commentid', $data['comment_id']);
            $this->db->bind(':text', $data['text']);
            $this->db->bind(':timestamp', $data['timestamp']);
            $this->db->bind(':profileid', $data['profile_id']);
            $this->db->bind(':publicationid', $data['publication_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteComment($commentId) {
            $this->db->query("DELETE FROM publication_comment WHERE publication_comment_id=:commentid");
            $this->db->bind(':commentid', $commentId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>