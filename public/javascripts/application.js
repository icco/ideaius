$(document).ready(function() {
  var chatForm = $("#posttochat");
  chatForm.submit(function(ev) {
    event.preventDefault();
    $.post('/chat/new', {
      text: chatForm.children('input[name=text]').val(),
      idea: chatForm.children('input[name=idea]').val(),
      user: chatForm.children('input[name=user]').val(),
    }, function(data) {
      console.log(data);
    }, 'json');
  });
});
