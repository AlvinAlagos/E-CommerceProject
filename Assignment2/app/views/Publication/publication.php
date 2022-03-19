<?php require APPROOT . '/views/includes/header.php'; ?>
    <?php
        $publication = $data["publication"];

        echo "<div class='container'>";
        echo "<h1>$publication->publication_title</h1>";

        if (isLoggedIn() && $_SESSION['author_id'] == $publication->author_id) {
            echo "This post was made by you! :D";
        }

        echo "<p>Written by $publication->last_name, $publication->first_name $publication->middle_name ($publication->username) on $publication->timestamp</p>";
        echo "</div>";

        echo "<div class='container'>";
        echo "$publication->publication_text";
        echo "</div>";
    ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>