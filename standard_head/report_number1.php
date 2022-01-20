<?php
$query = "SELECT * from main_std ";
$statement = sqlsrv_query($conn, $query);
?>
<body onload="hiddenn('0')">
<div class="container">
    <form action="" method="post">
        <div class="col-md-4">
        <label><input type="checkbox" id="check_1" value="1"> ชื่อมาตรฐาน</label><br>
        <label><input type="checkbox" id="check_2" value="2"> ประเภทผลิตภัณฑ์</label><br>
        <label><input type="checkbox" id="check_3" value="3"> กลุ่มผลิตภัณฑ์</label>
        </div>
        <div class="col-md-4">
        <label><input type="checkbox" id="check_4" value="4"> ศูนย์ที่เกี่ยวข้อง</label><br>
        <label><input type="checkbox" id="check_5" value="5"> แสดงวันที่/สถานะของเอกสาร</label><br>
        <label><input type="checkbox" id="check_6" value="6"> ไฟล์แนบ</label><br>
        </div>

        <div class="col-md-4">
            <select name="search_status" id="search_status" multiple class="form-control selectpicker">
                <?php while ($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)) : ?>
                    <option value="<?php echo $row["standard_idtb"]; ?>"><?php echo $row["standard_number"]; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        
        <button onclick="window.print()" class="btn btn-primary">พิมพ์รายงาน</button>
        <a class="btn btn-dark"  onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
        <input type="hidden" name="status" id="status" />
        <div style="clear:both"></div>
        <br />
        <h1 align="center">รายงานตามเลข มอก.</h1>
        <div class="table table-bordered">
            <table class="table" style="background-color: white;" id="tableall">
                <thead>
                    <tr>
                        <th >ลำดับที่</th>        
                        <th class="">หมายเลข มอก.</th> 
                        <th class="1 selectt">ชื่อมาตรฐาน</th> 
                        <th class="2 selectt">ประเภทผลิตภัณฑ์</th>
                        <th class="3 selectt">กลุ่มผลิตภัณฑ์</th>
                        <th class="4 selectt">ชื่อหน่วยงานศูนย์</th>
                        <th class="5 selectt">สถานะ</th>
                        <th class="5 selectt" >วันที่แต่งตั้งสถานะ</th>
                        <th class="6 selectt">ไฟล์แนบ</th>
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
        // load_data();
        function load_data(query = '') {
            // console.log('test', $('#check_1').is(':checked'))
            // console.log('test', $('#check_2').is(':checked'))
            $.ajax({
                url: "./report_fetch_number1.php",
                method: "POST",
                data: {
                    query: query,
                    standard_detail: $('#check_1').is(':checked'), 
                    name_type: $('#check_2').is(':checked'),
                    name_group: $('#check_3').is(':checked'),
                    name_depart: $('#check_4').is(':checked'),
                    name_status: $('#check_5').is(':checked'),
                    standard_day:  $('#check_5').is(':checked'),
                    name_file: $('#check_6').is(':checked')
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            })
        }
        $('#search_status').change(function() {
            // console.log($('#search_form').serializeArray());
            $('#status').val($('#search_status').val());
            var query = $('#search_status').val();
            load_data(query);
            // load_data(['1']);
            // console.log(query);
        });
    });
</script>
<style type="text/css">
		.selectt {		
			display: none;
		}
		label {
			margin-right: 20px;
		}
	</style>
 
		<script type="text/javascript">
			$(document).ready(function() {
				$('input[type="checkbox"]').click(function() {
					var inputValue = $(this).attr("value");
					$("." + inputValue).toggle();
                    // console.log(inputValue);
				});
			});
		</script>

