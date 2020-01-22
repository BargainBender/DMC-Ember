$(document).ready(function() {

  function forceHTTPS() {
    if (location.protocol != "https:") {
      location.href =
        "https:" +
        window.location.href.substring(window.location.protocol.length);
    }
  }
  forceHTTPS();

  $("#pointEditor").on("click", function() {
    let url = window.location.href.replace('ember-time-out', '');
    window.location.href = url;
  });

  $("#timeInLink").on("click", function() {
    let url = window.location.href.replace('out', 'in');
    window.location.href = url;
  });
});
