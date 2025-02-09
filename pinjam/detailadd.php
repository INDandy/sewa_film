<?php
include("../controllers/Pinjamdetail.php");
include("../controllers/Film.php");
include("../lib/functions.php");
$obj = new PinjamdetailController();
$myfilm = new FilmController();
$films = $myfilm->getFilmList();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $pinjam_id = $id;
    $kode_film = $_POST['kode_film'];
    // Insert the database record using your controller's method
$dat = $obj->addpinjamdetail($pinjam_id, $kode_film);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'pinjam/detail.php?id='.$id.'">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>Detil Peminjaman</strong> <small>Add New Data</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group">
                <label for="film">Pilih Film:</label>
                <select class="form-control mb-3" name="kode_film" id="kode_film">
                    <option value="">Pilih Film...</option>
                    <?php foreach($films as $film): ?>
                        <option value="<?php echo htmlspecialchars($film['kode_film']); ?>">
                            <?php echo htmlspecialchars($film['kode_film']) . ' - ' . htmlspecialchars($film['judul_film']). ' - Harga Film: ' . htmlspecialchars($film['harga']); ?>
                        </option>
                    <?php endforeach; ?>
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
