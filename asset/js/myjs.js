$(document).ready(function(){

  $('.carousel').carousel();
  setInterval(function(){
    $('.carousel').carousel('next');
  }, 10000);

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
  $('#back').click(function(event) {
    /* Act on the event */
    event.preventDefault();
    window.history.back();
  });

  $("button[id='id_order']").click(function(){
    $('.modal').openModal();
    var id = $(this).attr('data');
    $.ajax({
      url : 'status_order/detail_data.php',
      type: 'get',
      data: 'id='+id,
      success: function(data){
        $(".modal-content").html(data);
      }
    })
  })

  $('.slider').slider({full_width: true});

  $("#search").keyup(function() {
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
  })

})

