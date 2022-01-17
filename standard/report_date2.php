<div class="container" style="width:900px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>รายงานตามช่วงเวลา</h4>
                </div>
                <div class="card-body">

                    <form action="" method="GET" >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>จากวันที่</label>
                                    <input type="date" name="from_date" value="<?php if (isset($_GET['from_date'])) {echo $_GET['from_date'];} ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ถึงวันที่</label>
                                    <input type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {echo $_GET['to_date'];} ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <!-- <input type="submit" value="ค้นหาเอกสาร" class="btn btn-info" /> -->
                                <a href="?page=<?= $_GET['page']?>&function=report_date2&form_date=<?= $_GET['from_date'] ; ?>&to_date=<?  $_GET['to_date']  ; ?>">ค้นหา</a>
                                </div>
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
                            if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query = "SELECT * FROM main_std WHERE standard_create BETWEEN '$from_date' AND '$to_date' ";
                                $query_run = sqlsrv_query($conn, $query);

                                if ($query_run > 0) {
                                    while ($row = sqlsrv_fetch_array($query_run, SQLSRV_FETCH_ASSOC)) {
                            ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php DateThai($row['standard_create']); ?></td>
                                            <td><?php echo $row["standard_number"]; ?></td>
                                            <td><?php echo $row["standard_detail"]; ?></td>
                                            <td><?php echo $row["standard_note"]; ?></td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>