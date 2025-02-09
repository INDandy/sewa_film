<?php
include("../controllers/Anggota.php");
include("../lib/functions.php");
$obj = new AnggotaController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $nomor_anggota = $_POST['nomor_anggota'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    // Update the database record using your controller's method
$dat = $obj->updateanggota($id, $nomor_anggota, $nama, $jk, $prodi);
$msg = getJSON($dat);
}
$rows = $obj->getAnggota($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'anggota/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>Edit Anggota</strong> <small>Edit Data Anggota</small> </h2>
        </div>
        <hr style="margin-bottom:-2px;"/>
        <form name="formEdit" method="POST" action="">
            <input type="hidden" class="form-control" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
            
                    <div class="form-group">
                        <label>ID Anggota Ke:</label>
                        <input type="text" class="form-control" id="id" name="id" 
                            value="<?php echo $row['id']; ?>" readonly/>
                    </div>
                
                    <div class="form-group">
                        <label>ID Anggota:</label>
                        <input type="text" class="form-control" id="nomor_anggota" name="nomor_anggota" 
                            value="<?php echo $row['nomor_anggota']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" 
                            value="<?php echo $row['nama']; ?>" />
                    </div>
                
                <div class="form-group">
                    <label>Jk:</label>
                    <select id="jk" name="jk" style="width:150px" 
                        class="form-control show-tick" required>
                    <option value="<?php echo $row['jk']; ?>">
                    <?php echo $row['jk']; ?></option>
                        <option value="L">L</option><option value="P">P</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label>Prodi:</label>
                    <select id="prodi" name="prodi" style="width:150px" 
                        class="form-control show-tick" required>
                    <option value="<?php echo $row['prodi']; ?>">
                    <?php echo $row['prodi']; ?></option>
                        <option value="TIF">TIF</option><option value="IND">IND</option><option value="PET">PET</option>
                    </select>
                </div>
            
            
            <?php endforeach; ?>
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="index.php" class="btn btn-large btn-default">Cancel</a>
        </form>
                                        
<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
