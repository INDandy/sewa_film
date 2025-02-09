<?php
include_once('../models/MatakuliahModel.php');

class MatakuliahController
{
    private $model;

    public function __construct()
    {
        $this->model = new MatakuliahModel();
    }

    public function addMatakuliah($kodemk, $namamk, $sks, $prodi)
    {
        return $this->model->addMatakuliah($kodemk, $namamk, $sks, $prodi);
    }

    public function getMatakuliah($id)
    {
        return $this->model->getMatakuliah($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getMatakuliah($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateMatakuliah($id, $kodemk, $namamk, $sks, $prodi)
    {
        return $this->model->updateMatakuliah($id, $kodemk, $namamk, $sks, $prodi);
    }

    public function deleteMatakuliah($id)
    {
        return $this->model->deleteMatakuliah($id);
    }

    public function getMatakuliahList()
    {
        return $this->model->getMatakuliahList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
