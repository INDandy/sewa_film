<?php
include("../controllers/Matakuliah.php");
include("../lib/functions.php");
$obj = new MatakuliahController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $kodemk = $_POST['kodemk'];
    $namamk = $_POST['namamk'];
    $sks = $_POST['sks'];
    $prodi = $_POST['prodi'];
    // Update the database record using your controller's method
$dat = $obj->updatematakuliah($id, $kodemk, $namamk, $sks, $prodi);
$msg = getJSON($dat);
}
$rows = $obj->getMatakuliah($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'matakuliah/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>matakuliah</strong> <small>Edit Data</small> </h2>
        </div>
        <hr style="margin-bottom:-2px;"/>
        <form name="formEdit" method="POST" action="">
            <input type="hidden" class="form-control" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
            
                    <div class="form-group">
                        <label>id:</label>
                        <input type="text" class="form-control" id="id" name="id" 
                            value="<?php echo $row['id']; ?>" readonly/>
                    </div>
                
                    <div class="form-group">
                        <label>kodemk:</label>
                        <input type="text" class="form-control" id="kodemk" name="kodemk" 
                            value="<?php echo $row['kodemk']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>namamk:</label>
                        <input type="text" class="form-control" id="namamk" name="namamk" 
                            value="<?php echo $row['namamk']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>sks:</label>
                        <input type="text" class="form-control" id="sks" name="sks" 
                            value="<?php echo $row['sks']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>prodi:</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" 
                            value="<?php echo $row['prodi']; ?>" />
                    </div>
                
            
            <?php endforeach; ?>
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="#index" class="btn btn-large btn-default">Cancel</a>
        </form>
                                        
<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
