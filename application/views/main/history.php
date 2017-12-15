<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
    <h3>Riwayat Pernyewaan</h3>
</div>
<div class="col-md-12">
    <div class="card-box table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama Armada</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Biaya Sewa</th>
                    <th>Status Pembayaran</th>
                    <th>Status Sewa</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($history as $data) {
                ?>
                <tr>
                    <td><a href="<?=base_url('detail/'.$data['id'])?>"><?=$data['nama']?></a></td>
                    <td><?=$data['tanggal_mulai']?></td>
                    <td><?=$data['tanggal_selesai']?></td>
                    <td><?=$data['total_biaya']?></td>
                    <td><?=$data['status_pembayaran'] == 1 ? '<label class="label label-success">LUNAS</label>':'<label class="label label-danger">Belum Dibayar</label>'?></td>
                    <td><?=$data['status_sewa'] == 1 ? '<label class="label label-success">Selesai</label>':'<label class="label label-info">Sedang Proses</label>'?></td>
                    <td><?=$data['createAt']?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>