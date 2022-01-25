<?php

//fetch.php

require './connection/connection.php' ;

if($_POST["query"] != '')
{
	$search_array = explode(",", $_POST["query"]);
	$search_text = "'" . implode("', '", $search_array) . "'";
	$query = "
	SELECT * FROM main_std 
	WHERE standard_detail IN (".$search_text.") 
	ORDER BY standard_idtb DESC
	";
}
else
{
	$query = "SELECT * FROM main_std ORDER BY standard_idtb DESC";
}

$result = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($result);

$output = '';


	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
	{
		$output .= '
		<tr>
			<td>'.$row["standard_detail"].'</td>
			<td>'.$row["standard_day"].'</td>
		</tr>
		';
	}

echo $output;


?>