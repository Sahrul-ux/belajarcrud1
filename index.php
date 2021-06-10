<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan CRUD Dasar</title>
</head>

<body>
    <h3>CRUD Sederhana</h3>
    <h4><a href="create.php">Tambah Data</a></h4>
    <table border="1">
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Tempat</td>
                <td>Tanggal Lahir</td>
                <td>Agama</td>
                <td>No. HP</td>
                <td>Email</td>
                <td>Foto</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <?php
        include 'koneksi.php';

        $perintahSql = "SELECT * FROM siswa";

        $hasil = mysqli_query($konek, $perintahSql);

        $no = 0;

        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['tempat']; ?></td>
                    <td><?php echo $data['ttl']; ?></td>
                    <td><?php echo $data['agama']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['foto']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $data['id']; ?>">Update</a> |
                        <a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>

</body>

</html>