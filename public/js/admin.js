$(function() {

  $('#new-item').on('submit', function(e) {
    e.preventDefault();
    ajaxForm(e.target, function(data) {
      if(data['success']){
        window.location.href = data['path'];
      }
      else{
        alert('Error while creating user');
      }
    });
  });


});