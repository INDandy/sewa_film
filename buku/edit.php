<?php
include("../controllers/Buku.php");
include("../lib/functions.php");
$obj = new BukuController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    // Update the database record using your controller's method
$dat = $obj->updatebuku($id, $kode_buku, $judul, $pengarang);
$msg = getJSON($dat);
}
$rows = $obj->getBuku($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'buku/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>buku</strong> <small>Edit Data</small> </h2>
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
                        <label>kode_buku:</label>
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" 
                            value="<?php echo $row['kode_buku']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                            value="<?php echo $row['judul']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>pengarang:</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" 
                            value="<?php echo $row['pengarang']; ?>" />
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
