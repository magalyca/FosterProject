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
  $('.edit-btn2').on('click', function(){
    console.log("hello");
    c=$(this).parent().parent().children();
    form= $('#new-item');
    form.find("input[name='Childid']").val(c.eq(1).text());
    form.find("input[name='Recordtype']").val(c.eq(2).text());
    form.find("input[name='Description']").val(c.eq(3).text());
    form.find("input[name='Dateentered']").val(c.eq(4).text());

    form.find("input[name='Medrecordid']").val(c.eq(0).text());
  })

});