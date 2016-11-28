$(document).ready(function(){

// $(".button-collapse").sideNav();
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

TweenMax.from ('#cover .logo', 5, {y: '150%', opacity: 0, ease: Elastic.easeOut.config(1, 0.4) })
TweenMax.from ('#cover .garmodText', 1, {x: '150%', opacity: 0, ease:Power3.easeInOut})
TweenMax.from ('#cover .moto', 1, {x: '-150%', opacity: 0, ease:Power3.easeInOut})

var a = new TimelineMax()
.add([
  TweenMax.to('#cover .scene', 1, {y: '-100%', ease:Power0.easeInOut}),
  TweenMax.to('#cover #garmod', 1, {opacity:0, ease:Power0.easeInOut}),
  TweenMax.to('#cover #ourTeam', 1, {color:'#fff', ease:Power0.easeInOut}),
  TweenMax.to('#cover', 1, {backgroundColor: '#212121', ease:Power0.easeInOut}),
  TweenMax.to('#cover .background', 1, {backgroundColor: '#F5F3F4', ease:Power0.easeInOut})
  ]);
var scene1 = new ScrollMagic.Scene({
  duration: '100%',
  triggerElement: cover,
  triggerHook: 0
})
.setTween(a)
.setPin("#cover")
// .addIndicators() 
.addTo(controller);

// var scene2 = new ScrollMagic.Scene({
//   duration: '30%',
//   triggerElement: '#cover2',
//   triggerHook: 0
// })
// .setPin("#cover2")
// // .addIndicators() 
// .addTo(controller)

})

