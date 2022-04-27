<?php
    class itemModel
    {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function createItem($data){
            $this->db->query("INSERT INTO inventory(itemName, description, color, img, sellerId) 
            values(:itemName, :description, :color, :img, :sellerId)");
            $this->db->bind(':itemName', $data['itemName']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':color', $data['color']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':sellerId', $data['sellerId']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateItem($data, $itemId){
            $this->db->query("UPDATE inventory SET itemName=:itemName,description=:description, color=:color,img=:img, sellerId=:sellerId WHERE itemId=:itemId");
            $this->db->bind(':itemName', $data['itemName']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':color', $data['color']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':sellerId', $data['sellerId']);
            $this->db->bind(':itemId', $itemId);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateIsListed($itemId){
            $this->db->query("UPDATE inventory SET isListed=:isListed WHERE itemId=:itemid");
            $this->db->bind(':isListed', 1);
            $this->db->bind(':itemid', $itemId);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function removeIsListed($itemId){
            $this->db->query("UPDATE inventory SET isListed=:isListed WHERE itemId=:itemid");
            $this->db->bind(':isListed', 0);
            $this->db->bind(':itemid', $itemId);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteItem($itemId){
            $this->db->query("DELETE FROM inventory WHERE itemId=:itemId");
            $this->db->bind(":itemId", $itemId);
            
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getAllItems(){
            $this->db->query("SELECT * FROM inventory");
            return $this->db->getResultSet();
        }
        
        public function getItems($sellerId){
            $this->db->query("SELECT * FROM inventory WHERE sellerId =:sellerId");
            $this->db->bind(':sellerId', $sellerId);
            return $this->db->getResultSet();
        }
        
        public function getItem($itemId){
            $this->db->query("SELECT * FROM inventory WHERE itemId =:itemId");
            $this->db->bind(':itemId', $itemId);
            return $this->db->getSingle();
        }
    }
?>