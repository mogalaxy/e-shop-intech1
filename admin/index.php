<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shope online | add a new product</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>upload a new product</h2>
                <img src="logo.jpg" alt="logo" width="450px">
                <input type="text" name='name'>
                <br>
                <input type="text" name='price'>
                <br>
                <input type="text" name='info'>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file">Choose a picture of the product</label>
                <button name='upload'>UPLOAD✅</button>
                <br><br>
                <a href="products.php">Show all product</a>
            </form>
        </div>
        
    </center>
</body>
</html>