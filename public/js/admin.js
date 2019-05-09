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
  $('.edit-btn').on('click', function(){
    console.log("hello");
    c=$(this).parent().parent().children();
    form= $('#new-item');
    form.find("input[name='Firstname']").val(c.eq(1).text());
    form.find("input[name='Lastname']").val(c.eq(2).text());
    form.find("input[name='Position']").val(c.eq(3).text());
    form.find("input[name='Email']").val(c.eq(4).text());
    form.find("input[name='Password']").val(c.eq(5).text());

    form.find("input[name='Staffid']").val(c.eq(0).text());
  })

});