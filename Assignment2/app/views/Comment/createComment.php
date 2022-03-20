<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container"> 
        <h1>Write Comment</h1>

        <form action='' method='post' enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="text">Comment</label>
                <textarea name="text" type="text" class="form-control" id="text"></textarea>
            </div>
            
            <button type="submit" name='createComment' class="btn btn-primary">Comment</button>
        </form>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>