<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ember: Log out</title>
    <link rel="stylesheet" href="./stylesheets/index.css">
</head>
<body>
    
    <div id="layer-two">
            <div class="login-container">
                <form action="./includes/logout.inc.php" method="POST" class="login-wrapper">
                <input type="number" name="id" placeholder="Enter ID Number">
                <button type="submit" name="submit" id="login-btn">Get me out!</button>
            </form>
            <?php
                ini_set('display_errors', '0');
                if ($_GET['logout'] == "unsuccessful") {
                    echo "<center><p>Anuginagawamue?</p></center>";
                } else if ($_GET['logout'] == "successful") {
                    $msg = $_SESSION['message'];
                    echo "<center><p>$msg</p></center>";
                } else if ($_GET['logout'] == "repeated"){
                    $msg = $_SESSION['message'];
                    echo "<center><p>$msg</p></center>";
                }
                ?>
        </div>
    </div>
    
    
    <div id="layer-one">
        
        </div>
        
        <script>
            var myIndex = 0;
            var imgArr = [
                './images/Desert.jpg',
                './images/Penguins.jpg',
                './images/Jellyfish.jpg',
                './images/Koala.jpg'
            ]
            carousel();
            
            function carousel() {
                var i;
                myIndex++;
                if (myIndex > imgArr.length) {myIndex = 1}
                //console.log(imgArr[myIndex-1]);
                let bg = document.getElementById('layer-one');
                bg.style = `background-image:url(${imgArr[myIndex-1]})`;
                //console.log(bg.style.background)
                setTimeout(carousel, 3000);
            }
        </script>
            
</body>
</html>