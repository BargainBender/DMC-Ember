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
    let url = window.location.href.replace('ember-time-in', '');
    window.location.href = url;
  });

  $("#timeOutLink").on("click", function() {
    let url = window.location.href.replace('in', 'out');
    window.location.href = url;
  });
});
