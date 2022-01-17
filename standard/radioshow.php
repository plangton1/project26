<script>
    function fnc_free($data) {
      
        if ($data == "1") {
            document.getElementById("a1").readOnly = false;
            document.getElementById("a2").readOnly = false;
            document.getElementById("a3").readOnly = true;
            document.getElementById("a4").readOnly = true;
            // document.getElementById("a5").readOnly = true;
            document.getElementById("a6").readOnly = true;
        } else if ($data == "2") {  
            document.getElementById("a1").readOnly = true;
            document.getElementById("a2").readOnly = true;
            document.getElementById("a3").readOnly = false;
            document.getElementById("a4").readOnly = false;
            // document.getElementById("a5").readOnly = true;
            document.getElementById("a6").readOnly = true;
        } else if ($data == "3") {
            document.getElementById("a1").readOnly = true;
            document.getElementById("a2").readOnly = true;
            document.getElementById("a3").readOnly = true;
            document.getElementById("a4").readOnly = true;
            // document.getElementById("a5").readOnly = false;
            document.getElementById("a6").readOnly = false;
        }
    }
</script>