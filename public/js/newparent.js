$(function() {

  $('#new-item').on('submit', function(e) {
    e.preventDefault();
    ajaxForm(e.target, function(data) {
      if(data['success']){
        window.location.href = data['path'];
      }
    });
  });

  $('.edit-btn').on('click', function(){
    console.log("hello");
    c=$(this).parent().parent().children();
    form= $('#new-item');
    form.find("input[name='Firstname']").val(c.eq(1).text());
    form.find("input[name='Lastname']").val(c.eq(2).text());
    form.find("input[name='Childid']").val(c.eq(3).text());
    form.find("input[name='Telephone']").val(c.eq(4).text());
    form.find("input[name='Email']").val(c.eq(5).text());
    form.find("input[name='Address']").val(c.eq(6).text());
    form.find("input[name='Dateapplied']").val(c.eq(7).text());
    form.find("input[name='Biologicalchild']").val(c.eq(8).text());
    form.find("input[name='Staffid']").val(c.eq(9).text());
    form.find("input[name='Gender']").val(c.eq(10).text());
    form.find("input[name='Age']").val(c.eq(11).text());
    form.find("input[name='Newparentid']").val(c.eq(0).text());
  })

});
 ///Ajax call to delete
$('.delete_data').on('click', function() {
    // grab id element
  var pnid = $(this).attr("id")
  console.log(pnid);
    // make ajax call to delete
    $.ajax({
      type:'DELETE',
      url : "newParent/" 
      + pnid + "/"})
    .done(function() {
    })
})