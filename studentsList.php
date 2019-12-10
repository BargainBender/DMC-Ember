<?php
    include "./php/db.inc.php";

    $sql = "SELECT * FROM members;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    if ($resultCheck > 0) {
        $sql = "SELECT * FROM members;";
        $result = mysqli_query($conn, $sql);
        echo $row['first_name'];
     }

?>

<div class="d-flex mx-auto border container-fluid row p-4 student-info"
     data-full-name="Rosario, Khaylle Marie"
     data-student-number="2000131440"
     data-points="15"
>
 <div class="d-flex flex-column">
  <h5 class="full-name">Rosario, Khaylle Marie</h5>
  <small class="student-number">2000131440</small>
 </div>
 <h2 class="points ml-auto my-auto mr-4">15<span class="badge pl-l d-none d-sm-inline">pts</span></h2>
</div>