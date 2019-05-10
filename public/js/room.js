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
    
    form.find("input[name='Building']").val(c.eq(1).text());
    form.find("input[name='Floor']").val(c.eq(2).text());
    form.find("input[name='Roomnum']").val(c.eq(3).text());
    form.find("input[name='Capacity']").val(c.eq(4).text());
    form.find("input[name='Childid']").val(c.eq(5).text());
    form.find("input[name='Roomid']").val(c.eq(0).text());
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
      url : "room/" 
      + pnid + "/"})
    .done(function() {
    })
})