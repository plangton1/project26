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
                                            
                                        <h3 class="font-mirt"><label><a href="?page=report_status1">รายงานรายสถานะของเอกสาร</a></label><br><br>
                                            <label> <a href="?page=report_list1">รายงานรายชื่อศูนย์</a></label><br><br>
                                            <label> <a href="./report_date3.php">รายงานตามช่วงเวลา</a></label><br><br>
                                            <label> <a href="?page=report_number1">รายงานตามเลข มอก.</a></label><br><br>
                                            <label> <a href="?page=report_agency1">รายงานตามหน่วยงานคู่แข่ง</a></label><br><br>
                                       
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