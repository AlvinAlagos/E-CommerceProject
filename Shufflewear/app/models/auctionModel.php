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

        public function addToAuction($data) {
            $this->db->query("INSERT INTO auction (startingBid, currentBid, buyNowPrice, startDate, endDate, itemId) values (:startingBid, :currentBid, :buyNowPrice, :startDate, :endDate, :itemId)");
            $this->db->bind(':startingBid', $data['startingBid']);
            $this->db->bind(':currentBid', $data['currentBid']);
            $this->db->bind(':buyNowPrice', $data['buyNowPrice']);
            $this->db->bind(':startDate', $data['startDate']);
            $this->db->bind(':endDate', $data['endDate']);
            $this->db->bind(':itemId', $data['itemId']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }
    }
?>