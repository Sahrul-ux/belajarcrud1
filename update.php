<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Update</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            }).val();
        });
    </script>
</head>


<body>
    <h3>CRUD Sederhana</h3>
    <?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $perintahSql = "SELECT * FROM siswa WHERE id = $id";

        $proses = mysqli_query($konek, $perintahSql);

        $data = mysqli_fetch_array($proses);
    }

    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo ['id']; ?>">
        <input type="hidden" name="fotolama" value="<?php echo ['foto']; ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama'];  ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $data['alamat'];  ?>" required></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td><input type="text" name="tempat" value="<?php echo $data['tempat'];  ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="text" name="ttl" id="datepicker" value="<?php echo $data['ttl'];  ?>" required></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name="agama" required>
                        <option>-- Pilih Agama --</option>
                        <option <?php if ($data['agama'] == 'islam') {
                                    echo 'selected';
                                } ?> value="islam">islam</option>
                        <option <?php if ($data['agama'] == 'kristen') {
                                    echo 'selected';
                                } ?> value="kristen">kristen</option>
                        <option <?php if ($data['agama'] == 'katolik') {
                                    echo 'selected';
                                } ?> value="katolik">katolik</option>
                        <option <?php if ($data['agama'] == 'budha') {
                                    echo 'selected';
                                } ?> value="budha">budha</option>
                        <option <?php if ($data['agama'] == 'hindu') {
                                    echo 'selected';
                                } ?> value="hindu">hindu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>No. Handphone</td>
                <td><input type="number" name="no_hp" value="<?php echo $data['no_hp'];  ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $data['email'];  ?>" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" name="submit"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>

    <?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tempat = $_POST['tempat'];
        $ttl = $_POST['ttl'];
        $agama = $_POST['agama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); //enkripsi dengan md5

        $foto = $_FILES['foto']['name'];

        $tmpFoto = $_FILES['foto']['tmp_name'];

        $namaFoto = $nama . '-' . $foto;

        $lokasiFoto = 'upload/';

        $prosesUpload = move_uploaded_file($tmpFoto, $lokasiFoto . $namaFoto);

        if ($prosesUpload) {
            unlink($lokasiFoto . $_POST['fotolama']);

            $perintahSql = "UPDATE siswa SET nama='$nama',alamat='$alamat',tempat='$tempat',ttl='$ttl',agama='$agama',no_hp='$no_hp',email='$email',password='$password',foto='$foto' WHERE id = $id)";

            $proses = mysqli_query($konek, $perintahSql);

            if ($proses) {
                header('Location:index.php');
            } else {
                echo "<script>alert('Gagal Disimpan')</script>";
            }
        }
    }
    ?>



</body>

</html>