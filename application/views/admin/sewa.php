<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
	<h4 class="page-title">Data Sewa</h4>
</div>
<?php
if ($this->session->flashdata()) {
?>
<script type="text/javascript">
    $(document).ready(function() {
        swal("<?=$this->input->get('error') ? 'Oops!':'Hoorayy'?>", "<?=$this->input->get('msg')?>", "<?=$this->input->get('type')?>");
    });
</script>
<?php
}
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Customer</th>
                            <th>Nama Armada</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data_sewa as $sewa) { ?>
                        <tr>
                            <td><?=$sewa['id']?></td>
                            <td><?=$sewa['nama_depan']?> <?=$sewa['nama_belakang']?></td>
                            <td><?=$sewa['nama']?></td>
                            <td><?=$sewa['tanggal_mulai']?></td>
                            <td><?=$sewa['tanggal_selesai']?></td>
                            <td><?=$sewa['status'] == 1 ? '<label class="label label-success">Selesai</label>':'<label class="label label-info">Sedang Proses</label>'?></td>
                            <td><a class="btn btn-success waves-effect waves-light btn-xs" href="<?=base_url('admin/dataSewa/'.$sewa['id'].'/FINISH')?>"><i class="zmdi zmdi-check"></i> Tandai Selesai</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>