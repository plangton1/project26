<section class="about section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="font-mirt">รายงาน</h2>
                    <h3 class="font-mirt">เลือกรายงานที่ต้องการ</h3>
                </div>
            </div>

            <div class="  tab-content font">
                <div id="home" class="container-fluid tab-pane active m-2">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="pd-t">
                                            <label> เลือกรูปแบบรายงาน</label>
                                            <select name="page" onChange="goTo(this.options[this.selectedIndex].value)" class="form-control" style="width:50%;">
                                                <option value="" selected disabled>-กรุณาเลือก-</option>
                                                <option value="?page=report_status1">รายงานรายสถานะของเอกสาร
                                                <option value="?page=report_list1">รายงานรายชื่อศูนย์
                                                <option value="./standard/report_date3.php">รายงานตามช่วงเวลา
                                                <option value="?page=report_number1">รายงานตามเลข มอก.
                                                <option value="?page=report_agency1">รายงานตามหน่วยงานคู่แข่ง
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                  
                    </div>

                </div>

</section>
<script>
    function goTo(page) {
        if (page != "") {
            if (page == "--") {
                resetMenu();
            } else {
                document.location.href = page;
            }
        }
        return false;
    }
</script>