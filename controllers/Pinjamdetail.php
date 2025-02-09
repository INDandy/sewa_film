<?php
include_once('../models/PinjamdetailModel.php');

class PinjamdetailController
{
    private $model;

    public function __construct()
    {
        $this->model = new PinjamdetailModel();
    }

    public function addPinjamdetail($pinjam_id, $kode_film)
    {
        return $this->model->addPinjamdetail($pinjam_id, $kode_film);
    }

    public function getPinjamdetail($id)
    {
        return $this->model->getPinjamdetail($id);
    }

    public function countPinjamdetail($id)
    {
        return $this->model->countPinjamdetail($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getPinjamdetail($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updatePinjamdetail($id, $pinjam_id, $kode_film)
    {
        return $this->model->updatePinjamdetail($id, $pinjam_id, $kode_film);
    }

    public function deletePinjamdetail($id)
    {
        return $this->model->deletePinjamdetail($id);
    }

    public function getPinjamdetailList($id)
    {
        return $this->model->getPinjamdetailList($id);
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }

    public function getTotalHarga($pinjamId) {
        return $this->model->getTotalHarga($pinjamId);
    }
    public function getHargaFilm($pinjamId) {
        return $this->model->getHargaFilm($pinjamId);
    }
}
