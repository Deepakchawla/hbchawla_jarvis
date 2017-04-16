














<?php

$image_data = null;


if(empty($image_data[0])){
    $image_value[0] = "uploads_images/people.png";
    $image_value[1] = "uploads_images/people.png";}

?>


<!DOCTYPE html>
<html>
<head lang="en">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <meta charset="UTF-8">
    <title>Image based Object recognition</title>

    <style>

    body {margin:0;}

    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: dodgerblue;
    position: fixed;
    top: 0;
    width: 100%;
    }

    li {
    float: left;
    }

    li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

    li a:hover:not(.active) {
    background-color: deepskyblue;
    }

    .active {
    background-color: #4CAF50;
    }
    </style>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                            .attr('src', e.target.result)
                            .width(350)
                            .height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="about.html">About</a></li>
</ul>

<div style="padding:20px;margin-top:30px;background-color:aliceblue;height:1500px;">
    <img id="blah" src="<?php echo $image_value[0]?>" alt="your image"  width="200px" height="200px"/>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="fileToUpload" onchange="readURL(this);">
        <input type="submit" value="Submit" name="submit">
    </form>





</div>

</body>
</html>
