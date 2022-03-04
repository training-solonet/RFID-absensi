<?php
    $conn = mysqli_connect("localhost", "root", "", "absen");

    // SEKOLAH
        function query($query) {
            global $conn;
            $result = mysqli_query($conn, $query);
            $rows = [];
            while ( $row = mysqli_fetch_assoc($result)) {
                $rows [] = $row;
            }
            return $rows;
        }

        function tambah($method){
            global $conn;

            $uid = $method['uid'];
            $nama = $method['nama'];
            $sekolah = $method['sekolah'];

            $query = "INSERT INTO tb_profil (uid, nama, sekolah) values('$uid', '$nama', '$sekolah')";

            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        }

        function hapus($id) {
            global $conn;
            mysqli_query($conn, "DELETE FROM tb_profil WHERE id = $id");

            return mysqli_affected_rows($conn);
        }

        function update($method) {
            global $conn;
            $id = $method['id'];
            $uid = $method['uid'];
            $nama = $method['nama'];
            $sekolah = $method['sekolah'];
            $query = "UPDATE tb_profil SET
                        id = '$id',
                        nama = '$nama', 
                        sekolah = '$sekolah'
                        WHERE id = $id
                        ";

            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        }



?>
