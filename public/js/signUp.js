$(function() {


  $('#mainForm').on('submit', function(e) {
    e.preventDefault();
    ajaxForm(e.target, function(data) {
      console.log(data);
      if(data['success']){
        window.location.href = data['path'];
        
      }
    });
  });



});


