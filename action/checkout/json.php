<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>kfjalksdjf</title>
	<link rel="stylesheet" href="">
</head>

<body>
	<div id="data">
		kota: <input type="text" id="inputkota">
	</div>
	<script src="../../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../../asset/js/jquery.autocomplete.js"></script>
	<script>
		$("input#inputkota").each(function () {
			var $this = $(this);
			$this.devbridgeAutocomplete({
				lookup: dataCities,
				onSelect: function (suggestion) {
					$("input[name=kota" + $this.attr("name") + "]").val(suggestion.data);
				}
			});
		});

		var dataCities = $.ajax({
			url: 'city.php',
			type: 'get',
			chace: true,
			success: function(data){
				data;
			}
		})

	</script>
</body>
</html>