<?php
include_once('../models/BukuModel.php');

class BukuController
{
    private $model;

    public function __construct()
    {
        $this->model = new BukuModel();
    }

    public function addBuku($kode_buku, $judul, $pengarang)
    {
        return $this->model->addBuku($kode_buku, $judul, $pengarang);
    }

    public function getBuku($id)
    {
        return $this->model->getBuku($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getBuku($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateBuku($id, $kode_buku, $judul, $pengarang)
    {
        return $this->model->updateBuku($id, $kode_buku, $judul, $pengarang);
    }

    public function deleteBuku($id)
    {
        return $this->model->deleteBuku($id);
    }

    public function getBukuList()
    {
        return $this->model->getBukuList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
