$(document).ready(function(){
	var controller = new ScrollMagic.Controller();
	var cover = $('#cover');

	// TweenMax.from ('#cover .logo', 5, {y: '150%', opacity: 0, ease: Elastic.easeOut.config(1, 0.4) })
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
})

