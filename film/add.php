<?php
include("../controllers/Film.php");
include("../lib/functions.php");
$obj = new FilmController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $kode_film = $_POST['kode_film'];
    $judul_film = $_POST['judul_film'];
    $sutradara = $_POST['sutradara'];
    $harga = $_POST['harga'];
    // Insert the database record using your controller's method
$dat = $obj->addfilm($kode_film, $judul_film, $sutradara, $harga);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'film/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>Tambah Film</strong> <small>Add New Movies</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group">
                    <label>Kode Film:</label>
                    <input type="text" class="form-control" name="kode_film"  />
                </div>
            
                <div class="form-group">
                    <label>Judul Film:</label>
                    <input type="text" class="form-control" name="judul_film"  />
                </div>
            
                <div class="form-group">
                    <label>Sinopsis:</label>
                    <input type="text" class="form-control" name="sutradara"  />
                </div>
            
                <div class="form-group">
                    <label>Harga:</label>
                    <input type="text" class="form-control" name="harga"  />
                </div>
            
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="index.php" class="btn btn-large btn-default">Cancel</a>
        </form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
