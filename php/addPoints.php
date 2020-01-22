<?php
   session_start();
   include_once './db.inc.php';

   $points = $_POST["points"];
   $id = $_POST["studentNumber"];
   $sql = "UPDATE members SET student_points = student_points +". $points ." WHERE student_id=".$id;
   mysqli_query($conn, $sql);
   