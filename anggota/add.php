<?php
include("../controllers/Anggota.php");
include("../lib/functions.php");
$obj = new AnggotaController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $nomor_anggota = $_POST['nomor_anggota'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    // Insert the database record using your controller's method
$dat = $obj->addanggota($nomor_anggota, $nama, $jk, $prodi);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'anggota/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>Halaman Anggota</strong> <small>Isi Field Data Anggota</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group">
                    <label>Tambahkan ID Anggota:</label>
                    <input type="text" class="form-control" name="nomor_anggota"  />
                </div>
            
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" name="nama"  />
                </div>
            
                <div class="form-group">
                    <label>jk:</label>
                    <select id="jk" name="jk" style="width:150px" class="form-control">
                        <option value="">--pilih--</option>
                        <option value="L">L</option><option value="P">P</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label>prodi:</label>
                    <select id="prodi" name="prodi" style="width:150px" class="form-control">
                        <option value="">--pilih--</option>
                        <option value="TIF">TIF</option><option value="IND">IND</option><option value="PET">PET</option>
                    </select>
                </div>
            
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="index.php" class="btn btn-large btn-default">Cancel</a>
        </form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
