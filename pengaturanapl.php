<!-- Bagian header card dengan judul "Profil Aplikasi" -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Profil Aplikasi</h6>
</div>

<?php
// Mengambil data koneksi database
include '../config/database.php';

// Mengambil data profil aplikasi dari database
$hasil = mysqli_query($kon, "select * from profil_aplikasi order by nama_aplikasi desc limit 1");
$data = mysqli_fetch_array($hasil);
?>

<!-- Bagian isi card -->
<div class="card-body">
    <form action="aplikasi/edit.php" method="post" enctype="multipart/form-data">
        <!-- Input hidden untuk menyimpan ID -->
        <div class="form-group">
            <input type="hidden" class="form-control" value="<?php if (isset($data['id'])) echo $data['id']; ?>" name="id">
        </div>
        <!-- Input untuk Nama Aplikasi -->
        <div class="form-group">
            <label>Nama Aplikasi:</label>
            <input type="text" class="form-control" value="<?php if (isset($data['nama_aplikasi'])) echo $data['nama_aplikasi']; ?>" name="nama_aplikasi" required>
        </div>
        <!-- Input untuk Nama Ketua (Pimpinan) -->
        <div class="form-group">
            <label>Nama Ketua (Pimpinan):</label>
            <input type="text" class="form-control" value="<?php if (isset($data['nama_pimpinan'])) echo $data['nama_pimpinan']; ?>" name="nama_pimpinan" placeholder="Masukan nama Ketua" required>
        </div>
        <!-- Input untuk Alamat -->
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" class="form-control" value="<?php if (isset($data['alamat'])) echo $data['alamat']; ?>" name="alamat">
        </div>
        <!-- Input untuk Nomor Telepon -->
        <div class="form-group">
            <label>No Telp:</label>
            <input type="text" class="form-control" value="<?php if (isset($data['no_telp'])) echo $data['no_telp']; ?>" name="no_telp">
        </div>
        <!-- Input untuk Website -->
        <div class="form-group">
            <label>Website:</label>
            <input type="text" class="form-control" value="<?php if (isset($data['website'])) echo $data['website']; ?>" name="website">
        </div>
        <!-- Input untuk Logo -->
        <div class="form-group">
            <!-- Menampilkan pesan jika ada -->
            <div id="msg"></div>
            <label>Logo:</label>
            <!-- Input file untuk memilih logo -->
            <input type="file" name="logo" class="file">
            <div class="input-group my-3">
                <!-- Placeholder untuk menampilkan nama file yang akan diupload -->
                <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                <!-- Tombol untuk memilih file -->
                <div class="input-group-append">
                    <button type="button" id="pilih_logo" class="browse btn btn-dark">Pilih Logo</button>
                </div>
            </div>
            <!-- Menampilkan preview logo -->
            <img src="aplikasi/logo/<?php echo $data['logo']; ?>" id="preview" width="70%" class="img-thumbnail">
            <!-- Input hidden untuk menyimpan nama logo sebelumnya -->
            <input type="hidden" name="logo_sebelumnya" value="<?php if (isset($data['logo'])) echo $data['logo']; ?>" />
        </div>
        <!-- Tombol untuk menyimpan perubahan -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="ubah_profil_aplikasi">Simpan Perubahan</button>
        </div>
    </form>
</div>