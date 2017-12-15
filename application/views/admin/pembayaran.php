<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
    <h4 class="page-title">Data Pembayaran</h4>
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
                            <th>Customer</th>
                            <th>Armada</th>
                            <th>Jumlah Dibayar</th>
                            <th>Status</th>
                            <th>Waktu Pembayaran</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data_pembayaran as $pembayaran) { ?>
                        <tr>
                            <td><?=$pembayaran['id']?></td>
                            <td><?=$pembayaran['nama_customer']?></td>
                            <td><?=$pembayaran['nama_armada']?></td>
                            <td><?=$pembayaran['total_biaya']?></td>
                            <td><?=$pembayaran['status'] == 1 ? '<label class="label label-success">LUNAS</label>':'<label class="label label-danger">Belum Dibayar</label>'?></td>
                            <td><?=date('d-m-Y H:i:s', strtotime($pembayaran['waktu']))?></td>
                            <td><a class="btn btn-success waves-effect waves-light btn-xs m-r-10" href="<?=base_url('admin/dataPembayaran/'.$pembayaran['id'].'/ACCEPT')?>"><i class="zmdi zmdi-check"></i> Terima</a><a class="btn btn-danger waves-effect waves-light btn-xs" href="<?=base_url('admin/dataPembayaran/'.$pembayaran['id'].'/DELETE')?>"><i class="zmdi zmdi-delete"></i> Hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div id="editDataArmadas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editDataArmadas" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?=form_open('ajax/editDataArmada', 'id="editDataArmada"')?>
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Data Armada</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_armada" class="control-label">Nama Armada</label>
                                        <input type="text" class="form-control" name="nama_armada" id="nama_armada" placeholder="Nama Armada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price" class="control-label">Harga Sewa</label>
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Harga Sewa">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="editstatus" class="control-label">Status Armada</label>
                                        <select name="status" id="editstatus" class="form-control">
                                            <option value="1">Tersedia</option>
                                            <option value="0">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group no-margin">
                                        <label for="desc" class="control-label">Deskripsi</label>
                                        <textarea class="form-control autogrow" name="desc" id="desc" placeholder="Deskripsikan tentang armada ini" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="tambahArmada" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahArmada" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?=form_open('ajax/addArmada', 'id="addArmada"')?>
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Armada</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_armada" class="control-label">Nama Armada</label>
                                        <input type="text" class="form-control" name="nama_armada" id="nama_armada" placeholder="Nama Armada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price" class="control-label">Harga Sewa</label>
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Harga Sewa">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status" class="control-label">Status Armada</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Tersedia</option>
                                            <option value="0">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group no-margin">
                                        <label for="desc" class="control-label">Deskripsi</label>
                                        <textarea class="form-control autogrow" name="desc" id="desc" placeholder="Deskripsikan tentang armada ini" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>