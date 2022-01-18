
<?php
require('../connection/connection.php');
if(($_POST['query']) != '')
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT * , a.department_id,b.department_id,b.department_name AS name_depart ,
 d.type_id,e.type_id,e.type_name AS name_type , c.standard_status,f.id_statuss,f.statuss_name AS name_status , 
 c.standard_idtb,g.standard_idtb,g.fileupload AS name_file
  FROM dimension_department a 
 INNER JOIN department_tb b ON a.department_id = b.department_id
 INNER JOIN main_std c ON a.standard_idtb = c.standard_idtb
 INNER JOIN dimension_type d ON a.standard_idtb = d.standard_idtb 
 INNER JOIN type_tb e ON d.type_id = e.type_id
 INNER JOIN select_status f ON c.standard_status  = f.id_statuss
 INNER JOIN dimension_file g ON c.standard_idtb = g.standard_idtb   WHERE standard_status IN ($search_text) ";
}
else
{
 $query = " ";
}

$statement = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($statement);
$output = '';
$i=1;
   while($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)){
  $output .= ' 
  <table class="table table-bordered">
  <tr>
  <td>'.$i++.'</td>
  <td>'.$row["name_status"].'</td>
  <td>'.$row["standard_day"].'</td>';
  if ($_POST['standard_detail'] == 0) {
      $output .= '<td>'.$row["standard_detail"].'</td>';
  }
  if ($_POST['name_type'] == true) {
     $output .= '<td>'.$row["name_type"].'</td>';
  }

if ($_POST['name_depart'] == true) {
  $output .= '<td>'.$row["name_depart"].'</td>';
}
if ($_POST['standard_number'] == 0) {
$output .= '<td>'.$row["standard_number"].'</td>';
}
if ($_POST['name_file'] == 0) {
$output .= '<td>'.$row["name_file"].'</td>';
}
  '</tr>
  </table>
  ';
   }
   
   
echo $output;
exit();
?>
