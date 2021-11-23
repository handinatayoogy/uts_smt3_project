<?php 

$conn = mysqli_connect("localhost", "root", "", "uts_smt3");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_mk($data) {
    global $conn;

    $kode = $data["kode"];
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];

    $query = "INSERT INTO matakuliah(id, kode, nama, deskripsi) VALUES ('', '$kode', '$nama', '$deskripsi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_pertemuan($data) {
    global $conn;

    $id_matakuliah = $data["id_matakuliah"];
    $pertemuan = $data["pertemuan"];
    $materi = $data["materi"];

    $query = "INSERT INTO detail(id_detail, id_matakuliah, pertemuan, materi) VALUES ('', '$id_matakuliah', '$pertemuan', '$materi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_mk($data) {
    global $conn;

    $id = $data["id"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];

    $query = "UPDATE matakuliah SET
                kode = '$kode',
                nama = '$nama',
                deskripsi = '$deskripsi'
              WHERE id = $id
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah_pertemuan($data) {
    global $conn;

    $id_detail = $data["id_detail"];
    $pertemuan = $data["pertemuan"];
    $materi = $data["materi"];

    $query = "UPDATE detail SET
                pertemuan = '$pertemuan',
                materi = '$materi'
              WHERE id_detail = $id_detail
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>