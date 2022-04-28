<?php
    class purchaseHistory extends Controller{

        public function __construct()
        {
            $this->purchaseModel = $this->model('purchaseModel');
            $this->itemModel = $this->model('itemModel');
        }

        public function index()
        {
            $data = [
                'purchase' => $this->purchaseModel->getPurchaseHistoryNItem(),
            ];

            $this->view('PurchaseHistory/purchaseHistory', $data);
        }
    }
?> 