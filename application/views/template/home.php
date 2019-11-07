<?php
function getBulan($bln){

                switch ($bln){

                    case 1: 

                        return "Januari";

                        break;

                    case 2:

                        return "Februari";

                        break;

                    case 3:

                        return "Maret";

                        break;

                    case 4:

                        return "April";

                        break;

                    case 5:

                        return "Mei";

                        break;

                    case 6:

                        return "Juni";

                        break;

                    case 7:

                        return "Juli";

                        break;

                    case 8:

                        return "Agustus";

                        break;

                    case 9:

                        return "September";

                        break;

                    case 10:

                        return "Oktober";

                        break;

                    case 11:

                        return "November";

                        break;

                    case 12:

                        return "Desember";

                        break;

                }

            } 
            function tgl_indo($tgl){

            $tanggal = substr($tgl,8,2);

            $bulan = getBulan(substr($tgl,5,2));

            $tahun = substr($tgl,0,4);

            return $tanggal.' '.$bulan.' '.$tahun;       

    }   
?>
<br>
<div class="row">
	<div class="col-md-12">
	     <div class="card">
            <div class="card-header">
                <h4 class="card-title">Status Pending</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="display table table-striped table-hover" >
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Project</th>
	                        <th>Tanggal Masuk</th>
	                        <th>Selesai</th>
	                        <th>Status</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($kar as $a ):?>
	                		<?php if($a->status == 'Pending'):
	                			$tanggall = $a->tanggal_masuk;
	                			$tanggalll = $a->tanggal_selesai
	                			?>
	                    <tr>
	                        <td><?= $a->nama ?></td>
	                        <td><?= $a->judul ?></td>
	                        <td><?= tgl_indo($tanggall) ?></td>
	                        <td><?= tgl_indo($tanggalll) ?></td>
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

	<div class="col-md-12">
	     <div class="card">
            <div class="card-header">
                <h4 class="card-title">Status Proses</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="display table table-striped table-hover" >
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Project</th>
	                        <th>Tanggal Masuk</th>
	                        <th>Selesai</th>
	                        <th>Status</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($kar as $a ):?>
	                		<?php if($a->status == 'Proses'):?>
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

	<div class="col-md-12">
	     <div class="card">
            <div class="card-header">
                <h4 class="card-title">Status Success</h4>
					<a href="<?= site_url('Admin_c/export') ;?>">
						<i class="fas fa-print" style="font-size:20px;"></i>
					</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Project</th>
	                        <th>Tanggal Masuk</th>
	                        <th>Selesai</th>
	                        <th>Status</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($kar as $a ):?>
	                		<?php if($a->status == 'Success'):?>
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