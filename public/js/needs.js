$(function() {

  $('#new-item').on('submit', function(e) {
    e.preventDefault();
    ajaxForm(e.target, function(data) {
      if(data['success']){
        window.location.href = data['path'];
      }
    });
  });

  $('.edit-btn2').on('click', function(){
    console.log("hello");
    c=$(this).parent().parent().children();
    form= $('#new-item');
    form.find("input[name='Itemname']").val(c.eq(1).text());
    form.find("input[name='Quantity']").val(c.eq(2).text());
    form.find("input[name='Necessitesid']").val(c.eq(0).text());
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
      url : "needs/" 
      + pnid + "/"})
    .done(function() {
    })
})