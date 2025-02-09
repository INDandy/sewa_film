<?php
include("../controllers/Pinjamdetail.php");

include("../lib/functions.php");
$obj = new PinjamdetailController();

if(isset($_GET["id"])){
    $id=$_GET["id"];
}
if(isset($_GET["iddetail"])){
    $iddetail=$_GET["iddetail"];
}
$msg=null;
if (isset($_POST['submitted'])==1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form was submitted, process the update here
    $iddetail = $_POST['iddetail'];
    $id = $_POST['id'];
    // delete the database record using your controller's method
    $dat = $obj->deletePinjamdetail($iddetail);
    $msg = getJSON($dat);
    
}
$rows = $obj->getPinjamdetail($iddetail);

$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Delete Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="3;url='.base_url().'pinjam/detail.php?id='.$id.'">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Delete Gagal</div>'; 
    } else {

    }
    
    ?>
    <div class="header icon-and-heading">
    <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
    <h2><strong>Delete Peminjaman</strong> <small>Delete Data</small> </h2>
    </div>
    <hr/>
    <form name="formDelete" method="POST" action="">
        <input type="hidden" class="form-control" name="submitted" value="1"/>
        <dl class="row mt-1">
        <?php 
            foreach ($rows as $row): 
               
            ?>
        
        
                            <dt class="col-sm-3">No:</dt><dd class="col-sm-9"><?php echo $row['id']; ?></dd>
                            <input type="hidden" class="form-control" name="iddetail" value="<?php echo $row['id']; ?>" readonly />
                            <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" readonly />
            
                            <dt class="col-sm-3">ID Peminjaman:</dt><dd class="col-sm-9"><?php echo $row['pinjam_id']; ?></dd>
            
                            <dt class="col-sm-3">Kode Film:</dt><dd class="col-sm-9"><?php echo $row['kode_buku']; ?></dd>

                            <dt class="col-sm-3">Judul:</dt><dd class="col-sm-9"><?php echo $row['judul']; ?></dd>
            
            
        </dl>
        <button class="btn btn-large btn-danger" type="submit">Delete</button>
        <a href="index.php" class="btn btn-large btn-default">Cancel</a>
        <?php endforeach; ?>
    </form>
                                       
<?php
getFooter($theme,"");
?>
