<?php

class purchaseModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    public function addPurchase($data)
    {

        $this->db->query("INSERT INTO purchaseHistory (itemId, userId, quantity, purchaseDate) values(:itemId, :userId,:quantity, :date)");
        $this->db->bind(':itemId', $data['itemId']);
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':date', $data['date']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPurchaseHistoryNItem()
    {
        $this->db->query("SELECT *, purchaseHistory.quantity AS purchase_quantity FROM purchaseHistory INNER JOIN inventory on purchaseHistory.itemId = inventory.itemId  WHERE userId = :userId");
        $this->db->bind(':userId', $_SESSION['user_id']);
        return $this->db->getResultSet();
    }

    
}
