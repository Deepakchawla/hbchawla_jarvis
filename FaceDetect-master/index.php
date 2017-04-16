<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Face API</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <style>
        body {margin:0; }
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
        .back{
            background-image: url(images/face2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            overflow-x: hidden;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .sel {
            background-color: rgba(0,0,0,.7);
            margin-top: 200px;
            margin-left: 200px;
            margin-right: 200px;
            height: 200px;
            width: 850px;
            padding: 20px;
            max-width: 100%;

            min-width: 30%;
        }
        .header-message{
            color:#ffffff;

        }
        #buton{
            margin-top: 30px;
            margin-left: 680px;
        }

    </style>
</head>
<body>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="about.html">About</a></li>
</ul>

<div class="back">
    <div style="padding:20px;margin-top:30px;height:1500px;">
        <div class="jumbotron sel">
            <div class="header-message">
                <p >Detect human faces and compare similar ones,organize people into groups according to visual
                    similarity,and identify previously tagged people in images.
                </p>
            </div>
            <div>
                <a href="firstPage.php">
                    <input id="buton" class="btn btn-default"type="button" name="submit"   value="GET START"/>
                </a>
            </div>



        </div>
    </div>
</div>
</body>
</html>










