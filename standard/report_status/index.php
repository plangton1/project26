
<?php

require './connection/connection.php' ;

$query = "SELECT * from main_std ";
$result = sqlsrv_query($conn, $query);
?>
<?php
//index.php


?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ajax Live Data Search using Multi Select Dropdown in PHP</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		
		<link href="css/bootstrap-select.min.css" rel="stylesheet" />
		<script src="js/bootstrap-select.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br />
			<h2 align="center">รายงานรายสถานะ</h2><br />
			
			<select name="multi_search_filter" id="multi_search_filter" multiple class="form-control selectpicker">
			<?php
			 while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
			{ ?>
		    <option value="<?php echo $row["standard_detail"]; ?>"><?php echo $row["standard_detail"]; ?></option>
			<?php }
			?>
			</select>
			<input type="hidden" name="hidden_country" id="hidden_country" />
			<div style="clear:both"></div>
			<br />
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Address</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<br />
			<br />
			<br />
		</div>
	</body>
</html>


<script>
$(document).ready(function(){

	load_data();
	
	function load_data(query='')
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#multi_search_filter').change(function(){
		$('#hidden_country').val($('#multi_search_filter').val());
		var query = $('#hidden_country').val();
		load_data(query);
	});
	
});
</script>




