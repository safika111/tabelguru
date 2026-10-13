<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa</title>
   <link rel="stylesheet" href="css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism-tomorrow.min.css">

    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js"></script>
</head>

<body>
  
<?php
require_once "database.php";
$stmt = $pdo->query("
    SELECT *
    FROM siswa
    ORDER BY id DESC
");

$siswa = $stmt->fetchAll();
?>
    <?php if (isset($_SESSION['success'])): ?>

        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']) ?>
        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>


    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert alert-error">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>

    <div class="container">

        <h1>Data Siswa</h1>

        <form action="simpan.php" method="POST">

            <div class="form-group">
                <label for="nis">NIS</label>
<input type="text" id="nis" name="nis" required>
    </div> 
            <div class="form-group">
                <label for="nama">Nama lengkap</label>
                 <input type="text" id="nama" name="nama" required>


                <div class="language-html">
                    <code class="language-html"></code>
                </div>

                
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="tel" id="no_hp" name="no_hp">

                <div class="language-html">
                    <code class="language-html"> </code>
                </div>
            </div>

            <div class="form-group">

                <label>Jenis Kelamin</label>

                <div class="language-html">
                    <code class="language-html">
                    
                    </code>
                </div>

                <label>
                    <input type="radio" name="jenis_kelamin" value="L" required>
                    Laki-laki
                </label>

                <label>
                    <input type="radio" name="jenis_kelamin" value="P">
                    Perempuan
                </label>

            </div>

            <div class="form-group">

                <label for="kelas">Kelas</label>

                <div class="language-html">
                    <code class="language-html">
                        
                    </code>
                </div>

                <select id="kelas" name="kelas" required>

                    <option value="">
                        -- Pilih Kelas --
                    </option>

                    <option value="X RPL 1">
                        X RPL 1
                    </option>

                    <option value="X RPL 2">
                        X RPL 2
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="tanggal_lahir">
                    Tanggal Lahir
                </label>

                <div class="language-html">
                    <code class="language-html">
                        
                    </code>
                </div>

                <input
                    type="date"
                    id="tanggal_lahir"
                    name="tanggal_lahir">

            </div>

            <div class="form-group">

                <label for="alamat">
                    Alamat
                </label>

                <div class="language-html">
                    <code class="language-html">
                        
                    </code>
                </div>

                <textarea
                    id="alamat"
                    name="alamat"
                    rows="4"></textarea>

            </div>

            <button type="submit">
                Simpan
            </button>

        </form>


        <hr>


        <h2>Data Siswa</h2>

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Dibuat</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($siswa as $index => $row): ?>

                    <tr>

                        <td>
                            <?= $index + 1 ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['nis']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['nama']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['email']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['no_hp']) ?>
                        </td>

                        <td>
                            <?= $row['jenis_kelamin'] === 'L'
                                ? 'Laki-laki'
                                : 'Perempuan'
                            ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['kelas']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['tanggal_lahir']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['created_at'] ?? '-') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['updated_at'] ?? '-') ?>
                        </td>

                        <td>

                            <a href="edit.php?id=<?= $row['id'] ?>">
                                Edit
                            </a>

                            <a
                                href="hapus.php?id=<?= $row['id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</body>

</html>