<?php

class AdminDanhmuc
{

    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc()
    {
        try {
            $sql = 'SELECT *FROM san_phams';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
}
