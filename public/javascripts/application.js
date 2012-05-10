$(document).ready(function() {
  $('#messages input:checkbox').change(function(e) { 
    console.log(e.currentTarget.checked);
    console.log(e.currentTarget);
  });
});
