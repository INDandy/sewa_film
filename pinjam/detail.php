<?php
include("../controllers/Pinjamdetail.php");
include("../controllers/Pinjam.php");
include("../lib/functions.php");
$pinjam = new PinjamController();
$obj = new PinjamdetailController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = true;
    
    $dat = $pinjam->updateStatus($id, $status);
    $msg = getJSON($dat);
}
if (isset($_POST["kembali"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = true;
    
    $dat = $pinjam->updateDikembalikan($id, $status);
    $msg = getJSON($dat);
}
$baris2 = $pinjam->getPinjam($id);
$rows = $obj->getpinjamdetailList($id);
$total= $obj->countPinjamdetail($id);
$theme = setTheme();
getHeader($theme);
?>
<?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'pinjam/detail.php?id='.$id.'">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>Pinjam Detail</strong> <small>List All Data</small> </h2>
</div>
<dl class="row mt-3">
        <?php foreach ($baris2 as $baris): ?>
        
        
            <dt class="col-sm-3" style="margin-left:50px">ID:</dt><dd class="col-sm-7" style="margin-left:-150px"><?php echo $baris['id']; ?></dd>           
            <dt class="col-sm-3" style="margin-left:50px">Bukti Peminjaman:</dt><dd class="col-sm-7" style="margin-left:-150px"><?php echo $baris['nomor_bukti']; ?></dd>
            <dt class="col-sm-3" style="margin-left:50px">Kode Anggota:</dt><dd class="col-sm-7" style="margin-left:-150px"><?php echo $baris['nomor_anggota']; ?> - <?php echo $baris['nama']; ?></dd>
            <dt class="col-sm-3" style="margin-left:50px">Tanggal Peminjaman:</dt><dd class="col-sm-7" style="margin-left:-150px"><?php echo $baris['tanggal_pinjam']; ?></dd>
            <dt class="col-sm-3" style="margin-left:50px">Tanggal Pengembalian:</dt><dd class="col-sm-7" style="margin-left:-150px"><?php echo $baris['tanggal_kembali']; ?></dd>
            <dt class="col-sm-3" style="margin-left:50px">Total Peminjaman:</dt><dd class="col-sm-7" style="margin-left:-150px"><?php echo $total; ?></dd>

</dl>
<?php endforeach; ?>
<hr style="margin-bottom:-2px;"/>
<?php
if($baris['dipinjam']==0){
    echo '<a style="margin:10px 0px;" class="btn btn-large btn-info" href="detailadd.php?id='.$id.'"><i class="fa fa-plus"></i> Tambah Data</a>';
}
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="30">No</th>
            <th width="80">Kode Film</th>
            <th>Judul</th>
            <th width="100">Harga</th> <!-- Tambahkan kolom harga -->
            <?php if($baris['dipinjam'] == 0) { ?>
            <th width="140">Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = 1;
        foreach($rows as $row) { 
            $harga = $obj->getHargaFilm($row["kode_buku"]); // Ambil harga dari kode film
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["kode_buku"]; ?></td>
            <td><?php echo $row["judul_film"]; ?></td>
            <td><?php echo number_format($harga, 2, ',', '.'); ?></td> <!-- Tampilkan harga -->
            <?php if($baris['dipinjam'] == 0) { ?>
            <td class="text-center" width="200">
                <a class="btn btn-danger btn-sm" href="detaildelete.php?id=<?php echo $id; ?>&iddetail=<?php echo $row['id']; ?>">
                <i class="fa fa-trash"></i></a>
            </td>
            <?php } ?>
        </tr>
        <?php 
        $i++; 
        } ?>
    </tbody>
</table>
<form name="formStatus" method="POST" action="">
    <input type="hidden" class="form-control" name="submitted" value="1"/>
    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>"/>
    <div class="d-flex justify-content-end">
    <?php
        if($baris['dipinjam']==0){
            echo '<button class="save btn btn-large btn-success" type="submit"><i class="fa fa-handshake-o"></i> Submit</button>';
        }
    ?>
        
    </div>     
</form>
<form name="formDikembalikan" method="POST" action="">
    <input type="hidden" class="form-control" name="kembali" value="1"/>
    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>"/>
    
    <?php
        if($baris['dipinjam']==1 && $baris['dikembalikan']==0){
            echo '<button class="save btn btn-large btn-warning" type="submit"><i class="fa fa-calendar"></i> Set Dikembalikan</button>';
        }
    ?>
        
     
</form>
<?php
getFooter($theme, "");
?>
