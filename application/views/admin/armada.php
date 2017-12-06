<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
	<h4 class="page-title">Data Armada</h4>
</div>

<div class="col-md-12">
    <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <button type="button" class="btn btn-info waves-effect waves-light w-md m-b-15">Tambah Data</button>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga Sewa</th>
                                        <th>Status</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($armada as $armadas) { ?>
                                    <tr>
                                        <td><?=$armadas['id']?></td>
                                        <td><?=$armadas['nama']?></td>
                                        <td><?=$armadas['harga_sewa']?></td>
                                        <td><?=$armadas['status']?></td>
                                        <td><button class="btn btn-primary waves-effect waves-light btn-xs m-r-10"><i class="zmdi zmdi-edit"></i> Ubah</button><button class="btn btn-danger waves-effect waves-light btn-xs"><i class="zmdi zmdi-delete"></i> Hapus</button></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>