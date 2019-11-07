<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel-group">
			  	<div class="card">
			  		<div class="card-header">
						<h4 class="card-title">View Project</h4>
					</div>
			  		<form action="<?= site_url('pemilihan') ?>" method="post">
				  		<div class="panel-body">
					        <div class="form-group">
					        	<label>Nama Project</label>
					        	<input type="hidden" name="id" value="<?= $id->id_project ?>">
					            <input type="text" name="judul" class="form-control" value="<?= $id->judul ?>">
					        </div>
					        <div class="form-group">
					        <label>Nama Client</label>
					            <input type="text" name="client" value="<?= $id->client ?>" class="form-control">
					        </div>
					        <div class="form-group">
					        <label>Deskripsi</label>
					            <textarea name="deskripsi" class="form-control"><?= $id->deskripsi ?></textarea>
					            <input type="hidden" name="tanggal_masuk" value="<?= $id->tanggal_masuk ?>">
					            <input type="hidden" name="level" value="<?= $id->level ?>">
					        </div>
					        <div class="form-group">
					        <label>Nama Client</label>
					            <input type="text" name="tanggal_selesai" value="<?= $id->tanggal_selesai ?>" class="form-control">
					        </div>
					        <div class="form-group">
					        <label>Programer</label>
					        	<select name="programer" class="form-control">
					        		<option>-PILIH-</option>
					        		<?php foreach($programer as $a):?>
					        		<option value="<?= $a->id_programer ?>"><?= $a->nama ?></option>
					        		<?php endforeach ?>
					        	</select>
					        </div>
					        <div align="right" class="form-group">
					        	<input type="submit" name="simpan" value="Proses" class="btn btn-success">
					        </div>
				        </div>
				    </form>
			       </div>
			</div>
		</div>
		<div class="col-md-8">
		     <div class="card">
				<div class="card-header">
					<h4 class="card-title">Pending</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatables" class="display table table-striped table-hover" >
		                <thead>
		                    <tr>
		                        <th>Name</th>
		                        <th>Project</th>
		                        <th>Tanggal Masuk</th>
		                        <th>Tangal Selesai</th>
		                        <th>Status</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php foreach($status as $a):?>
		                	<?php if($a->status=='Pending'):?>
		                    <tr>
		                        <td><?= $a->nama ?></td>
		                        <td><?= $a->judul ?></td>
		                        <td><?= $a->tanggal_masuk ?></td>
		                        <td><?= $a->tanggal_selesai ?></td>
		                        <td><?= $a->status ?></td>
		                    </tr>
		                <?php endif ?>
		                    <?php endforeach ?>
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>

		<div class="card">
				<div class="card-header">
					<h4 class="card-title">Proses</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatables" class="display table table-striped table-hover" >
		                <thead>
		                    <tr>
		                        <th>Name</th>
		                        <th>Project</th>
		                        <th>Tanggal Masuk</th>
		                        <th>Tangal Selesai</th>
		                        <th>Status</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<?php foreach($status as $a):?>
		                	<?php if($a->status=='Proses'):?>
		                    <tr>
		                        <td><?= $a->nama ?></td>
		                        <td><?= $a->judul ?></td>
		                        <td><?= $a->tanggal_masuk ?></td>
		                        <td><?= $a->tanggal_selesai ?></td>
		                        <td><?= $a->status ?></td>
		                    </tr>
		                <?php endif ?>
		                    <?php endforeach ?>
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>				
	</div>
</div>