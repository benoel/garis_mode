<div class="container">
	<br>
	<h4>Choose date report</h4>
	<form class="col s12" method="post" action="report-pg/data-report.php">
		<div class="row">
			<div class="input-field col s6">
				<input type="date" name="from" placeholder="" id="report" class="datepicker">
				<label for="report">From</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input type="date" name="to" placeholder="" id="report" class="datepicker">
				<label for="report">To</label>
			</div>
		</div>
		<input type="submit" name="submit" class="btn waves-effect waves-light grey darken-4">
	</form>

</div>

<script>
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15,
    format : 'yyyy-mm-dd',
});
</script>