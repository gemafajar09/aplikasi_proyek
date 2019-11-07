<br>
  <div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Pending</div>
            </div>
            <div class="card-body pb-0">
               <?php foreach($tampil as $a):?>
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
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Proses</div>
            </div>
                <div class="card-body pb-0">
                <?php foreach($tampil as $a):?>
                    <?php if($a->status=='Proses'):?>
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow" onclick="tampilModal(<?=$a->id_project?>)">
                                <h1><?= $a->judul ?></h1>
                                <h5 class="op-8"><?= $a->deskripsi ?></h5>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-header">
            <div class="card-title">Selesai</div>
        </div>
            <div class="card card-primary bg-primary-gradient">
                <?php foreach($tampil as $a): ?>
                    <?php if($a->status=='Success'):?>
                            <div class="card-body pb-0">
                                <div class="card card-secondary">
                                    <div class="card-body skew-shadow" onclick="tampilModalProject(<?=$a->id_project?>)">
                                        <h1><?= $a->judul ?></h1>
                                        <h5 class="op-8"><?= $a->deskripsi ?></h5>
                                    </div>
                                </div>
                            </div>
                    <?php endif ?>
                <?php endforeach ?>
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
              <td colspan="2">Deskripsi : </td>
              <td colspan="2">
                <textarea id="deskripsi1"></textarea>
              </td>
            <tr>
              <td>Level : <b><i id="level"></i></b></td>
              <td></td>
              <td>Programer : <b><i id="nama"></i></b></td>
            </tr>
            <tr>
              <td>Status : <b><i id="status"></i></b></td>
            </tr>
          </table>
          <form action="<?= site_url('user/proses') ?>" method="post">
          <input type="hidden" name="id" id="id_project">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Proses">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_succes" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
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
              <td id="tanggal_masuk1"></td>
              <td align="center">S/d</td>
              <td align="right" id="tanggal_selesai1"></td>
            </tr>
            <tr>
              <td>Project : <b><i id="judul1"></i></b></td>
              <td></td>
              <td>Client : <b><i id="client1"></i></b></td>
            </tr>
            <tr>
              <td colspan="3">
                <div class="form-group">
                <textarea class="form-control" readonly id="deskripsi1" ></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>Level : <b><i id="level1"></i></b></td>
              <td></td>
              <td>Programer : <b><i id="nama1"></i></b></td>
            </tr>
          </table>
          <form action="<?= site_url('user/selesai') ?>" method="post">
          <input type="hidden" name="id" id="id_project1">
          <input type="hidden" name="tanggal" id="tgl1">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Proses">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  // fungsi untuk mengosongkan isi modal
  function resetModalProject()
  {
    document.getElementById("id_project").value = "";
    document.getElementById("judul").innerHTML = "";
    document.getElementById("client").innerHTML = "";
    document.getElementById("deskripsi").value = "";
    document.getElementById("tanggal_masuk").innerHTML = "";
    document.getElementById("tanggal_selesai").innerHTML = "";
    document.getElementById("level").innerHTML = "";
    document.getElementById("nama").innerHTML = "";
  }

  function tampilModalProject(id_project)
  {
    axios.get("<?php echo base_url('api/project/user'); ?>/" + id_project)
      .then(function(res){
        var data_project = res.data;
        document.getElementById("id_project").value = data_project.id_project;
        document.getElementById("judul").innerHTML = data_project.judul;
        document.getElementById("client").innerHTML = data_project.client;
        document.getElementById("deskripsi").value = data_project.deskripsi;
        document.getElementById("tanggal_masuk").innerHTML = data_project.tanggal_masuk
        document.getElementById("tanggal_selesai").innerHTML = data_project.tanggal_selesai;
        document.getElementById("level").innerHTML = data_project.level;
        document.getElementById("nama").innerHTML = data_project.nama;
        $('#modal_detail_project').modal('show');
      })
      .catch(function(err){
        alert("Terdapat kesalahan dalam mengambil data.");
        console.log(err)
        resetModalProject();
      })
  }
</script>

<script>
  // fungsi untuk mengosongkan isi modal
  function resetModal()
  {
    document.getElementById("id_project1").value = "";
    document.getElementById("judul1").innerHTML = "";
    document.getElementById("client1").innerHTML = "";
    document.getElementById("deskripsi1").value = "";
    document.getElementById("tanggal_masuk1").innerHTML = "";
    document.getElementById("tanggal_selesai1").innerHTML = "";
    document.getElementById("level1").innerHTML = "";
    document.getElementById("nama1").innerHTML = "";
    document.getElementById("tgl1").value = "";
  }

  function tampilModal(id_project)
  {
    axios.get("<?php echo base_url('api/project/user'); ?>/" + id_project)
      .then(function(res){
        var data_project = res.data;
        document.getElementById("id_project1").value = data_project.id_project;
        document.getElementById("judul1").innerHTML = data_project.judul;
        document.getElementById("client1").innerHTML = data_project.client;
        document.getElementById("deskripsi1").value = data_project.deskripsi;
        document.getElementById("tanggal_masuk1").innerHTML = data_project.tanggal_masuk
        document.getElementById("tanggal_selesai1").innerHTML = data_project.tanggal_selesai;
        document.getElementById("level1").innerHTML = data_project.level;
        document.getElementById("nama1").innerHTML = data_project.nama;
        document.getElementById("tgl1").value = data_project.tanggal_selesai;
        $('#modal_succes').modal('show');
      })
      .catch(function(err){
        alert("Terdapat kesalahan dalam mengambil data.");
        console.log(err)
        resetModal();
      })
  }
</script>

