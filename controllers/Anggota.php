<?php
include_once('../models/AnggotaModel.php');

class AnggotaController
{
    private $model;

    public function __construct()
    {
        $this->model = new AnggotaModel();
    }

    public function addAnggota($nomor_anggota, $nama, $jk, $prodi)
    {
        return $this->model->addAnggota($nomor_anggota, $nama, $jk, $prodi);
    }

    public function getAnggota($id)
    {
        return $this->model->getAnggota($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getAnggota($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateAnggota($id, $nomor_anggota, $nama, $jk, $prodi)
    {
        return $this->model->updateAnggota($id, $nomor_anggota, $nama, $jk, $prodi);
    }

    public function deleteAnggota($id)
    {
        return $this->model->deleteAnggota($id);
    }

    public function getAnggotaList()
    {
        return $this->model->getAnggotaList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
