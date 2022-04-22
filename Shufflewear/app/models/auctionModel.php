<?php
    class auctionModel
    {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getAllAuctions() {
            $this->db->query("SELECT * FROM auction INNER JOIN inventory on auction.itemId = inventory.itemId");

            return $this->db->getResultSet();
        }
    }
?>