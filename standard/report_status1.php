<?php
$query = "SELECT * from select_status ";
$statement = sqlsrv_query($conn, $query);
?>
<body onload="hiddenn('0')">
<div class="container">
    <form action="" method="post">
        <div class="col-md-4">
            <select name="search_status" id="search_status" multiple class="form-control selectpicker">
                <?php while ($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)) : ?>
                    <option value="<?php echo $row["id_statuss"]; ?>"><?php echo $row["statuss_name"]; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-4">
            <input type="checkbox" onclick="hiddenn('1')" id="" name="">
            <label for="">มาตรฐานเลขที่</label><br>
            <input onclick="hiddenn('2')" type="checkbox" id="" name="" >
            <label for=""> ประเภทผลิตภัณฑ์</label><br>
            <input type="checkbox" id="" name="" >
            <label for=""> กลุ่มผลิตภัณฑ์</label><br>

        </div>
        <div class="col-md-4">
            <input type="checkbox" id="" name="" >
            <label for="">ศูนย์ที่เกี่ยวข้อง</label><br>
            <input type="checkbox" id="" name="" >
            <label for=""> แสดงวันที่ของสถานะทั้งหมด</label><br>
            <input type="checkbox" id="" name="" >
            <label for=""> แสดงเอกสารแนบทั้งหมด</label><br><br>
        </div>
        <button onclick="window.print()" class="btn btn-primary">พิมพ์รายงาน</button>
        <a class="btn btn-dark"  onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
        <input type="hidden" name="status" id="status" />
        <div style="clear:both"></div>
        <br />
        <h1 align="center">รายงานสถานะของเอกสาร</h1>
        <div class="table table-bordered">
            <table class="table" style="background-color: white;" id="tableall">
                <thead>
                    <tr>
                        <th class="col-1">ลำดับที่</th>
                        <th class="col-2">สถานะ</th>
                        <th class="col-2">วาระจากในที่ประชุมสมอ.</th>
                        <th class="col-1">เลขที่มอก.</th>
                        <th id="a1" class="col-1">ชื่อมาตรฐาน</th>
                        <th id="a2" class="col-1">ประเภทผลิตภัณฑ์</th>
                        <th class="col-2">วันที่แต่งตั้งสถานะ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        load_data();

        function load_data(query = '') {
            $.ajax({
                url: "./standard/report_fetch_status1.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            })
        }
        $('#search_status').change(function() {
            $('#status').val($('#search_status').val());
            var query = $('#search_status').val();
            load_data(query);
            // console.log(query);
        });
    });
</script>
<!-- <script>
    function hiddenn(show) {
        if (show == 0) {
            document.getElementById("a1").style.display = 'none';
            document.getElementById("a2").style.display = 'none';
        } else if (show == 1) {
            document.getElementById("a1").style.display = '';
            document.getElementById("a2").style.display = 'none';
        } else if (show == 2) {
            document.getElementById("a1").style.display = '';
            document.getElementById("a2").style.display = '';
        } else if (show == 3) {
            document.getElementById("a1").style.display = 'none';
            document.getElementById("a2").style.display = 'none';
        }
    }
</script> -->