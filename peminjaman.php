<h1 class="mt-4">Peminjaman buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <a href="?page=peminjaman_tambah" class="btn btn-primary my-4"><i class="fs fa-print"></i>Tambah peminjaman</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal peminjaman</th>
            <th>Tanggal pengembalian</th>
            <th>Status peminjam</th>
            <th>Aksi</th>
          </tr>
          <?php
          $id_user = $_SESSION["user"]["id_user"];
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user = '$id_user'");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td><?= $data["tanggal_peminjaman"]; ?></td>
              <td><?= $data["tanggal_pengembalian"]; ?></td>
              <td><?= $data["status_peminjaman"]; ?></td>
              <td>
                <?php if ($data["status_peminjaman"] != "dikembalikan") { ?>
                  <a href="?page=peminjaman_ubah&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-info text-light">Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>
                <?php } ?>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>