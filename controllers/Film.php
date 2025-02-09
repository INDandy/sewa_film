<?php
include_once('../models/FilmModel.php');

class FilmController
{
    private $model;

    public function __construct()
    {
        $this->model = new FilmModel();
    }

    public function addFilm($kode_film, $judul_film, $sutradara, $harga)
    {
        return $this->model->addFilm($kode_film, $judul_film, $sutradara, $harga);
    }

    public function getFilm($id)
    {
        return $this->model->getFilm($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getFilm($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateFilm($id, $kode_film, $judul_film, $sutradara, $harga)
    {
        return $this->model->updateFilm($id, $kode_film, $judul_film, $sutradara, $harga);
    }

    public function deleteFilm($id)
    {
        return $this->model->deleteFilm($id);
    }

    public function getFilmList()
    {
        return $this->model->getFilmList();
    }
    
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
