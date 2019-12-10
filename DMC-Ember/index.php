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
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"
    ></script>
    <script src="./javascript/script.js" defer></script>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./stylesheets/style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a href="#" class="navbar-brand" style="padding: 0;">
          <img style="height: 60px; " src="./assets/images/favicon.png" alt="Ember">
      </a>
      <h1 class="text-light my-auto">Ember</h1>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pr-4">
          <li class="nav-item active">
            <a href="#" class="nav-link">Point Editor</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Time-in</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Time-out</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Log out</a>
          </li>
        </ul>
        <form action="" class="form-inline">
          <input
            type="text"
            class="form-control mr-sm-2"
            type="search"
            placeholder="Enter name"
            aria-label="Search"
          />
          <button class="btn btn-light my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div id="contents" class="container-fluid" style="margin-top:76px">
      <!--<button type="button" class="btn btn-dark" id="test">Press me</button>-->
      <p id="sampleP"></p>
    </div>
  </body>
</html>
