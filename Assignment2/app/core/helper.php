<?php
    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['author_id'])){
            return true;
        } else {
            return false;
        }
    }

    //checks if user logged in currently has a profile
    function hasProfile(){
        if(isset($_SESSION['profile_id'])){
            return true;
        } else {
            return false;
        }
    }

    //checks if user is logged in, and if they have a profile
    function accountCreationRedirect() {
        if (!isLoggedIn()) {
            header('Location: /Assignment2/Login/');
        }
        elseif (!hasProfile()) {
            header('Location: /Assignment2/Profile/create');
        }
    }
?>