<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container mb-5"> 
        <h1>Profile Page</h1>
        <p>
            Welcome to your profile! You can find and update information about yourself, and find your own publications and comments.
        </p>
    </div>

    <div class="container mb-5">
        <h2>Information</h2>
        <div class='container'>
            <?php 
                $profile = $data['profile'];
                echo "<div>First Name:$profile->first_name</div>";
                echo "<div>Middle Name:$profile->first_name</div>";
                echo "<div>Last Name:$profile->first_name</div>";
            ?>
            <a href='/Assignment2/Profile/editProfile ?>' >Edit Profile</a>
        </div>
    </div>

    <div class="container mb-5"> 
        <h2>List of Publications</h2>
        <div class='container'>
            <?php
                if (!($data["publications"])) {
                    echo "No publications found...";
                }
                else {
                    echo 
                    '<table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td>Title</td>
                        <td>Timestamp</td>
                        <td>Status</td>
                        <td>Change Status</td>
                        <td colspan="2" class="text-center">Actions</td>
                    </tr>';

                    foreach($data["publications"] as $publication){
                        echo"<tr>";
    
                        echo"<td><a href='/Assignment2/Publication/getPublication/$publication->publication_id'>$publication->publication_title</td>";
                        echo"<td>$publication->timestamp</td>";
                        echo"<td>";
                        if ($publication->publication_status == 0) {
                            echo "Private";
                        }
                        else {
                            echo "Public";
                        }
                        echo "</td>";
    
                        echo"<td>";
                        if ($publication->publication_status == 0) {
                            echo "<a href='/Assignment2/Publication/makePublicationPublic/$publication->publication_id'>Make Public</a>";
                        }
                        else {
                            echo "<a href='/Assignment2/Publication/makePublicationPrivate/$publication->publication_id'>Make Private</a>";
                        }
                        echo "</td>";
    
                        echo
                        "<td>
                            <a href='/Assignment2/Publication/editPublication/$publication->publication_id'>Edit</a>
                        </td>";
                        echo
                        "<td>
                            <a href='/Assignment2/Publication/deletePublication/$publication->publication_id'>Delete</a>
                        </td>";
    
                        echo"</tr>";
                    }

                    echo "</table>";
                }
            ?>
        </div>
    </div>

    <div class="container"> 
        <h2>List of Comments</h2>
        <?php 
            $comments = $data["comments"];
            if (!($comments)) {
                echo "No comments found...";
            }
            else {
                foreach ($comments as $comment) {
                    echo "<div class='container'>";
                    echo "<h5>";
                    echo "<a href='/Assignment2/Publication/getPublication/$comment->publication_id'>Comment</a> on $comment->publication_title on $comment->timestamp";
                    
                    echo " <a href='/Assignment2/Comment/editComment/$comment->publication_comment_id' role='button'>Edit</a> ";
                    echo "<a href='/Assignment2/Comment/deleteComment/$comment->publication_comment_id' role='button'>Delete</a>";
                    
                    echo "</h5>";
                    echo "<p>";
                    echo $comment->publication_comment_text;
                    echo "</p>";
                    echo "</div>";
                }
            }
        ?>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>