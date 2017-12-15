<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
	<h4 class="page-title">Data Customer</h4>
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
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Nama Lengkap</th>
                            <th>E-mail</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($customer as $cust) { ?>
                        <tr>
                            <td><?=$cust['id']?></td>
                            <td><?=$cust['nama_depan']?></td>
                            <td><?=$cust['nama_belakang']?></td>
                            <td><?=$cust['nama_depan']?> <?=$cust['nama_belakang']?></td>
                            <td><?=$cust['email']?></td>
                            <td><?=$cust['HP']?></td>
                            <td><?=$cust['alamat']?></td>
                            <td><button class="btn btn-primary waves-effect waves-light btn-xs m-r-10" data-toggle="modal" data-target="#editDataCustomers" onclick="getCustomerInfo('<?=$cust['id']?>');"><i class="zmdi zmdi-edit"></i> Ubah</button><a class="btn btn-danger waves-effect waves-light btn-xs" href="<?=base_url('admin/dataCustomers/'.$cust['id'].'/DELETE')?>"><i class="zmdi zmdi-delete"></i> Hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div id="editDataCustomers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editDataCustomers" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?=form_open('ajax/editDataCustomer', 'id="editDataCustomer"')?>
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Data Customers</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="uid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_depan" class="control-label">Nama Depan</label>
                                        <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_belakang" class="control-label">Nama Belakang</label>
                                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Alamat E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Alamat E-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hp" class="control-label">Nomor HandPhone</label>
                                        <input type="text" class="form-control" name="hp" id="hp" placeholder="Nomor HandPhone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group no-margin">
                                        <label for="alamat" class="control-label">Alamat Tempat Tinggal</label>
                                        <textarea class="form-control autogrow" name="alamat" id="alamat" placeholder="Alamat Tempat Tinggal" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
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
    </div>
</div>