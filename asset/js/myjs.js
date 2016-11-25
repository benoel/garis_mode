$(document).ready(function(){

// $(".button-collapse").sideNav();
$('.carousel.carousel-slider').carousel({full_width: true});

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

var controller = new ScrollMagic.Controller();
var cover = $('#cover');

var b = new TimelineMax()
b
.from ('.garmodText', 1, {x: '150%', opacity: 0, ease:Power3.easeInOut})
.from ('.moto', 1, {x: '-150%', opacity: 0, ease:Power3.easeInOut})
.from ('.btnHome', 1, {y:'-900%', opacity: 0, ease:Bounce.easeOut});

var a = new TimelineMax()
.add([
  TweenMax.to('.scene1', 1, {y: '-100%', opacity: 0, ease:Power0.easeInOut}),
  TweenMax.to('.scene', 1, {y: -500, color:'#fff', ease:Power0.easeInOut}),
  TweenMax.to('#cover', 1, {backgroundColor: '#212121', ease:Power0.easeInOut}),
  TweenMax.to('.background', 1, {backgroundColor: '#F5F3F4', ease:Power0.easeInOut})
  ]);
var scene1 = new ScrollMagic.Scene({
  duration: '100%',
  triggerElement: cover,
  triggerHook: 0
})
.setTween(a)
.setPin("#cover")
// .addIndicators() 
.addTo(controller)

})

