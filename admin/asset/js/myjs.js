$(document).ready(function(){
	$('select').material_select();
	$(".button-collapse").sideNav();

	setInterval(function(){
		$("#date_time_display").load('time.php');

		$.ajax({
			url: 'expired-pg/expired_data.php',
			success : function(data){
				$('#expired_data').html(data);
			}
		})
		$.ajax({
			url: 'expired-pg/expired_count.php',
			success : function(data){
				$('#expired_count').html(data);
			}
		})
		$.ajax({
			url: 'confirmation-pg/confirmation_data.php',
			success : function(data){
				$('#confirm_data').html(data);
			}
		})
		$.ajax({
			url: 'confirmation-pg/confirmation_count.php',
			success : function(data){
				$('#confirm_count').html(data);
			}
		})
	}, 1000)


	setTimeout(function(){
		$.ajax({
			url: '../clear_msg.php',
			success : function(data){
				$('#msg').removeClass('actv');
			}
		})
	}, 2000);
})