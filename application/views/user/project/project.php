<div class="container-wraper">
    <?php if($this->session->flashdata('pesan')== TRUE):?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?= $this->session->flashdata('pesan') ?>
        </div>";
    <?php endif ?>
    <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Project</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Selesai</th>
                        <th>Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tampil as $i => $a): ?>
                        <?php if($a->status=="Success"):?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $a->judul ?></td>
                        <td><?= $a->client ?></td>
                        <td><?= $a->deskripsi ?></td>
                        <td><?= $a->tanggal_masuk ?></td>
                        <td><?= $a->tanggal_selesai ?></td>
                        <td><?= $a->level ?></td>
                        <td><?= $a->status ?></td>
                    </tr>
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>
