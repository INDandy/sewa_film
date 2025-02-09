<?php
include_once('../models/PinjamModel.php');

class PinjamController
{
    private $model;

    public function __construct()
    {
        $this->model = new PinjamModel();
    }

    public function addPinjam($nomor_bukti, $nomor_anggota, $tanggal_pinjam)
    {
        return $this->model->addPinjam($nomor_bukti, $nomor_anggota, $tanggal_pinjam);
    }

    public function getPinjam($id)
    {
        return $this->model->getPinjam($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getPinjam($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updatePinjam($id, $nomor_bukti, $nomor_anggota, $tanggal_pinjam, $tanggal_kembali)
    {
        return $this->model->updatePinjam($id, $nomor_bukti, $nomor_anggota, $tanggal_pinjam, $tanggal_kembali);
    }

    public function updateStatus($id, $status)
    {
        return $this->model->updateStatus($id, $status);
    }

    public function updateDikembalikan($id, $status)
    {
        return $this->model->updateDikembalikan($id, $status);
    }

    public function deletePinjam($id)
    {
        return $this->model->deletePinjam($id);
    }

    public function getPinjamList()
    {
        return $this->model->getPinjamList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
    public function getHargaFilm($pinjamId) {
        return $this->model->getHargaFilm($pinjamId);
    }
}
