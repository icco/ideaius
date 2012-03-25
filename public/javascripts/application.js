$(document).ready(function() {
  var chatForm = $("#posttochat");
  chatForm.submit(function(ev) {
    event.preventDefault();
    var text = chatForm.children('input[name=text]').val();
    chatForm.children('input[name=text]').val(''),
    $.post('/chat/new', {
      text: text,
      idea: chatForm.children('input[name=idea]').val(),
      user: chatForm.children('input[name=user]').val(),
    }, function(data) {
      $('.posts').append('<div class="post">' + data.text + ' - ' + data.time + '</div>');
    }, 'json');
  });
});
