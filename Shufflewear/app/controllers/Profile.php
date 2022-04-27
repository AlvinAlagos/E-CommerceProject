<?php

class Profile extends Controller
{

    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
        $this->itemModel = $this->model('itemModel');
        $this->listingModel = $this->model('listingModel');
        $this->auctionModel = $this->model('auctionModel');
    }

    public function index()
    {

        $data = [
            "user" => $this->loginModel->getUser($_SESSION['user_username']),
            "inventory" => $this->itemModel->getItems($_SESSION['seller_id'])
        ];

        $this->view('Profile/index', $data);
    }

    public function registerSeller()
    {

        if (!isset($_POST['seller'])) {
            $this->view('Profile/registerSeller');
        } else {
            if ($this->loginModel->createSeller($_SESSION['user_id'])) {
                $this->createSellerSession($this->loginModel->getSeller($_SESSION['user_id']));
                echo 'You have successfully joined Shufflewear as a seller!';
                echo 'Your id is ' . $_SESSION['seller_id'];
                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function editProfile()
    {
        $profile = $this->loginModel->getUser($_SESSION['user_username']);

        if (!isset($_POST['edit'])) {
            $this->view('Profile/editProfile',  $profile);
        } else {
            $filename = $this->imageUpload();

            $data = [
                'username' => trim($_POST['username']),
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'img' => ($filename) ? $filename : $profile->img
            ];

            if ($this->loginModel->editUser($data, $_SESSION['user_username'])) {
                echo 'Your profile information has been changed!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function addItem()
    {
        if (!isset($_POST['add'])) {
            $this->view('Profile/addItem');
        } else {
            $filename = $this->imageUpload();

            $data = [
                'itemName' => trim($_POST['itemName']),
                'description' => trim($_POST['description']),
                'color' => trim($_POST['color']),
                'img' => $filename,
                'sellerId' => $_SESSION['seller_id']
            ];
            // var_dump($data);
            if ($this->itemModel->createItem($data)) {
                echo 'Your item has been added successfully!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function updateItem($itemId)
    {
        $item = $this->itemModel->getItem($itemId);

        if (!isset($_POST['add'])) {
            $this->view('Profile/updateItem', $item);
        } else {
            $filename = $this->imageUpload();

            $data = [
                'itemName' => trim($_POST['itemName']),
                'description' => trim($_POST['description']),
                'color' => trim($_POST['color']),
                'img' => $filename,
                'sellerId' => $_SESSION['seller_id']
            ];
            // var_dump($data);
            if ($this->itemModel->updateItem($data, $itemId)) {
                echo 'Your item has been added successfully!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function deleteItem($itemId)
    {

        if ($this->itemModel->deleteItem($itemId)) {
            echo 'Your item has been deleted successfully!';

            echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
        }
    }


    public function getDetails($itemId)
    {

        $item = $this->itemModel->getItem($itemId);


        $this->view('Profile/itemDetails', $item);
    }

    public function addToListing($itemId){
        if (!isset($_POST['list'])) {
            $this->view('Profile/addToListing');
        }
        else {

            $data = [
                'quantity' => trim($_POST['quantity']),
                'price' => trim($_POST['price']),
                'itemId' => trim($itemId)
            ];

            // var_dump($data);
            if ($this->listingModel->addItem($data)) {
                echo 'Your item has been listed successfully!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }

    public function imageUpload()
    {
        //default value for the pictu   re
        $filename = false;

        //save the file that gets sent as a picture
        $file = $_FILES['img'];

        $acceptedTypes = [
            'image/jpeg' => 'jpg',
            'image/gif' => 'gif',
            'image/png' => 'png'
        ];
        //validate the file

        if (empty($file['tmp_name']))
            return false;

        $fileData = getimagesize($file['tmp_name']);

        if (
            $fileData != false &&
            in_array($fileData['mime'], array_keys($acceptedTypes))
        ) {

            //save the file to its permanent location

            $folder = dirname(APPROOT) . '/public/img';
            $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
            move_uploaded_file($file['tmp_name'], "$folder/$filename");
        }
        return $filename;
    }


    public function createSellerSession($seller)
    {
        $_SESSION['seller_id'] = $seller->sellerId;
    }

    public function addToAuction($itemId) {
        if (!isset($_POST['auction'])) {
            $this->view('Profile/addToAuction');
        }
        else {
            $data = [
                'startingBid' => trim($_POST['startingBid']),
                'currentBid' => 0, //no bids have been made
                'buyNowPrice' => trim($_POST['buyNowPrice']),
                'startDate' => trim($_POST['startDate']),
                'endDate' => trim($_POST['endDate']),
                'itemId' => trim($itemId)
            ];

            //var_dump($data);
            if ($this->auctionModel->addToAuction($data)) {
                echo 'Your item has been put on auction successfully!';

                echo '<meta http-equiv="Refresh" content="2; url=/Shufflewear/Profile/">';
            }
        }
    }
}
