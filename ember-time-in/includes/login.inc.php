<?php
   session_start();
   include_once './dbh_inc.php';

   $id = mysqli_real_escape_string($conn,$_POST['id']);
   
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
         header("Location: ../index.php?signup=repeated");

         $sql = "SELECT * FROM attendance WHERE student_id='$id';";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);

      } else {
         $sql = "UPDATE members SET logged_in=1 WHERE student_id=$id";
         mysqli_query($conn, $sql);
         $fullName = $row['first_name']." ".$row['last_name'];
         $msg = "$fullName logged in!";
         

         date_default_timezone_set("Asia/Hong_Kong");
         $time =  date('H:i:sa');
         $sql = "INSERT INTO attendance (student_id, last_name, first_name, section, time_in) 
         VALUES (".$id.",'".$row['last_name']."', '".$row['first_name']."', '".$row['section']."', '".$time."');";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         header("Location: ../index.php?signup=successful&user=$fullName");
      }
      $_SESSION['message'] = $msg;
   } else {
      header("Location: ../index.php?signup=unsuccessful");
   }
?>