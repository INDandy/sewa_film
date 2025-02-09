<?php
include("../controllers/Pinjam.php");
include("../controllers/Anggota.php");
include("../lib/functions.php");
$obj = new PinjamController();
$anggota = new AnggotaController();
$list = $anggota->getAnggotaList();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $nomor_bukti = $_POST['nomor_bukti'];
    $nomor_anggota = $_POST['nomor_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    
    // Insert the database record using your controller's method
$dat = $obj->addpinjam($nomor_bukti, $nomor_anggota, $tanggal_pinjam);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
$nomorbukti = generateRandomString();
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'pinjam/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>Pinjam Film</strong> <small>Pinjam Film Disini</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group col-md-3">
                    <label>Bukti Peminjaman:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nomor_bukti" value="<?php echo $nomorbukti; ?>" readonly="readonly"/>
                        
                    </div>
                </div>
            
                <div class="form-group mt-3">
                    <label>Kode Anggota:</label>
                    
                    <select class="form-control" name="nomor_anggota" id="nomor_anggota">
                        <option value="">Pilih Anggota...</option>
                        <?php foreach($list as $ang): ?>
                            <option value="<?php echo htmlspecialchars($ang['nomor_anggota']); ?>">
                                <?php echo htmlspecialchars($ang['nomor_anggota']) . ' - ' . htmlspecialchars($ang['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            
                <div class="form-group mt-3">
                    <label>Tanggal Pinjam:</label>
                    <input type="date" class="form-control" name="tanggal_pinjam"  />
                </div>
            
               
            
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="index.php" class="btn btn-large btn-default">Cancel</a>
        </form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
