<?php

include_once('../db/database.php');

class PinjamModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPinjam($nomor_bukti, $nomor_anggota, $tanggal_pinjam)
    {
        $sql = "INSERT INTO pinjam (nomor_bukti, nomor_anggota, tanggal_pinjam) VALUES (:nomor_bukti, :nomor_anggota, :tanggal_pinjam)";
        $params = array(
          ":nomor_bukti" => $nomor_bukti,
          ":nomor_anggota" => $nomor_anggota,
          ":tanggal_pinjam" => $tanggal_pinjam
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

    public function getPinjam($id)
    {
        $sql = "SELECT * FROM pinjam P left join anggota A on (P.nomor_anggota = A.nomor_anggota) WHERE P.id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePinjam($id, $nomor_bukti, $nomor_anggota, $tanggal_pinjam, $tanggal_kembali)
    {
        $sql = "UPDATE pinjam SET nomor_bukti = :nomor_bukti, nomor_anggota = :nomor_anggota, tanggal_pinjam = :tanggal_pinjam, tanggal_kembali = :tanggal_kembali WHERE id = :id";
        $params = array(
          ":nomor_bukti" => $nomor_bukti,
          ":nomor_anggota" => $nomor_anggota,
          ":tanggal_pinjam" => $tanggal_pinjam,
          ":tanggal_kembali" => $tanggal_kembali,
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

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE pinjam SET dipinjam = :dipinjam WHERE id = :id";
        $params = array(
          ":dipinjam" => $status,
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

    public function updateDikembalikan($id, $status)
    {
        $date = date('Y-m-d');
        $sql = "UPDATE pinjam SET dikembalikan = :dikembalikan,tanggal_kembali = :tanggal_kembali WHERE id = :id";
        $params = array(
          ":dikembalikan" => $status,
          ":tanggal_kembali" => $date,
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
    

    public function deletePinjam($id)
    {
        $sql = "DELETE FROM pinjam WHERE id = :id";
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

    public function getPinjamList()
    {
        $sql = 'SELECT P.id,P.nomor_bukti,P.nomor_anggota,P.tanggal_pinjam,P.tanggal_kembali,P.dipinjam,P.dikembalikan,A.id as idanggota,A.nama 
        FROM pinjam P left join anggota A on (P.nomor_anggota = A.nomor_anggota) limit 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCombo()
    {
        $sql = 'SELECT * FROM pinjam';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function getHargaFilm($kodeFilm) {
        $query = "SELECT harga FROM film WHERE kode_film = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$kodeFilm]);
        $result = $stmt->fetch();
        return $result['harga'] ?? 0;
    }
    
}
