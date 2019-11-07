
        
    <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Project</button>
          <?php if($this->session->flashdata('pesan')== TRUE):?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?= $this->session->flashdata('pesan') ?>
            </div>
        <?php endif ?>
        </div>

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <form action="<?= site_url('project_simpan') ?>" method="post">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Isikan Data Project</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <label>Nama Project</label>
                        <div class="form-group">
                            <input type="text" name="judul" class="form-control" placeholder="Nama Project">
                        </div>
                        <label>Nama Client</label>
                        <div class="form-group">
                            <input type="text" name="client" class="form-control" placeholder="Nama Client">
                        </div>
                        <label>Deskripsi</label>
                        <div cass="form-group">
                            <textarea class="ckeditor" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                        <label>Level Project</label>
                        <select name="level" class="form-control">
                            <option>-PILIH-</option>
                            <option value="Mudah">Mudah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                        </div>
                        <label>Tanggal Penyelesaian</label>
                        <div class="form-group">
                            <input type="date" name="tanggal_selesai" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success" value="Simpan">
                      <input type="reset" class="btn btn-warning" value="Batal">
                    </div>
                  </div>
              </form>
              
            </div>
          </div>
        <div class="card-body">
                                                
                <div class="row push-up-10">
                    <div class="col-md-3">
                        <h3>To-do List</h3>
                    <?php foreach ($in as $a):?>
                      <?php if($a->status=='Masuk'):?>
                        <a href="<?= site_url('pendingg/').$a->id_project ?>">
                            <div class="card card-secondary" >
                                <div class="card-body skew-shadow">
                                    <h1><?= $a->judul ?></h1>
                                    <h5 class="op-8"><?= $a->deskripsi ?></h5>
                                </div>
                            </div>
                        </a>
                          <?php endif ?>
                        <?php endforeach ?>    
        

                    </div>

                    <div class="col-md-3">
                        <h3>Pending</h3> 
                    <?php foreach($in as $a):?>
                      <?php if($a->status=='Pending'):?>                   
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow" onclick="tampilModalProject(<?=$a->id_project?>)">
                                <h1><?= $a->judul ?></h1>
                                <h5 class="op-8"><?= $a->deskripsi ?></h5>
                            </div>
                        </div>
                      <?php endif ?>
                        <?php endforeach ?>  
                    </div>

                    <div class="col-md-3">
                        <h3>In Progress</h3>
                        <?php foreach($in as $a):?>
                          <?php if($a->status=='Proses'):?>
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow" onclick="tampilModalProject(<?=$a->id_project?>)">
                                <h1><?= $a->judul ?></h1>
                                <h5 class="op-8"><?= $a->deskripsi ?></h5>
                            </div>
                        </div>
                      <?php endif ?>
                    <?php endforeach ?>
                    </div>

                    <div class="col-md-3">
                        <h3>Completed</h3>
                        <?php foreach($in as $a):?>
                          <?php if($a->status=='Success'):?>
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow" onclick="tampilModalProject(<?=$a->id_project?>)">
                                <h1><?= $a->judul ?></h1>
                                <h5 class="op-8"><?= $a->deskripsi ?></h5>
                            </div>
                        </div>
                      <?php endif ?>
                    <?php endforeach ?>
                    </div>
                </div>   
        </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="modal_detail_project" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_edit">Detail Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table">
            <tr>
              <td id="tanggal_masuk"></td>
              <td align="center">S/d</td>
              <td align="right" id="tanggal_selesai"></td>
            </tr>
            <tr>
              <td>Project : <b><i id="judul"></i></b></td>
              <td></td>
              <td>Client : <b><i id="client"></i></b></td>
            </tr>
            <tr>
              <td colspan="3">
                <div class="form-group">
                <textarea class="form-control" readonly id="deskripsi" ></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>Level : <b><i id="level"></i></b></td>
              <td></td>
              <td>Programer : <b><i id="nama"></i></b></td>
            </tr>
            <tr>
              <td>Status : <b><i id="status"></i></b></td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

        

    </div>
  </div>
</div>
<script>
  // fungsi untuk mengosongkan isi modal
  function resetModalProject()
  {
    document.getElementById("judul").innerHTML = "";
    document.getElementById("client").innerHTML = "";
    document.getElementById("deskripsi").value = "";
    document.getElementById("tanggal_masuk").innerHTML = "";
    document.getElementById("tanggal_selesai").innerHTML = "";
    document.getElementById("level").innerHTML = "";
    document.getElementById("nama").innerHTML = "";
    document.getElementById("status").innerHTML = "";
  }

  function tampilModalProject(id_project)
  {
    axios.get("<?php echo base_url('api/project'); ?>/" + id_project)
      .then(function(res){
        var data_project = res.data;
        document.getElementById("judul").innerHTML = data_project.judul;
        document.getElementById("client").innerHTML = data_project.client;
        document.getElementById("deskripsi").value = data_project.deskripsi;
        document.getElementById("tanggal_masuk").innerHTML = data_project.tanggal_masuk
        document.getElementById("tanggal_selesai").innerHTML = data_project.tanggal_selesai;
        document.getElementById("level").innerHTML = data_project.level;
        document.getElementById("nama").innerHTML = data_project.nama;
        document.getElementById("status").innerHTML = data_project.status;
        $('#modal_detail_project').modal('show');
      })
      .catch(function(err){
        alert("Terdapat kesalahan dalam mengambil data.");
        console.log(err)
        resetModalProject();
      })
  }
</script>