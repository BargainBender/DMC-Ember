<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <title>Ember: Time in</title>
  <script src="./scripts/sc.js" defer></script>
  <script src="./scripts/links.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script type="text/javascript" src="https://webrtc.github.io/adapter/adapter-latest.js"></script>  
  <link rel="stylesheet" href="./stylesheets/login.css?v=<?php echo time(); ?>">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>

  <?php include "../php/navTop.php";?>
  <li class="nav-item">
    <p class="nav-link m-0" style="cursor: pointer;" id="pointEditor">Point Editor</p>
  </li>
  <li class="nav-item active">
    <p class="nav-link m-0" style="cursor: pointer;"">Time-in</p>
  </li>
  <li class="nav-item">
    <p class="nav-link m-0" style="cursor: pointer;" id="timeOutLink">Time-out</p>
  </li>
  </ul>
  <?php include "../php/navBottom.php";?>

  <div id="layer-two">
    <div class="login-container">
      <div id="video-wrapper">
        <video id="preview" playsinline></video>
      </div>
      <script type="text/javascript">
      function is_mobile() {
        if (navigator.userAgent.match(/Android/i) ||
          navigator.userAgent.match(/webOS/i) ||
          navigator.userAgent.match(/iPhone/i) ||
          navigator.userAgent.match(/iPad/i) ||
          navigator.userAgent.match(/iPod/i) ||
          navigator.userAgent.match(/BlackBerry/i) ||
          navigator.userAgent.match(/Windows Phone/i)
        ) {
          return true;
        } else {
          return false;
        }
      }


      if (is_mobile() == true) {
        Instascan.Camera.getCameras().then(function(cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[1]);
            console.log(cameras[1].id);
            console.log('Mobile version detected!');
          } else {
            console.log('Error: No camera available.');
          }
        }).catch(function(e) {
          console.error(e);
        });

        let scanner = new Instascan.Scanner({
          video: document.getElementById('preview'),
          scanPeriod: 5,
          mirror: false
        });

        scanner.addListener('scan', function(content) {
          document.getElementById('id').value = content;
          document.getElementById('check_id').value = content;
          document.getElementById('check_form').submit();
        });

      } else {

        let scanner = new Instascan.Scanner({
          video: document.getElementById('preview'),
          scanPeriod: 5,
          mirror: true
        });

        scanner.addListener('scan', function(content) {
          document.getElementById('id').value = content;
          document.getElementById('check_id').value = content;
          document.getElementById('check_form').submit();
        });

        Instascan.Camera.getCameras().then(function(cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
            console.log(cameras[0].id);
            scanner
            console.log('Desktop version detected!');
          } else {
            console.log('Error: No camera available.');
          }
        }).catch(function(e) {
          console.error(e);
        });
      }
      </script>

      <form id="check_form" action="./includes/check.inc.php" method="POST" class="login-wrapper" style="display:none;">
        <input type="number" id="check_id" name="check_id">
      </form>

      <form action="./includes/login.inc.php" method="POST" class="login-wrapper">
        <input type="number" id="id" name="id" placeholder="Student Number" style="display:none;">
        <button type="submit" name="submit" id="login-btn">Hit me up!</button>
      </form>

      <?php
                ini_set('display_errors', '0');

                if ($_GET['qrcheck'] == "unsuccessful") {
                    echo "<center><p>Who dat?</p></center>";
                } else if ($_GET['qrcheck'] == "successful") {
                    $msg = $_SESSION['message'];
                    echo "<center><p>$msg</p></center>";
                    echo "<script> document.getElementById('id').value = '". $_SESSION['check_id_info']."'</script>";
                } else if ($_GET['qrcheck'] == "repeated"){
                    $msg = $_SESSION['message'];
                    echo "<center><p>$msg</p></center>";
                }

                if ($_GET['signup'] == "unsuccessful") {
                    echo "<center><p>Anuginagawamue?</p></center>";
                } else if ($_GET['signup'] == "successful") {
                    $msg = $_SESSION['message'];
                    echo "<center><p>$msg</p></center>";
                } else if ($_GET['signup'] == "repeated"){
                    $msg = $_SESSION['message'];
                    echo "<center><p>$msg</p></center>";
                }
            ?>
    </div>
  </div>

  <div id="layer-one"></div>

</body>

</html>