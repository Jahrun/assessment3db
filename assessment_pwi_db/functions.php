<?php 
// koneksi ke database
$link = mysqli_connect("localhost", "root", "", "SG_LearnCenter");

// menyimpan data yang diambil berupa array asosiatif
function query($query)
{
    global $link;
    $result = mysqli_query($link, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// ! funsi menambah data
function tambah($data)
{
    global $link;

    // ambil data dari tiap elemen dalam form
    $NIM = ($data["nim"]);
    $CLASS_ID = ($data["classid"]);
    $NAMA = ($data["nama"]);
    $KELAS = ($data["kelas"]);
    $SEMESTER = ($data["semester"]);
    $NO_WA = ($data["nomor"]);
    // $FOTO = addslashes(file_get_contents($data["image"]));
    $FOTO = ($data["image"]);

    // query insert data
    $query = "INSERT INTO member
                VALUES
                ('$NIM', '$CLASS_ID', '$NAMA', '$KELAS', '$SEMESTER', '$NO_WA', '$FOTO' )
                ";
    mysqli_query($link, $query);

    return mysqli_affected_rows($link);
}

//! fungsi hapus
function hapus($masuk)
{
    global $link;
    $input = $masuk["nim"];
    mysqli_query($link, "DELETE FROM member WHERE NIM = $input");

    return mysqli_affected_rows($link);
}

// !fungsi ubah
function ubah($data)
{
    global $link;

    // ambil data dari tiap elemen dalam form
    $NIM = $data["nim"];
    $CLASS_ID = $data["classid"];
    $NAMA = $data["nama"];
    $KELAS = $data["kelas"];
    $SEMESTER = $data["semester"];
    $NO_WA = $data["nomor"];
    // $FOTO = $data["image"];

    // query insert data
    $query = "UPDATE member SET
        NIM = '$NIM',
        CLASS_ID = '$CLASS_ID',
        NAMA = '$NAMA',
        KELAS = '$KELAS',
        SEMESTER = '$SEMESTER',
        NO_WA = '$NO_WA'
    WHERE NIM = '$NIM'
    ";
    mysqli_query($link, $query);

    return mysqli_affected_rows($link);
}

if(isset($_POST['submit'])){
    echo'berhasil';
}


?>