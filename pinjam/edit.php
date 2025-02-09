<?php
include("../controllers/Pinjam.php");
include("../lib/functions.php");
$obj = new PinjamController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $nomor_bukti = $_POST['nomor_bukti'];
    $nomor_anggota = $_POST['nomor_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    // Update the database record using your controller's method
$dat = $obj->updatepinjam($id, $nomor_bukti, $nomor_anggota, $tanggal_pinjam, $tanggal_kembali);
$msg = getJSON($dat);
}
$rows = $obj->getPinjam($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'pinjam/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>Edit Data Peminjaman</strong> <small>Edit Data</small> </h2>
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
                        <label>Bukti Peminjaman:</label>
                        <input type="text" class="form-control" id="nomor_bukti" name="nomor_bukti" 
                            value="<?php echo $row['nomor_bukti']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Kode Anggota:</label>
                        <input type="text" class="form-control" id="nomor_anggota" name="nomor_anggota" 
                            value="<?php echo $row['nomor_anggota']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Tanggal Peminjaman:</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" 
                            value="<?php echo $row['tanggal_pinjam']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Tanggal Pengembalian:</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" 
                            value="<?php echo $row['tanggal_kembali']; ?>" />
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
