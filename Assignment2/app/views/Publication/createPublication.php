<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container"> 
        <h1>Create Publication</h1>

        <form action='' method='post' enctype="multipart/form-data">

            <div class="mb-3">
                <label for="titleinput">Title</label>
                <input name="title" type="text" class="form-control" id="titleinput" placeholder="Title">
            </div>
            
            <div class="mb-3">
                <label for="text">Text</label>
                <textarea name="text" type="text" class="form-control" id="text" placeholder="Text"></textarea>
            </div>

            <div class="form-check mb-3">
                <input name="status" class="form-check-input" type="checkbox" value="1" id="status" checked>
                <label class="form-check-label" for="status">
                    Make publication visible (can be changed under profile later)
                </label>
            </div>

            <button type="submit" name='createPublication' class="btn btn-primary">Publish</button>
        </form>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>