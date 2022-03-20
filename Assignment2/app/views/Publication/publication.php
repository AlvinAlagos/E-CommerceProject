<?php require APPROOT . '/views/includes/header.php'; ?>
    <?php
        $publication = $data["publication"];

        echo "<div class='container'>";
        echo "<h1>$publication->publication_title</h1>";

        if (hasProfile() && $_SESSION['profile_id'] == $publication->profile_id) {
            echo "<div class='mb-1'>";
            echo "This post was made by you! :D<br>You can also edit your post from your ";
            echo "<a href='/Assignment2/Profile'>profile</a>";
            echo " page.";
            echo "</div>";

            echo "<div class='mb-3'>";
            echo "<a class='btn btn-primary mr-3' href='/Assignment2/Publication/editPublication/$publication->publication_id'>Edit</a>";
            echo "<a class='btn btn-danger mr-3' href='/Assignment2/Publication/deletePublication/$publication->publication_id'>Delete</a>";

            if ($publication->publication_status == 0) {
                echo "<a class='btn btn-secondary' href='/Assignment2/Publication/makePublicationPublic/$publication->publication_id'>Make Public</a>";
            }
            else {
                echo "<a class='btn btn-secondary' href='/Assignment2/Publication/makePublicationPrivate/$publication->publication_id'>Make Private</a>";
            }
            echo "</div>";
        }

        echo "<p>Written by $publication->last_name, $publication->first_name $publication->middle_name ($publication->username) on $publication->timestamp</p>";
        echo "</div>";

        echo "<div class='container mb-5'>";
        echo "$publication->publication_text";
        echo "</div>";

        $comments = $data["comments"];
        echo "<div class='container'>";
        echo "<h2>Comments</h2>";

        if (!($comments)) {
            echo "<div class='mb-1'>Be the first to make a comment!</div>";
            echo "<div class='mb-3'>";
            echo '<a class="btn btn-primary" href="/Assignment2/Comment/createComment/'.$publication->publication_id.'" role="button">Write a comment</a>';
            echo "</div>";
        }
        else {
            echo "<div class='mb-3'>";
            echo '<a class="btn btn-primary" href="/Assignment2/Comment/createComment/'.$publication->publication_id.'" role="button">Write a comment</a>';
            echo "</div>";

            foreach ($comments as $comment) {
                echo "<div class='container'>";
                echo "<h5>";
                echo "$comment->last_name, $comment->first_name $comment->middle_name ($comment->username) on $comment->timestamp";
                if (hasProfile() && $_SESSION['profile_id'] == $comment->profile_id) {
                    echo " <a href='/Assignment2/Comment/editComment/$comment->publication_comment_id' role='button'>Edit</a> ";
                    echo "<a href='/Assignment2/Comment/deleteComment/$comment->publication_comment_id' role='button'>Delete</a>";
                }
                
                echo "</h5>";
                echo "<p>";
                echo $comment->publication_comment_text;
                echo "</p>";
                echo "</div>";
            }
        }
        echo "</div>";

    ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>