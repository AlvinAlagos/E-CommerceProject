<?php require APPROOT . '/views/includes/header.php';?>
    <div class="container mb-5">
        <h1>Publication Search</h1>
        <p>Here, you can search by title, content or author.</p>
        <a class="btn btn-primary" href="/Assignment2/Home" role="button">Go Back Home</a>
    </div>
    <div class="container mb-5">
        <form action='' method='post' enctype="multipart/form-data">
            <div class="form-outline mb-2">
                <label class="form-label" for="search">Search for a publication</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search"/>
            </div>

            <button type="submit" name='searchTitle' class="btn btn-primary">Search from Titles</button>
            <button type="submit" name='searchContent' class="btn btn-primary">Search from Content</button>
            <button type="submit" name='searchAuthor' class="btn btn-primary">Search from Authors</button>
        </form>

        <?php
            if(!empty($data['msg'])){
                echo '<div class="alert alert-danger" role="alert">'.
                    $data['msg'].'
                    </div>';
            }

            echo "Current filter: ".$data['filter'];
        ?>
    </div>
    <div class="container mb-5">
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