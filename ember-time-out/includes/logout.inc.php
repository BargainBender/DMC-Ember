<?php
   session_start();
   include_once './dbh_inc.php';

   $id = mysqli_real_escape_string($conn,$_POST['id']);
   $sql = "SELECT * FROM members WHERE student_id='$id';";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);

   if ($resultCheck > 0) {
      $sql = "SELECT first_name, last_name, logged_in FROM members WHERE student_id='$id';";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $msg;
      if ($row['logged_in'] == 0) {
         $msg = "You are already logged out! <br>Please log in to log out!";
         header("Location: ../index.php?logout=repeated");
      } else {
         $sql = "UPDATE members SET logged_in=0, student_points = student_points +1 WHERE student_id=$id";
         mysqli_query($conn, $sql);
         $fullName = $row['first_name']." ".$row['last_name'];
         $msg = "$fullName logged out!";
         
         date_default_timezone_set("Asia/Hong_Kong");
         $time =  date('H:i:sa');
         $sql = "UPDATE attendance SET time_out = '$time' WHERE student_id=$id";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         header("Location: ../index.php?logout=successful&user=$fullName");
      }
      $_SESSION['message'] = $msg;

      
      
   } else {
      header("Location: ../index.php?logout=unsuccessful");
   }
   

   