
<?php
require('../connection/connection.php');
if(($_POST['query']) != '')
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT
 a.standard_idtb,
 COUNT(*) as num_id,
 STRING_AGG(cc.agency_name, '<br/>') AS name_agency,
 STRING_AGG(dd.department_name, '<br/>') AS name_depart,
 STRING_AGG(ee.group_name, '<br/>') AS name_group,
 STRING_AGG(ff.type_name, '<br/>') AS name_type,
 STRING_AGG(k.fileupload, '<br/>') AS name_file,
 STRING_AGG(b.statuss_name, '<br/>') AS name_status,
 STRING_AGG(a.standard_day, '<br/>') AS standard_day,
 STRING_AGG(a.standard_detail, '<br/>') AS standard_detail

 FROM main_std a

   left JOIN select_status b ON a.standard_status = b.id_statuss
 
    left JOIN dimension_agency c ON a.standard_idtb = c.standard_idtb 
    left JOIN agency_tb cc ON c.agency_id = cc.agency_id 
 
    left JOIN dimension_department d ON a.standard_idtb = d.standard_idtb
   left JOIN department_tb dd ON d.department_id = dd.department_id
 
     left JOIN dimension_group e ON a.standard_idtb = e.standard_idtb 
   left JOIN group_tb ee ON e.group_id = ee.group_id
    
     left JOIN dimension_type f ON a.standard_idtb = f.standard_idtb
   left JOIN type_tb ff ON f.type_id = ff.type_id
 
    left JOIN dimension_file k ON a.standard_idtb = k.standard_idtb
 
    WHERE dd.department_id IN ($search_text) GROUP BY a.standard_idtb   ";
}
else
{
 $query = "";
}

$statement = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($statement);
$output = '';
$i = 1;
while($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)){
  $output .= ' 
  <table class="table table-bordered">
  <tr>
  <td>'.$i++.'</td>';
  if ($_POST['standard_detail'] == 'true') {
  $output .= '<td>'.$row["standard_detail"].'</td>';
  }
  if ($_POST['name_type'] == 'true') {
     $output .= '<td>'.$row["name_type"].'</td>';
  }
  if ($_POST['name_group'] == 'true') {
    $output .= '<td>'.$row["name_group"].'</td>';
  }
  if ($_POST['name_depart'] == 'true') {
      $output .= '<td>'.$row["name_depart"].'</td>';
  }
  if ($_POST['name_status'] == 'true') {
    $output .= '<td>'.$row["name_status"].'</td>';
  }
    if ($_POST['standard_day'] == 'true') {
      $output .= ' <td>'.$row["standard_day"].'</td>';
    }
  if ($_POST['name_file'] == 'true') {
  $output .= '<td>'.$row["name_file"].'</td>';
  }
  '</tr>
  </table>
  ';
   }
echo $output;
// echo var_export($_POST['name_type'] == 'true', 1);
// echo var_export($_POST['name_type'] == true, 1);
exit();
?>
