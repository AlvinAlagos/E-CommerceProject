<?php

class loginModel
{

    public function __construct()
    {
        $this->db = new Model;
    }

    // User
    public function getUser($username)
    {
        $this->db->query("SELECT * FROM users WHERE Username = :username");
        $this->db->bind(':username', $username);
        return $this->db->getSingle();
    }

    public function createUser($data)
    {
        $this->db->query("INSERT INTO users (username, password_hash, firstName, lastName, email) values(:username, :password_hash, :firstName, :lastName, :email)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password_hash', $data['password_hash']);
        $this->db->bind(':firstName', $data['firstname']);
        $this->db->bind(':lastName', $data['lastname']);
        $this->db->bind(':email', $data['email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editUser($data, $username){
        $this->db->query("UPDATE users SET username=:username, firstName=:firstName, lastName=:lastName, email=:email, img=:img WHERE username=:username");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':img', $data['img']);
        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    //Seller
    public function getSeller($userId)
    {
        $this->db->query("SELECT * FROM sellers WHERE userId = :userId");
        $this->db->bind(':userId', $userId);
        return $this->db->getSingle();
    }


    public function createSeller($user_id)
    {
        $this->db->query("INSERT INTO sellers (isBanned, userId) values(:isBanned,:userId)");
        $this->db->bind(':isBanned', 0);
        $this->db->bind(':userId', $user_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function deleteSeller($userId)
    {
        $this->db->query("DELETE FROM sellers WHERE userId =:userId");    
        $this->db->bind(':userId', $userId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //Items
    // public function createItem($data){
    //     $this->db->query("INSERT INTO inventory(itemName,price, description, size, quantity, img, sellerId) 
    //     values(:itemName,:price, :description, :size, :quantity, :img, :sellerId)");
    //     $this->db->bind(':itemName', $data['itemName']);
    //     $this->db->bind(':price', $data['price']);
    //     $this->db->bind(':description', $data['description']);
    //     $this->db->bind(':quantity', $data['quantity']);
    //     $this->db->bind(':size', $data['size']);
    //     $this->db->bind(':img', $data['img']);
    //     $this->db->bind(':sellerId', $data['sellerId']);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function updateItem($data, $itemId){
    //     $this->db->query("UPDATE inventory SET itemName=:itemName,price=:price, description=:description, size=:size,quantity=:quantity, img=:img, sellerId=:sellerId WHERE itemId=:itemId");
    //     $this->db->bind(':itemName', $data['itemName']);
    //     $this->db->bind(':price', $data['price']);
    //     $this->db->bind(':description', $data['description']);
    //     $this->db->bind(':quantity', $data['quantity']);
    //     $this->db->bind(':size', $data['size']);
    //     $this->db->bind(':img', $data['img']);
    //     $this->db->bind(':sellerId', $data['sellerId']);
    //     $this->db->bind(':itemId', $itemId);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function deleteItem($itemId){
    //     $this->db->query("DELETE FROM inventory WHERE itemId=:itemId");
    //     $this->db->bind(":itemId", $itemId);
        
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function getAllItems(){
    //     $this->db->query("SELECT * FROM inventory");
    //     return $this->db->getResultSet();
    // }
    
    // public function getItems($sellerId){
    //     $this->db->query("SELECT * FROM inventory WHERE sellerId =:sellerId");
    //     $this->db->bind(':sellerId', $sellerId);
    //     return $this->db->getResultSet();
    // }
    

    // public function getItem($itemId){
    //     $this->db->query("SELECT * FROM inventory WHERE itemId =:itemId");
    //     $this->db->bind(':itemId', $itemId);
    //     return $this->db->getSingle();
    // }


}

?>