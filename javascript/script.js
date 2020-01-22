const PROPAGATION_MODE_CAPTURE = true;
$(document).ready(function() {
  // Set default opened tab
  if (sessionStorage.getItem("openedTab") === null) {
    sessionStorage.setItem("openedTab", "editor");
  }
  function forceHTTPS() {
    if (location.protocol != "https:") {
      location.href =
        "https:" +
        window.location.href.substring(window.location.protocol.length);
    }
  }
  forceHTTPS();
  $("#test").click(function() {
    $.get("./text.txt", function(data, status) {
      $("#sampleP").html(data);
      alert(status);
    });
  });

  
  let student_info_list = document.querySelectorAll(".student-info");
  student_info_list.forEach(element => {
    element.addEventListener(
      "click",
      function(event) {
        let student_info_div = event.target.closest(".student-info");
        let fullName = student_info_div.dataset.fullName;
        let studentPoints = student_info_div.dataset.points;
        let studentNumber = student_info_div.dataset.studentNumber;
        console.log(fullName);
        $("#myModalLabel").html(fullName);
        $("#modalStudentPoints").html(
          `${studentPoints} <span class='badge pl-1'>pts</span>`
        );
        $("#modalStudentNumber").html(studentNumber);
      },
      PROPAGATION_MODE_CAPTURE
    );
  });

  $("#timeInLink").on("click", function() {
    window.location = `${window.location.href}/ember-time-in`;
  });

  $("#timeOutLink").on("click", function() {
    window.location = `${window.location.href}/ember-time-out`;
  });

  $("#addPointsBtn").on("click", function() {
    let points = $('#pointSelector').val();
    if (points == 0) {
      alert('Please select points to add!');
    } else {
      addPoints();
      // console.log(`current points ${points}`);
      // let toAdd = parseInt($('#pointSelector').val());
      // console.log(`to add: ${toAdd}`);
      // let newPoints = points + toAdd;
      // console.log(`new points: ${newPoints}`);
      $('#closeBtn').trigger('click');
    }
    
  });

  
  function addPoints() {
    let points = $('#pointSelector').val();
    let modalStudentNumber = $('#modalStudentNumber').html();
    //alert(modalStudentNumber);
    $.ajax({
      type: "POST",
      url: "../php/addPoints.php",
      data: {points: points, studentNumber: modalStudentNumber},
      beforeSend: function(xhr){
        //resp.html("Please wait...");
      },

      //Will call if method not exists or any error inside php file
      error: function(qXHR, textStatus, errorThrow){
          alert("There is an error");
      },

      success: function(data, textStatus, jqXHR){
          //alert(data);
          $('#studentsList').load(
            '../studentsList.php',
            {}
          );
      }
    });
  };

  $('#searchInput').on('input', function() {
    let queryInput = $(this).val();
    let student_info_list = document.querySelectorAll(".student-info");
    student_info_list.forEach(function(element) {
    
      if (!element.dataset.fullName.toLowerCase().includes(queryInput)) {
        if (element.classList.contains('d-flex')) {
          element.classList.remove('d-flex');
          element.classList.add('d-none');
        }
      } else {
        element.classList.add('d-flex');
      }
    
    });
  });

  

});
