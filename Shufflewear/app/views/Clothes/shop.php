<?php require APPROOT . '/views/includes/header.php';
?>

<!-- <div class="container" style="width: 100%; height: 100%; margin-left:0; margin-right:-10px;"> -->
<div class="filter-bar" style="width: 15%; height: 100%; float:left; ">
<h3 class="mb-3" style="margin-top:5%;margin-left:5%"><u>Filter</u></h3>

<form method="post" action="" style="margin-left:5%;">
    <p>Color:</p>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Black" value="Black">
        <label class="form-check-label" for="Black">
            Black
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Gray" value="Gray">
        <label class="form-check-label" for="Gray">
            Gray
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="White" value="White">
        <label class="form-check-label" for="White">
            White
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Green" value="Green">
        <label class="form-check-label" for="Green">
            Green
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Yellow" value="Yellow">
        <label class="form-check-label" for="Yellow">
            Yellow
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Blue" value="Blue">
        <label class="form-check-label" for="Blue">
            Blue
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Purple" value="Purple">
        <label class="form-check-label" for="Purple">
            Purple
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Red" value="Red">
        <label class="form-check-label" for="Red">
            Red
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Color" id="Orange" value="Orange">
        <label class="form-check-label" for="Orange">
            Orange
        </label>
    </div>
    
    <button class="btn btn-dark btn-lg btn-block mt-3" type="submit" name="filter" style="font-size:10px; width:50%;">Filter Color</button>   

</form>
</div>

<div class="right-side" style="width: 85%; height: 100%; float:left; border-left: 2px solid black; ">

    <div class="container" style="margin-top: 5%;">
        <div class="row row-cols-3"> 
            <?php //change the $listing->itemId to listing id, ill put a really long line here to remember ok pls tyty <3 aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                //also check if there are any listings set
                foreach($data['listing'] as $listing) {
                    echo '<div class="col mb-5 text-center" style="height: 350px;">
                            <a href="/Shufflewear/Shop/description/'. $listing->listingId . '"><img src="' . URLROOT . '/public/img/' . $listing->img . '" width="60%" style="object-fit: contain; height: 300px; border: 1px solid rgb(200,200,200); background-color: rgb(245,245,245);"></a>
                            <h4 class="mt-3" style="
                            text-align: center; 
                            font-style: normal;
                            font-weight: 300;
                            font-size: 20px;">'. $listing->itemName .'</h4>

                            <h5 style="
                            font-style: normal;
                            font-weight: 300;
                            font-size: 15px;">' . sprintf('$%.2F', $listing->price) . '</h5>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>  
</div> 

<?php require APPROOT . '/views/includes/footer.php';
?>