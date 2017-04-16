<?php
$uploads_dir = 'uploads_images/';
$tmp_name = $_FILES["image"]["tmp_name"];
$image_path[0] = $_FILES["image"]["name"];
$image_path[1] = $uploads_dir.$image_path[0];
move_uploaded_file($tmp_name,$image_path[1]);
$image = $image_path[1];
$image_path[2] = "uploads_images/result.jpg";
echo shell_exec("python face_detect_cv3.py $image");
$image_value[0] = $image_path[1];
$image_value[1] = $image_path[2];
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
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
<body>
<div class="container" style="margin-top: 40px">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $image_value[0]?>" width="400px" height="400px">
        </div>
        <div class="col-md-6">
            <img src="<?php echo $image_value[1]?>" width="400px" height="400px">
        </div>
    </div>
</div>





</body>