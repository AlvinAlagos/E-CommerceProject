<?php
    class listingModel
    {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function addItem($data){
            $this->db->query("INSERT INTO listing(quantity, price, itemId)  VALUES(:quantity, :price, :itemId)");
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':itemId', $data['itemId']);
           

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getItemInfo($itemId){
            $this->db->query("SELECT * FROM inventory i, listing l WHERE l.itemId = :itemId AND i.itemId = :itemId AND l.itemId = i.itemId; ");
            return $this->db->getResultSet();
        }

        public function getAllItems(){
            $this->db->query("SELECT * FROM listing l , inventory i WHERE l.itemId = i.itemId; ");
            return $this->db->getResultSet();
        }

        public function getItem($itemId){
            $this->db->query("SELECT * FROM listing WHERE itemId =:itemId");
            $this->db->bind(':itemId', $itemId);
            return $this->db->getSingle();
        }

    }
