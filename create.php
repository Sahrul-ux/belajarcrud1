<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Create</title>
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
<h3>CRUD Sederhana</h3>

<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" required></td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td><input type="text" name="tempat" required></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><input type="text" name="ttl" id="datepicker" required></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>
                <select name="agama" required>
                    <option>-- Pilih Agama --</option>
                    <option value="islam">islam</option>
                    <option value="kristen">kristen</option>
                    <option value="katolik">katolik</option>
                    <option value="budha">budha</option>
                    <option value="hindu">hindu</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>No. Handphone</td>
            <td><input type="number" name="no_hp" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" required></td>
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

<body>

</body>

</html>