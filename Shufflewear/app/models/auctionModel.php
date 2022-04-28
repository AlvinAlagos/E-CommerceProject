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

        public function getAuctions($sellerId) {
            $this->db->query("SELECT * FROM auction INNER JOIN inventory on auction.itemId = inventory.itemId WHERE sellerId=:sellerId");
            $this->db->bind(':sellerId', $sellerId);

            return $this->db->getResultSet();
        }

        public function getAuction($auctionId) {
            $this->db->query("SELECT * FROM auction INNER JOIN inventory on auction.itemId = inventory.itemId WHERE auctionId=:auctionId");
            $this->db->bind(':auctionId', $auctionId);

            return $this->db->getSingle();
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

        public function updateAuction($data) {
            $this->db->query("UPDATE auction SET startingBid=:startingBid, currentBid=:currentBid, buyNowPrice=:buyNowPrice, startDate=:startDate, endDate=:endDate, currentBidder=:currentBidder, itemId=:itemId WHERE auctionId=:auctionId");
            $this->db->bind(':auctionId', $data['auctionId']);
            $this->db->bind(':startingBid', $data['startingBid']);
            $this->db->bind(':currentBid', $data['currentBid']);
            $this->db->bind(':buyNowPrice', $data['buyNowPrice']);
            $this->db->bind(':startDate', $data['startDate']);
            $this->db->bind(':endDate', $data['endDate']);
            $this->db->bind(':currentBidder', $data['currentBidder']);
            $this->db->bind(':itemId', $data['itemId']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteAuction($auctionId) {
            $this->db->query("DELETE FROM auction WHERE auctionId=:auctionId");
            $this->db->bind(':auctionId', $auctionId);
            
            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }
    }
?>