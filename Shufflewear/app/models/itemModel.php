<?php
    class itemModel
    {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function createItem($data){
            $this->db->query("INSERT INTO inventory(itemName,price, description, size, quantity, img, sellerId) 
            values(:itemName,:price, :description, :size, :quantity, :img, :sellerId)");
            $this->db->bind(':itemName', $data['itemName']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':size', $data['size']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':sellerId', $data['sellerId']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateItem($data, $itemId){
            $this->db->query("UPDATE inventory SET itemName=:itemName,price=:price, description=:description, size=:size,quantity=:quantity, img=:img, sellerId=:sellerId WHERE itemId=:itemId");
            $this->db->bind(':itemName', $data['itemName']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':size', $data['size']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':sellerId', $data['sellerId']);
            $this->db->bind(':itemId', $itemId);

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