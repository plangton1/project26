<mate charset ="utf-8" />
<?php include ('condb.php');
//สร้างตัวแปร
// echo "<pre>";
	// print_r($_POST);
// echo "</pre>";
// exit();
$username = $_POST['username'];
$password = $_POST['password'];
$m_name = $_POST['m_name'];
$m_lname = $_POST['m_lname'];
$m_sex = $_POST['m_sex'];
$m_tel = $_POST['m_tel'];
//เพิ่มข้อมูล teble1
$sql1 = " INSERT INTO tbl_login
(username, password)
VALUES
('$username', '$password')";
$result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
//เพิ่มข้อมูล teble1
$sql2 = " INSERT INTO tbl_member
(m_name, m_lname, m_sex, m_tel)
VALUES
('$m_name', '$m_lname', '$m_sex', '$m_tel')";
$result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result1 && $result2){
echo "<script type='text/javascript'>";
echo"window.location = 'member_add.php';";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'member_add.php'; ";
echo"</script>";
}
?>