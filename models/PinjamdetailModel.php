<?php

include_once('../db/database.php');

class PinjamdetailModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPinjamdetail($pinjam_id, $kode_film)
    {
        $sql = "INSERT INTO pinjamdetail (pinjam_id, kode_buku) VALUES (:pinjam_id, :kode_buku)";
        $params = array(
          ":pinjam_id" => $pinjam_id,
          ":kode_buku" => $kode_film
        );

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getPinjamdetail($id)
    {
        $sql = "SELECT P.id,P.pinjam_id,P.kode_buku,B.id as idbuku,B.kode_buku,B.judul,B.pengarang FROM `pinjamdetail` P left join `film` B on (P.kode_buku=B.kode_buku) WHERE P.id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPinjamdetail($id)
    {
        $sql = "SELECT count(*) as total FROM `pinjamdetail` WHERE pinjam_id=:id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchColumn();
    }

    public function updatePinjamdetail($id, $pinjam_id, $kode_buku)
    {
        $sql = "UPDATE pinjamdetail SET pinjam_id = :pinjam_id, kode_buku = :kode_buku WHERE id = :id";
        $params = array(
          ":pinjam_id" => $pinjam_id,
          ":kode_buku" => $kode_buku,
          ":id" => $id
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    

    public function deletePinjamdetail($id)
    {
        $sql = "DELETE FROM pinjamdetail WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getPinjamdetailList($id)
{
    $sql = 'SELECT P.id, 
                   P.pinjam_id, 
                   P.kode_buku, 
                   F.id as idfilm, 
                   F.kode_film, 
                   F.judul_film, 
                   F.sutradara, 
                   F.harga 
            FROM `pinjamdetail` P 
            LEFT JOIN `film` F 
            ON (P.kode_buku = F.kode_film) 
            WHERE P.pinjam_id = :id';
    
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); // Bind parameter untuk keamanan
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getDataCombo()
    {
        $sql = 'SELECT * FROM pinjamdetail';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getTotalHarga($pinjamId) {
        $query = "SELECT SUM(f.harga) AS total_harga 
                  FROM pinjamdetail pd
                  JOIN film f ON pd.kode_film = f.kode_film
                  WHERE pd.id_pinjam = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$pinjamId]);
        $result = $stmt->fetch();
        return $result['total_harga'] ?? 0;
    }

    public function getHargaFilm($kodeFilm) {
        $query = "SELECT harga FROM film WHERE kode_film = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$kodeFilm]);
        $result = $stmt->fetch();
        return $result['harga'] ?? 0;
    }
}
