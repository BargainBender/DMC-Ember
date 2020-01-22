<?php
    include "./php/db.inc.php";

    $sql = "SELECT * FROM members ORDER BY last_name ASC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $fullName = $row['last_name'].", ".$row['first_name'];
            $points = $row['student_points'];
            $student_number = $row['student_id'];

            echo "<div class='d-flex mx-auto border container-fluid row p-4 student-info mb-3' data-full-name='".$fullName."'";
            echo "    data-student-number='".$student_number."' data-points='".$points."' data-toggle='modal' data-target='#myModal'>";
            echo "    <div class='d-flex flex-column'>";
            echo "        <h5 class='full-name'>".$fullName."</h5>";
            echo "        <small class='student-number'>".$student_number."</small>";
            echo "    </div>";
            echo "    <h2 class='points ml-auto my-auto mr-4'>".$points."<span class='badge pl-1 d-none d-sm-inline'>pts</span></h2>";
            echo "</div>";

            // echo "<div class='d-flex mx-auto border container-fluid row p-4 student-info mb-3 data-full-name='".$fullName."'";
            // echo "  data-student-number='2000131440' data-points='15' data-toggle='modal' data-target='#myModal'>";
            // echo "  <div class='d-flex flex-column'>";
            // echo "    <h5 class='full-name'>".$fullName."</h5>";
            // echo "    <small class='student-number'>2000131440</small>";
            // echo "  </div>";
            // echo "  <h2 class='points ml-auto my-auto mr-4'>15<span class='badge pl-l d-none d-sm-inline'>pts</span></h2>";
            // echo "</div>";
        }
     }

?>

<!--
<div class="d-flex mx-auto border container-fluid row p-4 student-info" data-full-name="Rosario, Khaylle Marie"
 data-student-number="2000131440" data-points="15">
 <div class="d-flex flex-column">
  <h5 class="full-name">Rosario, Khaylle Marie</h5>
  <small class="student-number">2000131440</small>
 </div>
 <h2 class="points ml-auto my-auto mr-4">15<span class="badge pl-l d-none d-sm-inline">pts</span></h2>
</div>
-->