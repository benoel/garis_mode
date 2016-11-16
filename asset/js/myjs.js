$(document).ready(function(){

  setTimeout(function(){
    $.ajax({
      url: '../clear_msg.php',
      success : function(data){
        $('#msg').removeClass('actv');
      }
    })
  }, 2000);


  $(".button-collapse").sideNav();
  $('select').material_select();

  $("button[id='id_order']").click(function(){
    var id = $(this).attr('data');
    $.ajax({
     url : 'status_order/detail_data.php',
     type: 'get',
     data: 'id='+id,
     success: function(data){
      $("#detail_order").html(data);
    }
  })
  })

  $('.slider').slider({full_width: true});

  $("#search").keyup(function() {
    /* Act on the event */
    var key = $(this).val();
    $.ajax({
      url : 'search',
      data : 'key='+key ,
      type: 'GET',
      beforeSend : function(data){
        $('#page').html("<img src='asset/img/rolling.gif' />");
      },
      success : function(data){
        $('#page').html(data);
      }
    })


  });

})