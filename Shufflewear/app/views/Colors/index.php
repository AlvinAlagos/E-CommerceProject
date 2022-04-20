<?php require APPROOT . '/views/includes/header.php';
?>
<div class="container">
    <form  method="post"  action="">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Piece</th>
                <th scope="col">Color</th>
                <th scope="col">Randomize</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <th scope="row">Top</th>
                <td><div style="width:65px; height:65px; background-color:<?php echo $_SESSION['color1']->hex; ?>"></div></td>
                <td>
                    <input class="form-check-input" type="checkbox" value="true" id="color1" name="randomizeColor1">
                    <label class="form-check-label" for="flexCheckDefault">
                        Randomize
                    </label>
                </td>
                </tr>
                <tr>
                <th scope="row">Bottom</th>
                <td><div style="width:65px; height:65px; background-color:<?php echo $_SESSION['color2']->hex; ?>"></div></td>
                <td>
                    <input class="form-check-input" type="checkbox" value="true" id="color2" name="randomizeColor2">
                    <label class="form-check-label" for="flexCheckDefault">
                        Randomize
                    </label>
                </td>
                </tr>
                <tr>
                <th scope="row">Shoes</th>
                <td><div style="width:65px; height:65px; background-color:<?php echo $_SESSION['color3']->hex; ?>"></div></td>
                <td>
                    <input class="form-check-input" type="checkbox" value="true" id="color3" name="randomizeColor3">
                    <label class="form-check-label" for="flexCheckDefault">
                        Randomize
                    </label>
                </td>
                </tr>
            </tbody>
        </table>
        <div class="pt-1 mb-4">
            <button class="btn btn-dark btn-block" type="submit" name="rerandomize">Randomize</button>   
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php';
?>