<!-- Modal -->
<div id="modalTambahUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('simpan/karyawan') ?>" method="post"> 
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
              <label>Telpon</label>
              <input type="text" name="telpon" class="form-control">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="kelamin" class="form-control">
                <option>-PILIH-</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div align="right">
              <input type="submit" name="simpan" value="Buat Akun" class="btn btn-primary">
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
</div>
<div class="row">
	<div class="col-md-12">
	     <div class="card">
            <div class="card-header">
              <a href="#modalTambahUser" data-toggle="modal" data-target="" class="fa fa-plus btn btn-primary">Tambah Karyawan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
	                <thead>
	                    <tr>
	                    	<th>No</th>
	                        <th>Name</th>
	                        <th>Telpon</th>
	                        <th>Kelamin</th>
	                        <th>Email</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($kar as $i => $a ):?>
	                    <tr>
	                    	<td><?= $i+1 ?></td>
	                        <td><?= $a->nama ?></td>
	                        <td><?= $a->telpon ?></td>
	                        <td><?= $a->kelamin ?></td>
	                        <td><?= $a->email ?></td>
	                        <td>
	                        	<div class="fa fa-cog" onclick="tampilModalProject(<?=$a->id_programer?>)"></div>
                            <!-- &nbsp;&nbsp;<a href="<?= site_url('hapus_user/').$a->id_programer ?>"><i class="fa fa-trash"></i></a>-->
	                        </td> 
	                    </tr>
	                <?php endforeach ?>
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>				
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_detail_project" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_edit">Setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('simpan/password') ?>" method="post">
      <div class="modal-body">
          <div class="form-group">
          	<label>Email</label>
          	<input type="hidden" name="id_programer" id="id_programer">
          	<input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="form-group">
          	<label>password</label>
          	<input type="password" name="password" id="password" class="form-control" >
          </div>
      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-success" value="Simpan Perubahan">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </fdiv>
      </form>


<script>
  // fungsi untuk mengosongkan isi modal
  function resetModalProject()
  {

    document.getElementById("id_programer").value = "";
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
  }

  function tampilModalProject(id_programer)
  {
    axios.get("<?php echo base_url('api/user/ambil'); ?>/" + id_programer)
      .then(function(res){
        var data_user = res.data;
        document.getElementById("id_programer").value = data_user.id_programer;
        document.getElementById("email").value = data_user.email;
        document.getElementById("password").value = data_user.password;
        // alert('hallo');
        $('#modal_detail_project').modal('show');
      })
      .catch(function(err){
        alert("Terdapat kesalahan dalam mengambil data.");
        console.log(err)
        resetModalProject();
      })
      alert(data_user);
  }
</script>
