<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container"> 
        <h1>Edit Publication</h1>

        <form action='' method='post' enctype="multipart/form-data">

            <div class="mb-3">
                <label for="titleinput">Title</label>
                <input name="title" type="text" class="form-control" id="titleinput" placeholder="Title" value="<?php echo $data->publication_title; ?>">
            </div>
            
            <div class="mb-3">
                <label for="text">Text</label>
                <textarea name="text" type="text" class="form-control" id="text" placeholder="Text"><?php echo $data->publication_text; ?></textarea>
            </div>

            <div class="form-check mb-3">
                <input name="status" class="form-check-input" type="checkbox" value="1" id="status" <?php if ($data->publication_status == 1) { echo 'checked'; }?> >
                <label class="form-check-label" for="status">
                    Make publication visible (can be changed under profile later)
                </label>
            </div>

            <button type="submit" name='editPublication' class="btn btn-primary">Submit Changes</button>
        </form>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>