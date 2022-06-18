<?php
$ids    = $_GET['ids'];
$id     = $_GET['id'];
$status = $_GET['status'];
$select_tahun = $_GET['st'];

if ($status == 1) {
    $sql = mysqli_query($koneksi, "UPDATE tagihan_spp SET status='2', tgl_bayar='0' WHERE id_tagihan='$id'");
    if ($sql) {
        echo "
            <script>alert('SPP Berhasil Dihapus');
                document.location='?page=tagihan_siswa&id=$ids&st=$select_tahun';
            </script>";
    } else {
        echo "
            <script>alert('SPP Gagal Dihapus');
                document.location='?page=tagihan_siswa&id=$ids&st=$select_tahun';
            </script>";
    }
} else {
    $tanggal = $_POST['date'];
    $sql1 = mysqli_query($koneksi, "UPDATE tagihan_spp SET status='1', tgl_bayar='$tanggal' WHERE id_tagihan='$id'");
    if ($sql1) {
        echo "
        <script>alert('SPP Berhasil Dibayar');
            document.location='?page=tagihan_siswa&id=$ids&st=$select_tahun';
        </script>";
    } else {
        echo "
        <script>alert('SPP Gagal Dibayar');
            document.location='?page=tagihan_siswa&id=$ids&st=$select_tahun';
        </script>";
    }
}