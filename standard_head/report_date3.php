<?php
function datetodb($date)
//    23/04/2564
{
    $day = substr($date, 0, 2); // substrตัดข้อความที่เป็นสติง
    $month = substr($date, 3, 2); //ตัดตำแหน่ง
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme; //return ส่งค่ากลับไป
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดตามเอกสาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body >

<div class="container">
            <div class="container" style="width:900px;">
               <h2 align="center">รายงานเอกสารตามช่วงเวลา</h2>
                <div class="card mt-5">
           
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>จากวันที่</label>
                                        <input type="text" id="mydate4" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ถึงวันที่</label>
                                        <input type="text" id="mydate5" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">ค้นหา</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
            <input type="checkbox" onclick="hiddenn('1')" id="" name="">
            <label for="">มาตรฐานเลขที่</label><br>
            <input onclick="hiddenn('2')" type="checkbox" id="" name="" >
            <label for=""> ประเภทผลิตภัณฑ์</label><br>
            <input type="checkbox" id="" name="" >
            <label for=""> กลุ่มผลิตภัณฑ์</label><br>

        </div>
        <div class="col-md-6">
            <input type="checkbox" id="" name="" >
            <label for="">ศูนย์ที่เกี่ยวข้อง</label><br>
            <input type="checkbox" id="" name="" >
            <label for=""> แสดงวันที่ของสถานะทั้งหมด</label><br>
            <input type="checkbox" id="" name="" >
            <label for=""> แสดงเอกสารแนบทั้งหมด</label><br><br>
        </div>
        <div class="col-md-4">
        <button onclick="window.print()" class="btn btn-primary">พิมพ์รายงาน</button>
        <a class="btn btn-dark"  onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
        </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="10%">วันที่เพิ่มเอกสาร</th>
                                <th width="10%">หมายเลขเอกสาร</th>
                                <th width="10%">ชื่อมาตรฐาน</th>
                                <th width="10%">หมายเหตุ</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                              $i = 1;
                              require '../connection/connection.php' ;
							  require '../standard/date.php';

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = datetodb($_GET['from_date']);
                                    $to_date = datetodb($_GET['to_date']);

                                    $query = "SELECT * FROM main_std WHERE standard_create BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = sqlsrv_query($conn, $query);

									if ( $query_run > 0 )    
                                    {
                                        while( $row = sqlsrv_fetch_array( $query_run, SQLSRV_FETCH_ASSOC))
                                        {
                                            ?>
                                            <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo datethai($row['standard_create']); ?></td>
                                            <td><?php echo $row["standard_number"]; ?></td>
                                            <td><?php echo $row["standard_detail"]; ?></td>
                                            <td><?php echo $row["standard_note"]; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }else
                                    {
                                        echo "ไม่มีข้อมูลที่ค้นหา";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
    <script>
    picker_date(document.getElementById("mydate4"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("mydate5"), {
        year_range: "-12:+10"
    });
    </script>
</body>

</html>
