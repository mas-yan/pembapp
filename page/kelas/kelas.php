<?php 

include 'include/koneksi.php';

$query = mysqli_query($conn,"SELECT * FROM kelas");
 ?>
<div class="col-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Kelas</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

    <button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Kelas</th>
          <th width="80">Hapus</th>
          <th width="80">Ubah</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)):?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_kelas']; ?></td>
          <td>
            <form method="post">
              <input type="hidden" name="id_hapus" value="<?= $data['id_kelas']; ?>"></input>
            
              <button type="submit" name="hapus" onclick="return confirm('yakin ingin menghapus data?')" class="btn btn-block btn-danger"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </td>
          <td>
            <button type="button" data-toggle="modal" data-target="#modal-default<?= $data['id_kelas'] ?>" class="btn btn-block btn-primary"><i class="fas fa-edit"></i> Edit</button></td>

<!-- modal edit -->
 <div class="modal fade" id="modal-default<?= $data['id_kelas'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <?php 

            $id_ubah = $data['id_kelas'];
            $sql_edit = mysqli_query($conn,"SELECT * FROM kelas WHERE id_kelas = '$id_ubah' ");

            while ($data_ubah = mysqli_fetch_assoc($sql_edit)):?>

            <form method="post">
              <input type="hidden" name="ubah" value="<?= $data_ubah['id_kelas']; ?>"></input>
              <input type="text" name="data" value="<?= $data_ubah['nama_kelas']; ?>" class="form-control">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" name="tombol_ubah" class="btn btn-primary">Ubah Data</button>
               </div>
            </div>
            </form>
          <?php endwhile; ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- end modal edit -->

        </tr>
      <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- modal tambah -->
 <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post">
              <input type="text" placeholder="tambah data kelas" name="tambah" class="form-control">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" name="tombol_tambah" class="btn btn-primary">Tambah Data</button>
               </div>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- end modal tambah -->

<?php 

// hapus data
if (isset($_POST['hapus'])) {
  $id_hapus = $_POST['id_hapus'];
  $query_hapus = mysqli_query($conn,"DELETE FROM kelas WHERE id_kelas = '$id_hapus' ");

  if ($query_hapus) {
    ?>
    <script type="text/javascript">
      alert("berhasil di hapus");
      document.location='?page=kelas';
    </script>
    <?php
  }else{
    ?>
    <script type="text/javascript">
      alert("gagal di hapus");
    </script>
    <?php
  }
}
// end hapus data

// ubah data
if (isset($_POST['tombol_ubah'])) {
  $ubah = $_POST['ubah'];
  $ubah_data = $_POST['data'];
  $sql_ubah = mysqli_query($conn,"UPDATE kelas SET nama_kelas = '$ubah_data' WHERE id_kelas = '$ubah' ");

  if ($sql_ubah) {
    ?>
    <script type="text/javascript">
      alert("data berhasil di ubah");
      document.location='?page=kelas';
    </script>
    <?php
  }else{
    ?>
    <script type="text/javascript">
      alert("data gagal di ubah");
    </script>
    <?php
  }
}

// end ubah data

// tambah data
if (isset($_POST['tombol_tambah'])) {
  $tambah = $_POST['tambah'];

  $sql_tambah = mysqli_query($conn,"INSERT INTO kelas VALUES
                      ('','$tambah') ");
  if ($sql_tambah) {
    ?>
    <script type="text/javascript">
      alert("data berhasil di tambahkan");
      document.location='?page=kelas';
    </script>
    <?php
  }else{
    ?>
    <script type="text/javascript">
      alert("data gagal di tambahkan");
    </script>
    <?php
  }
}

 ?>