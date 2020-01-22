<?php
   session_start();
   include_once './dbh_inc.php';

   $id = mysqli_real_escape_string($conn,$_POST['check_id']);
   
   $sql = "SELECT * FROM members WHERE student_id='$id';";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);
   $row = mysqli_fetch_assoc($result);

   if ($resultCheck > 0) {
      $sql = "SELECT * FROM members WHERE student_id='$id';";
      $result = mysqli_query($conn, $sql);
      $msg;
      if ($row['logged_in'] == 1) {
         $msg = "You are already logged in!<br> Please log out to log in!";
         header("Location: ../index.php?qrcheck=repeated");

      } else {
         $fullName = $row['first_name']." ".$row['last_name'];
         $msg = "Hello, $fullName!";
         $_SESSION['check_id_info'] = $id;
         header("Location: ../index.php?qrcheck=successful");
      }
      $_SESSION['message'] = $msg;
      echo $msg;
   } else {
      header("Location: ../index.php?qrcheck=unsuccessful");
   }
?>