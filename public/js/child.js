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
    form.find("input[name='Dateofbirth']").val(c.eq(3).text());
    form.find("input[name='Age']").val(c.eq(4).text());
    form.find("input[name='Gender']").val(c.eq(5).text());
    form.find("input[name='Roomnumber']").val(c.eq(6).text());
    form.find("input[name='Adopted']").val(c.eq(7).text());
    form.find("input[name='Staffid']").val(c.eq(8).text());
    form.find("input[name='Dateentered']").val(c.eq(9).text());
    form.find("input[name='Emergencycontact']").val(c.eq(10).text());
    form.find("input[name='Medicalrecordid']").val(c.eq(11).text());
    form.find("input[name='Personaldocid']").val(c.eq(12).text());
    form.find("input[name='Height']").val(c.eq(13).text());
    form.find("input[name='Weight']").val(c.eq(14).text());
    form.find("input[name='Bioparentid']").val(c.eq(15).text());
    form.find("input[name='Newparentid']").val(c.eq(16).text());

    form.find("input[name='Childid']").val(c.eq(0).text());
  })

});