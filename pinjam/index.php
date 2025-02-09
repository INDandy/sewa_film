<?php
include("../controllers/Pinjam.php");
include("../controllers/Pinjamdetail.php");
include("../lib/functions.php");
$obj = new PinjamController();
$detail = new PinjamdetailController();
$rows = $obj->getpinjamList();
$theme = setTheme();
getHeader($theme);
?>

<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>List Peminjaman</strong> <small>List All Data</small> </h2>
</div>
<hr style="margin-bottom:-2px;"/>
<a style="margin:10px 0px;" class="btn btn-large btn-info" href="add.php"><i class="fa fa-plus"></i> Create New Data</a>
<a style="margin:10px 0px;" class="btn btn-large btn-danger" href="cetak.php"><i class="fa fa-print"></i> Print Data</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="30" class="text-center">No.</th>
            <th width="100" class="text-center">Nomor Bukti Peminjaman</th>
            <th width="100" class="text-center">ID Anggota</th>
            <th width="100" class="text-center">Nama</th>
            <th width="100" class="text-center">Tanggal Pinjam</th>
            <th width="150" class="text-center">Total Peminjaman Film</th>
            <th width="100" class="text-center">Tanggal Pengembalian Film</th>
            <th width="140" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($rows as $row){ 
                $total= $detail->countPinjamdetail($row['id']);
            ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["nomor_bukti"]; ?></td>
            <td><?php echo $row["nomor_anggota"]; ?></td>
            <td><?php echo $row["nama"]; ?></td>
            <td><?php echo $row["tanggal_pinjam"]; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $row["tanggal_kembali"]; ?></td>
            <td class="text-center" width="200">
                <?php if($total==0){ ?>
                <a class="btn btn-warning btn-sm" href="edit.php?id=<?php echo $row['id']; ?>">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-success btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                    <i class="fa fa-briefcase"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>">
                    <i class="fa fa-trash"></i>
                </a>
                <?php }else{ 
                    if($row["tanggal_kembali"]=="Belum Dikembalikan"){
                        if($row["dipinjam"]==1){
                    ?>

                        <a class="btn btn-warning btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                            <i class="fa fa-paper-plane"></i>
                        </a>
                        <?php }else{ ?>
                            <a class="btn btn-success btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                            <i class="fa fa-briefcase"></i>
                        </a>

                        <?php } ?>
                   
                    
                    <?php }else{ ?>
                        <a class="btn btn-info btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                <?php 
                    } 
                }
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
getFooter($theme, "");
?>
