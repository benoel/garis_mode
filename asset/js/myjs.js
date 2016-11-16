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

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

    // $('#modal1').modal('open');
    // $('#modal1').modal('close');


    

    $("#pagination-long").click(function() {
      /* Act on the event */
      
    });

    $('#back').click(function(e){
      e.preventDefault();
      window.history.back();
    })

  //   var ias = jQuery.ias({
  //     container:  '#posts',
  //     item:       '.post',
  //     pagination: '#pagination',
  //     next:       '.next a'
  // });
  //   ias.extension(new IASSpinnerExtension());
  //   ias.extension(new IASTriggerExtension({offset: 3}));
  //   ias.extension(new IASNoneLeftExtension({text: 'There are no more pages left to load.'}));

})