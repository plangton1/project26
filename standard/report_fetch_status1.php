
<?php
require('../connection/connection.php');
if(($_POST['query']) != '')
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT DISTINCT b.statuss_name as name_status1 , j.source_name as standard_source1 ,
    standard_detail as standard_detail1 ,  ff.type_name as name_type1 , ee.group_name as name_group1 , dd.department_name as name_depart1 , a.standard_day as standard_day1 ,
    a.standard_idtb,COUNT(*) as num_id,
 STRING_AGG(cc.agency_name, '<br/>' ) AS name_agency,
 STRING_AGG(dd.department_name, '<br/>' ) AS name_depart,
 STRING_AGG(ee.group_name, '<br/>' ) AS name_group,
 STRING_AGG(ff.type_name, '<br/>' ) AS name_type,
 STRING_AGG(k.fileupload, '<br/>' ) AS name_file,
 STRING_AGG(b.statuss_name, '<br/>' ) AS name_status,
 STRING_AGG(a.standard_day, '<br/>' ) AS standard_day,
 STRING_AGG(a.standard_detail, '<br/>' ) AS standard_detail,
 STRING_AGG(j.source_name, '<br/>' ) AS standard_source

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

    left JOIN source_tb j ON a.standard_source = j.source_id 
 
    WHERE a.standard_status  IN ($search_text) GROUP BY a.standard_idtb , b.statuss_name ,
     j.source_name , a.standard_detail  , ff.type_name , ee.group_name  , dd.department_name  , a.standard_day";
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
  <td>'.$i++.'</td>
  <td>'.$row["standard_source1"].'</td>
  <td>'.$row["name_status1"].'</td>
  <td>'.$row["standard_day1"].'</td>';
  if ($_POST['standard_detail1'] == 'true') {
  $output .= '<td>'.$row["standard_detail1"].'</td>';
  }
  if ($_POST['name_type1'] == 'true') {
     $output .= '<td>'.$row["name_type1"].'</td>';
  }
  if ($_POST['name_group1'] == 'true') {
    $output .= '<td>'.$row["name_group1"].'</td>';
  }
  if ($_POST['name_depart1'] == 'true') {
      $output .= '<td>'.$row["name_depart1"].'</td>';
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
<?php
	date_default_timezone_set("Asia/Bangkok");
	function dd($strDate)
	{
		$strYear = date("Y", strtotime($strDate))+543;
		$strMonth = date("n", strtotime($strDate));
		$strDay = date("j", strtotime($strDate));
		$strHour = date("H", strtotime($strDate));
		$strMinute = date("i", strtotime($strDate));
		$strSeconds = date("s", strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai = $strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
		// $strHour:$strMinute
	}
?>
