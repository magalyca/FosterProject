///Ajax call to delete
$('.delete_data').on('click', function() {
    // grab recipe number id from parent element
  var pnid = $(this).attr("id")
  console.log(pnid);
    // make ajax call to save edit
    $.ajax({
      type:'DELETE',
      url : "needs/" 
      + pnid + "/"})
    .done(function() {
     // box.parent().text(box.val())
    })
})