<?php
    class wishlistModel
    {
        public function __construct()
        {
            $this->db = new Model;
        }

        public function getWishlistItems($data) {
            $this->db->query("SELECT * FROM wishlist INNER JOIN inventory on wishlist.itemId = inventory.itemId INNER JOIN listing on listing.itemId = inventory.itemId WHERE userId = :userId ");
            $this->db->bind(':userId', $data['userId']);

            return $this->db->getResultSet();
        }

        public function getWishlistItem($data) {
            $this->db->query("SELECT * FROM wishlist WHERE wishlistId = :wishlistId");
            $this->db->bind(':wishlistId', $data['wishlistId']);

            return $this->db->getSingle();
        }

        public function getWishlistFromItem($data) {
            $this->db->query("SELECT * FROM wishlist WHERE itemId = :itemId");
            $this->db->bind(':itemId', $data['itemId']);

            return $this->db->getSingle();
        }

        public function addToWishlist($data) {
            $this->db->query("INSERT INTO wishlist (itemId, userId) values (:itemId, :userId)");
            $this->db->bind(':itemId', $data['itemId']);
            $this->db->bind(':userId', $data['userId']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteFromWishlist($data) {
            $this->db->query("DELETE FROM wishlist WHERE wishlistId=:wishlistId");
            $this->db->bind(':wishlistId', $data['wishlistId']);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteItemFromWishlist($itemId) {
            $this->db->query("DELETE FROM wishlist WHERE itemId=:itemId");
            $this->db->bind(':itemId', $itemId);

            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }

        public function moveToCart($data) {
            $this->cartModel = $this->model('cartModel');
            $this->itemModel = $this->model('itemModel');

            if ($this->deleteWishlist($data)) {
                return $this->cartModel->addToCart($data);
            }
            else {
                return false;
            }
        }
    }
?>