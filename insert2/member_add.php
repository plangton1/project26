<title> SQL INSERT 2 Tables by.devtai.com  </title>
<link href="css/bootstrap.min1.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<script src="js/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php  include("h.php");
include ('condb.php');
?>
<h1><center>SQL INSERT 2 Tables by.devtai.com</center></h1>
<br>
<center>
<form action="member_add_db.php" method="POST" enctype="multipart/form-data"  name="add" class="form-horizontal" id="add">
  <div class="form-group">
    <div class="col-sm-4" align="right"> Username </div>
    <div class="col-sm-3" align="left">
      <input type="text" name="username" id="Username" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4" align="right"> Password </div>
    <div class="col-sm-3" align="left">
      <input type="text" name="password" id="Username" class="form-control">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-4" align="right"> ชื่อ </div>
    <div class="col-sm-3" align="left">
      <input type="text" name="m_name" id="m_name" class="form-control">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-4" align="right"> นามสกุล </div>
    <div class="col-sm-3" align="left">
      <input type="text" name="m_lname" id="m_lname" class="form-control">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-4" align="right"> เพศ </div>
    <div class="col-sm-2" align="left">
      <select name="m_sex" id="m_sex" class="form-control">
        <option value="00">เลือกเพศ</option>
        <option value="ชาย">ชาย</option>
        <option value="หญิง">หญิง</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4" align="right"> เบอร์โทร </div>
    <div class="col-sm-3" align="left">
      <input type="number" name="m_tel" id="m_tel" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-3"> </div>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-danger  btn-lg btn-block" id="btn"> บันทึกข้อมูล </button>
    </div>
  </div>
</form>
</center>
<?php
$query = "SELECT *
FROM tbl_member as m
INNER JOIN tbl_login  as t ON m.m_id=t.m_id
ORDER BY m.m_id ASC
" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
//echo($query_monk);
?>
<div class="form-group">
  <div class="col-sm-3"> </div>
  <div class="col-sm-6">
    <?php
    echo ' <table id="example1" class="table table-bordered table-striped">';
      echo "<thead>";
        echo "<tr class='info'>
          <th width='5%'>ID</th>
          <th width='10%'>username</th>
          <th width='10%'>password</th>
          <th width='10%'>ชื่อ</th>
          <th width='10%'>นามสกุล</th>
          <th width='5%'>เพศ</th>
          <th width='10%'>เบอร์โทร</th>
        </tr>";
      echo "</thead>";
      while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
        echo "<td>" .$row["m_id"] .  "</td> ";
        echo "<td>" .$row["username"] .  "</td> ";
        echo "<td>" .$row["password"] .  "</td> ";
        echo "<td>" .$row["m_name"] .  "</td> ";
        echo "<td>" .$row["m_lname"] .  "</td> ";
        echo "<td>" .$row["m_sex"] .  "</td> ";
        echo "<td>" .$row["m_tel"] .  "</td> ";
      echo "</tr>";
      }
    echo "</table>";
    mysqli_close($con);
    ?>
  </div>
</div>
</div>

