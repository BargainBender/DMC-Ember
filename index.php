<?php
  include "./php/db.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Ember</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <!--Custom scripts and stylesheets-->

  <link rel="stylesheet" href="./stylesheets/style.css?v=<?php echo time(); ?>">

  <!--Underscore.js-->
  <script src="./javascript/underscore.js"></script>
</head>

<body>
  <?php include "./php/navTop.php";?>
  <li class="nav-item active">
    <p class="nav-link m-0" style="cursor: pointer;">Point Editor</p>
  </li>
  <li class="nav-item">
    <p class="nav-link m-0" style="cursor: pointer;" id="timeInLink">Time-in</p>
  </li>
  <li class="nav-item">
    <p class="nav-link m-0" style="cursor: pointer;" id="timeOutLink">Time-out</p>
  </li>
  </ul>
  <form action="" class="form-inline">
    <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Enter name" aria-label="Search" />
  </form>
  <?php include "./php/navBottom.php";?>
  <div id="contents" class="container pt-3" style="margin-top:76px">
    <!--<button type="button" class="btn btn-dark" id="test">Press me</button>-->
    <!-- Content area -->
    <div id="studentsList">
      <?php
          include "./studentsList.php";
      ?>
    </div>
    <!-- <div class='d-flex mx-auto border container-fluid row p-4 student-info mb-3' data-full-name='ROSARIO, Khaylle'
      data-student-number='2000131440' data-points='15' data-toggle="modal" data-target="#myModal">
      <div class='d-flex flex-column'>
        <h5 class='full-name'>ROSARIO, Khaylle</h5>
        <small class='student-number'>2000131440</small>
      </div>
      <h2 class='points ml-auto my-auto mr-4'>15<span class='badge pl-l d-none d-sm-inline'>pts</span></h2>
    </div> -->



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="container-fluid pl-0">
              <h3 class="modal-title" id="myModalLabel"></h3>
              <h5 class="text-secondary" id="modalStudentNumber"></h5>
            </div>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h1 id="modalStudentPoints"></h1>
            <select class="browser-default custom-select" id="pointSelector">
              <option selected value="0">Add points</option>
              <option disabled>-----Participation-----</option>
              <option value="3">3 Points</option>
              <option disabled>-----Task Completion-----</option>
              <option value="5">5 points</option>
              <option value="6">6 points</option>
              <option value="7">7 points</option>
              <option value="8">8 points</option>
              <option value="9">9 points</option>
              <option value="10">10 points</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" id="closeBtn" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="addPointsBtn" class="btn btn-primary">Add points</button>
          </div>
        </div>
      </div>
    </div>
  </div>







  <script src="./javascript/script.js?v=<?php echo time(); ?>" defer></script>
</body>

</html>