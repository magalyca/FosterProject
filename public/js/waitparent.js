 ///Ajax call to delete
$('.delete_data').on('click', function() {
    // grab id element
  var pnid = $(this).attr("id")
  console.log(pnid);
    // make ajax call to delete
    $.ajax({
      type:'DELETE',
      url : "waitParent/" 
      + pnid + "/"})
    .done(function() {
    })
})