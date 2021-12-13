<?php 

include 'include/koneksi.php';

$query = mysqli_query($conn,"SELECT * FROM siswa,kelas WHERE siswa.kelas = kelas.id_kelas ORDER BY id_siswa ");
 ?>
<div class="col-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Kelas</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

    <button style="margin-bottom: 15px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Data
	</button>

     <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
          <th>No</th>
          <th>Nis</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Status</th>
          <th>Nama Ortu</th>
          <th>Alamat</th>
          <th>No.telp Ortu</th>
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
          <td><?= $data['nis']; ?></td>
          <td><?= $data['nama_siswa']; ?></td>
          <td><?= $data['nama_kelas']; ?></td>
          <td><?= $data['jenis_kelamin']; ?></td>
          <td><?= $data['agama']; ?></td>
          <td><?= $data['status']; ?></td>
          <td><?= $data['nama_ortu']; ?></td>
          <td><?= $data['alamat']; ?></td>
          <td><?= $data['no_telp_ortu']; ?></td>
          <td>
            <form style="display: inline-block;" method="post">

                <input type="hidden" class="form-control" name="id_hapus" id="id_siswa" value="<?= $data['id_siswa'] ?>">
                <button type="submit" onclick="return confirm('apakah anda yakin ingin menghapus?')" name="hapus" class="btn btn-danger"><i class="fa fa-trash nav-icon"></i> Hapus</button>
              
        </form>
        </td>
        <td>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $data['id_siswa'] ?>"><i class="far fa-edit nav-icon"></i> Ubah</button>
            </td>
        </tr>
<!-- modal edit -->
 <div class="modal fade" id="modal-default<?= $data['id_siswa'] ?>">
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

            $id_ubah = $data['id_siswa'];
            $sql_edit = mysqli_query($conn,"SELECT * FROM siswa WHERE id_siswa = '$id_ubah' ");

            while ($data_edit = mysqli_fetch_assoc($sql_edit)):?>

            <form method="post">
              <div class="card-body">
	              <div class="form-group">
	                <input type="hidden" class="form-control" name="id_siswa" id="id_siswa" value="<?= $data_edit['id_siswa'] ?>">
	              </div>
	              <div class="form-group">
	                <label for="nis">Nis</label>
	                <input type="text" class="form-control" name="nis" value="<?= $data_edit['nis'] ?>">
	              </div>
	              <div class="form-group">
	                <label for="nama_siswa">Nama Siswa</label>
	                <input type="text" class="form-control" name="nama_siswa" value="<?= $data_edit['nama_siswa'] ?>">
	              </div>
	              <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control">
                    	<?php
                    	$query_kelas = mysqli_query($conn,"SELECT * FROM kelas");
                    	while ($tampil = mysqli_fetch_assoc($query_kelas)) {
                    	 	$pilih = ($tampil['id_kelas'] == $data_edit['kelas']?"selected":"");
                    	 	echo "<option value='$tampil[id_kelas]'$pilih>$tampil[nama_kelas]</option>";
                    	 } 
                    	 ?>
                    </select>
                  </div>
	              <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                      <option value="laki-laki" <?php if ($data_edit['jenis_kelamin'] == 'laki-laki') {
                      	echo "selected";
                      } ?>>Laki-Laki</option>
                      <option value="perempuan" <?php if ($data_edit['jenis_kelamin'] == 'perempuan') {
                      	echo "selected";
                      } ?>>perempuan</option>
                    </select>
                  </div>
	              <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" class="form-control">
                      <option value="islam" <?php if ($data_edit['agama'] == 'islam') {
                      	echo "selected";
                      } ?>>Islam</option>
                      <option value="kristen" <?php if ($data_edit['agama'] == 'kristen') {
                      	echo "selected";
                      } ?>>kristen</option>
                      <option value="katolik" <?php if ($data_edit['agama'] == 'katolik') {
                      	echo "selected";
                      } ?>>Katolik</option>
                      <option value="hindu" <?php if ($data_edit['agama'] == 'hindu') {
                      	echo "selected";
                      } ?>>Hindu</option>
                      <option value="budha" <?php if ($data_edit['agama'] == 'budha') {
                      	echo "selected";
                      } ?>>Budha</option>
                    </select>
                  </div>
	              <div class="form-group">
	                <label for="status">status</label>
	                <input type="text" class="form-control" name="status" value="<?= $data_edit['status'] ?>">
	              </div>
	              <div class="form-group">
	                <label for="nama_ortu">Nama Ortu</label>
	                <input type="text" class="form-control" name="nama_ortu" value="<?= $data_edit['nama_ortu'] ?>">
	              </div>
	              <div class="form-group">
	                <label for="alamat">Alamat</label>
	                <input type="text" class="form-control" name="alamat" value="<?= $data_edit['alamat'] ?>">
	              </div>
	              <div class="form-group">
	                <label for="no_telp_ortu">No.Telp Ortu</label>
	                <input type="text" class="form-control" name="no_telp_ortu" value="<?= $data_edit['no_telp_ortu'] ?>">
	              </div>
	           </div>
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
              <div class="form-group">
                <label for="nis">Nis</label>
                <input type="text" class="form-control" name="nis">
              </div>
              <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa">
              </div>
               <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                  <?php
                  $qrytmbhkls = mysqli_query($conn,"SELECT * FROM kelas");
                  while ($tambah_kls = mysqli_fetch_assoc($qrytmbhkls)):?>
                  <option value="<?= $tambah_kls['id_kelas'] ?>"><?= $tambah_kls['nama_kelas'] ?></option>
                  <?php endwhile ?>
                </select>
              </div>
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                  <option value="laki-laki">Laki-Laki</option>
                  <option value="perempuan">perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Agama">Agama</label>
                <select name="agama" class="form-control">
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="katolik">Katolik</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                </select>
              </div>
              <div class="form-group">
                <label for="status">status</label>
                <select name="status" class="form-control">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_ortu">Nama Ortu</label>
                <input type="text" class="form-control" name="nama_ortu">
              </div>
              <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat">
              </div>
              <div class="form-group">
                <label for="no_telp_ortu">No.Telp Ortu</label>
                <input type="text" class="form-control" name="no_telp_ortu">
              </div>
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
  $query_hapus = mysqli_query($conn,"DELETE FROM siswa WHERE id_siswa = '$id_hapus' ");

  if ($query_hapus) {
    ?>
    <script type="text/javascript">
      alert("berhasil di hapus");
      document.location='?page=siswa';
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
  $id_ubah = $_POST['id_siswa'];
  $nis = $_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $kelas = $_POST['kelas'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];
  $status = $_POST['status'];
  $nama_ortu = $_POST['nama_ortu'];
  $alamat = $_POST['alamat'];
  $no_telp_ortu = $_POST['no_telp_ortu'];
  $sql_ubah = mysqli_query($conn,"UPDATE siswa SET nis = '$nis',nama_siswa = '$nama_siswa',kelas = '$kelas',jenis_kelamin = '$jenis_kelamin',agama = '$agama',status = '$status',nama_ortu = '$nama_ortu',alamat = '$alamat',no_telp_ortu = '$no_telp_ortu' WHERE id_siswa = '$id_ubah' ");

  if ($sql_ubah) {
    ?>
    <script type="text/javascript">
      alert("data berhasil di ubah");
      document.location='?page=siswa';
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
  $nis = $_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $kelas = $_POST['kelas'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];
  $status = $_POST['status'];
  $nama_ortu = $_POST['nama_ortu'];
  $alamat = $_POST['alamat'];
  $no_telp_ortu = $_POST['no_telp_ortu'];

  $sql_tambah = mysqli_query($conn,"INSERT INTO siswa VALUES
                      ('','$nis','$nama_siswa','$kelas','$jenis_kelamin','$agama','$status','$nama_ortu','$alamat','$no_telp_ortu') ");
  if ($sql_tambah) {
    ?>
    <script type="text/javascript">
      alert("data berhasil di tambahkan");
      document.location='?page=siswa';
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