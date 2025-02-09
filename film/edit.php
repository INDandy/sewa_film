<?php
include("../controllers/Film.php");
include("../lib/functions.php");
$obj = new FilmController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $kode_film = $_POST['kode_film'];
    $judul_film = $_POST['judul_film'];
    $sutradara = $_POST['sutradara'];
    $harga = $_POST['harga'];
    // Update the database record using your controller's method
$dat = $obj->updatefilm($id, $kode_film, $judul_film, $sutradara, $harga);
$msg = getJSON($dat);
}
$rows = $obj->getFilm($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'film/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>Edit Film</strong> <small>Edit Data</small> </h2>
        </div>
        <hr style="margin-bottom:-2px;"/>
        <form name="formEdit" method="POST" action="">
            <input type="hidden" class="form-control" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
            
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" id="id" name="id" 
                            value="<?php echo $row['id']; ?>" readonly/>
                    </div>
                
                    <div class="form-group">
                        <label>Kode Film:</label>
                        <input type="text" class="form-control" id="kode_film" name="kode_film" 
                            value="<?php echo $row['kode_film']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Judul Film:</label>
                        <input type="text" class="form-control" id="judul_film" name="judul_film" 
                            value="<?php echo $row['judul_film']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Sinopsis:</label>
                        <input type="text" class="form-control" id="sutradara" name="sutradara" 
                            value="<?php echo $row['sutradara']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>Harga:</label>
                        <input type="text" class="form-control" id="harga" name="harga" 
                            value="<?php echo $row['harga']; ?>" />
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
