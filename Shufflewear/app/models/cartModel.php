<?php
    class cartModel
    {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getCartItems($data) {
            //ambiguous quantity column from cart and inventory
            $this->db->query("SELECT *, cart.quantity AS cart_quantity FROM cart INNER JOIN inventory on cart.itemId = inventory.itemId INNER JOIN listing on listing.itemId = inventory.itemId WHERE userId = :userId");
            $this->db->bind(':userId', $data['userId']);

            return $this->db->getResultSet();
        }

        public function getCartItem($data) {
            $this->db->query("SELECT *, cart.quantity AS cart_quantity FROM cart INNER JOIN inventory on cart.itemId = inventory.itemId INNER JOIN listing on listing.itemId = inventory.itemId WHERE cartId = :cartId");
            $this->db->bind(':cartId', $data['cartId']);

            return $this->db->getSingle();
        }

        public function addToCart($data) {
            $this->db->query("INSERT INTO cart (itemId, userId, quantity, size) values (:itemId, :userId, :quantity, :size)");
            $this->db->bind(':itemId', $data['itemId']);
            $this->db->bind(':userId', $data['userId']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':size', $data['size']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteFromCart($data) {
            $this->db->query("DELETE FROM cart WHERE cartId=:cartId");
            $this->db->bind(':cartId', $data['cartId']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        
        public function clearUserCart($userId) {
            $this->db->query("DELETE FROM cart WHERE userId=:userId");
            $this->db->bind(':userId', $userId);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteItemFromCart($itemId) {
            $this->db->query("DELETE FROM cart WHERE itemId=:itemId");
            $this->db->bind(':itemId', $itemId);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function editCartItem($data) {
            $this->db->query("UPDATE cart SET quantity=:quantity, size=:size WHERE cartId=:cartId");
            $this->db->bind(':cartId', $data['cartId']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':size', $data['size']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }
    }

?>