<?php
require_once 'Database.php';

class SaveModel extends BaseModel {
    function insert($tabungan, $bulan){
        $sql = "INSERT INTO savings (tabungan, bulan) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$tabungan, $bulan]);
    }

    function getAll(){
        $sql = "SELECT SUM(tabungan) AS total FROM savings";
        $result = $this->db->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalPerBulan() {
        $sql = "SELECT bulan, SUM(tabungan) AS total FROM savings GROUP BY bulan";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

