<?php
require_once('./upoperation.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <a href="arrivals.php">Arrival</a>

    <br>
    <h1 class="text-center my-3">UPLOAD SAMPLE BOOK</h1>

    <div class ="container d-flex justify-content-center">
        <form action ="featured.php" method="post" class="w-50" enctype="multipart/form-data">
    
            <?php  inputFields("Username","username","","text")  ?>
            <?php  inputFields("Mobile","mobile","","text")  ?>

            <?php  inputFields("","file","","file")  ?>

            <button class="btn btn-dark" type="submit" name="submit">Submit</button>

        </form>
    </div>



    
</body>
</html>