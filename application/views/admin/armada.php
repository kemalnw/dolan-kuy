<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
	<h4 class="page-title">Data Armada</h4>
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
                <button class="btn btn-primary waves-effect waves-light w-md m-b-15" data-toggle="modal" data-target="#tambahArmada"><i class="zmdi zmdi-file-plus"></i> Tambah Data</button>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tersedia Di Kota</th>
                            <th>Harga Sewa</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($armada as $armadas) { ?>
                        <tr>
                            <td><?=$armadas['id']?></td>
                            <td><?=$armadas['nama']?></td>
                            <td><?=$armadas['kota']?></td>
                            <td><?=$armadas['harga_sewa']?></td>
                            <td><?=$armadas['status'] == 1 ? '<label class="label label-success">Tersedia</label>':'<label class="label label-danger">Tidak Tersedia</label>'?></td>
                            <td><?=$armadas['description']?></td>
                            <td><button class="btn btn-primary waves-effect waves-light btn-xs m-r-10" data-toggle="modal" data-target="#editDataArmadas" onclick="getArmadaInfo('<?=$armadas['id']?>');"><i class="zmdi zmdi-edit"></i> Ubah</button><a class="btn btn-danger waves-effect waves-light btn-xs" href="<?=base_url('admin/dataArmada/'.$armadas['id'].'/DELETE')?>"><i class="zmdi zmdi-delete"></i> Hapus</a></td>
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
                        <?=form_open_multipart('ajax/editDataArmada', 'id="editDataArmada"')?>
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
                                        <label for="kota" class="control-label">Tersedia Di Kota</label>
                                        <select class="form-control select2" id="kota" name="kota" data-placeholder="Tentukan Lokasi ...">
                                            <option></option>
                                            <option value="Surakarta">Surakarta</option>
                                            <option value="DKI Jakarta">DKI Jakarta</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Surabaya">Surabaya</option>
                                        </select>
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
                                        <label for="gambar" class="control-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar" id="gambar">
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
                        <?=form_open_multipart('ajax/addArmada', 'id="addArmada"')?>
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
                                        <label for="kota" class="control-label">Tersedia Di Kota</label>
                                        <select class="form-control select2" id="kota" name="kota" data-placeholder="Tentukan Lokasi ...">
                                            <option></option>
                                            <option value="Surakarta">Surakarta</option>
                                            <option value="DKI Jakarta">DKI Jakarta</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Surabaya">Surabaya</option>
                                        </select>
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
                                        <label for="gambar" class="control-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar" id="gambar">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tahun" class="control-label">Tahun Pembuatan</label>
                                        <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun Pembuatan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="penumpang" class="control-label">Maksimal Penumpang</label>
                                        <input type="number" class="form-control" name="penumpang" id="penumpang" placeholder="Jumlah Penumpang Maksimal">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="barang" class="control-label">Maksimal Barang Bawaan</label>
                                        <input type="number" class="form-control" name="barang" id="barang" placeholder="Maksimal Beban Barang">
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