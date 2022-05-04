<?php require APPROOT . '/views/includes/header.php';
?>

<!-- <div class="container" style="width: 100%; height: 100%; margin-left:0; margin-right:-10px;"> -->
<div class="filter-bar" style="width: 15%; height: 100%; float:left; ">
<h3 class="mb-3" style="margin-top:5%;margin-left:5%"><u>Filter</u></h3>

<form method="post" action="" style="margin-left:5%;">
    <p>Color:</p>
    <input type="radio" id="Black" name="Color" value="Black">
    <label for="Black">Black</label><br>
    <input type="radio" id="Gray" name="Color"value="Gray">
    <label for="Gray">Gray</label><br>
    <input type="radio" id="White" name="Color"value="White">
    <label for="White">White</label><br>
    <input type="radio" id="Green" name="Color"value="Green">
    <label for="Green">Green</label><br>
    <input type="radio" id="Yellow" name="Color"value="Yellow">
    <label for="Yellow">Yellow</label><br>
    <input type="radio" id="Blue" name="Color"value="Blue">
    <label for="Blue">Blue</label><br>
    <input type="radio" id="Purple" name="Color"value="Purple">
    <label for="Purple">Purple</label><br>
    <input type="radio" id="Red" name="Color"value="Red">
    <label for="Red">Red</label><br>
    <input type="radio" id="Orange" name="Color"value="Orange">
    <label for="Orange">Orange</label><br>
    
    <button class="btn btn-dark btn-lg btn-block" type="submit" name="filter" style="font-size:10px; width:50%;">Filter Color</button>   

</form>
</div>

<div class="right-side" style="width: 85%; height: auto; float:left; border-left: 2px solid black; ">

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