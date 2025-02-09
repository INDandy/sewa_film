<?php
include("../controllers/Matakuliah.php");
include("../lib/functions.php");
$obj = new MatakuliahController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $kodemk = $_POST['kodemk'];
    $namamk = $_POST['namamk'];
    $sks = $_POST['sks'];
    $prodi = $_POST['prodi'];
    // Insert the database record using your controller's method
$dat = $obj->addmatakuliah($kodemk, $namamk, $sks, $prodi);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'matakuliah/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>matakuliah</strong> <small>Add New Data</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group">
                    <label>Kodemk:</label>
                    <input type="text" class="form-control" name="kodemk"  />
                </div>
            
                <div class="form-group">
                    <label>Namamk:</label>
                    <input type="text" class="form-control" name="namamk"  />
                </div>
            
                <div class="form-group">
                    <label>Sks:</label>
                    <input type="text" class="form-control" name="sks"  />
                </div>
            
                <div class="form-group">
                    <label>Prodi:</label>
                    <input type="text" class="form-control" name="prodi"  />
                </div>
            
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="#index" class="btn btn-large btn-default">Cancel</a>
        </form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
