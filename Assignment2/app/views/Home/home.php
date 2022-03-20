<?php require APPROOT . '/views/includes/header.php';?>

    <div class="container mb-4">
        <h1 class="display-1">Welcome to our blog</h1>
        <p>Read publications on our blog! All public publications are shown below, or search for one you know!</p>
        <a class="btn btn-primary" href="/Assignment2/Home/searchPublication" role="button">Search for a publication</a>
    </div>
    <div class="container">
        <?php
            foreach($data["publications"] as $publication){
                if ($publication->publication_status == 1) { //only shows if publication is visible
                    echo "<h2>";
                    echo "<a href='/Assignment2/Publication/getPublication/$publication->publication_id'>$publication->publication_title</a>";
                    echo "</h2>";
                    echo "<p>";
                    echo "Written by $publication->last_name, $publication->first_name $publication->middle_name ($publication->username) on $publication->timestamp";
                    echo "</p>";
                }
            }
        ?>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>