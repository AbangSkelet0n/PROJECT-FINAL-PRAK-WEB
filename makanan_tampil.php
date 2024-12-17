<!-- tabel menampilkan makanan -->
<table id="food-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Artikel</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "config.php";
        $query = mysqli_query($conn, "SELECT * FROM makanan ORDER BY id_makanan DESC");
        $no = 0;
        while ($data = mysqli_fetch_array($query)) {
            $no++;
        ?>
        <!-- kode untuk menampilkan data -->
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['nama_makanan'] ?></td>
                <td><img src="assets/<?= $data['foto'] ?>" width=" 100"></td>
                <td><?= $data['deskripsi'] ?></td>
                <td>
                    <a class="tombol edit" href="makanan_edit.php?id=<?= $data['id_makanan'] ?>">Edit</a>
                    <a class="tombol hapus" onclick="return confirm('Yakin ingin menghapus?')"
                        href="makanan_hapus.php?id=<?= $data['id_makanan'] ?>&foto=<?= $data['foto'] ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>