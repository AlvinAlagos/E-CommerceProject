<?php require APPROOT . '/views/includes/header.php';?>

    <div class="container">
        <h1 class="display-1">Welcome to our blog</h1>
        <p>you will find all publications here</p>

        <?php


            foreach($data["publications"] as $publication){
                echo "<h2>";
                echo "<a href='/Assignment2/Publication/getPublication/$publication->publication_id'>$publication->publication_title</a>";
                echo "</h2>";

                echo "<p>";

                echo "Written by $publication->last_name, $publication->first_name $publication->middle_name on $publication->timestamp";

                echo "</p>";
                echo "</div>";
            }
        ?>

    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>