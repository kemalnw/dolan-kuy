<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if ($this->session->flashdata()) {
?>
<script type="text/javascript">
    $(document).ready(function() {
        swal("Oops!", "<?=$this->input->get('msg')?>", "<?=$this->input->get('type')?>");
    });
</script>
<?php
}
?>
<div class="col-md-8">
    <div class="panel panel-color panel-info">
        <div class="panel-heading bg-purple">
            <div class="panel-title"><i class="zmdi zmdi-assignment"></i> Detail Penyewaan Anda</div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div >
                        <address>
                            <strong>DolanKuy.com</strong><br>
                            Jalan Ahmad Yani, Pabelan, Kartasura<br>
                            Kota Surakarta<br>
                            Jawa Tengah<br>
                            57162<br>
                        </address>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?=base_url('assets/images/logos_black.png');?>" width="350">
                </div>
            </div>
            <table class="table">
                <tr>
                    <td>Nama Armada</td>
                    <td><?=$armada->nama?></td>
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><?=$this->input->get('fromDate')?></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td><?=$this->input->get('toDate')?></td>
                </tr>
                <tr>
                    <td>Jumlah Hari</td>
                    <td><?=$hari?> Hari</td>
                </tr>
                <tr>
                    <td>Jumlah Crew Pada Perjalanan</td>
                    <td>5 Orang</td>
                </tr>
            </table>
        </div>
        <div class="panel-footer">
            <strong>TOTAL</strong> *Sudah termasuk pajak & belum termasuk biaya pelayanan
            <span class="pull-right"><b>Rp. <?=number_format( $armada->harga_sewa, 0 , '' , ',' ). ',-'?></b></span>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-color panel-info">
        <div class="panel-heading bg-purple">
            <div class="panel-title"><i class="zmdi zmdi-bus"></i> Tentang Armada</div>
        </div>
        <div class="panel-body">
            <img src="<?=base_url('assets/images/logos_black.png');?>" class="m-b-30" width="300">
            <table class="table">
                <tr>
                    <td>Nama Armada</td>
                    <td><?=$armada->nama?></td>
                </tr>
                <tr>
                    <td>Tahun Pembuatan</td>
                    <td><?=$armada->thn_pembuatan?></td>
                </tr>
                <tr>
                    <td>Maksimal Penumpang</td>
                    <td><?=$armada->penumpang?></td>
                </tr>
                <tr>
                    <td>Maksimal Barang Bawaan</td>
                    <td><?=$armada->barang?></td>
                </tr>
            </table>
            <p><?=word_limiter($armada->description, 40,' ...')?></p>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="panel panel-color panel-info">
        <div class="panel-heading bg-purple">
            <div class="panel-title"><i class="zmdi zmdi-assignment"></i> Informasi Kontak yang Dapat Dihubungi</div>
        </div>
        <div class="panel-body">
            <div id="signup">
                <?=form_open('/rent/store/signup?armada='.$this->input->get('armada').'&regionalArea='.$this->input->get('regionalArea').'&fromDate='.$this->input->get('fromDate').'&toDate='.$this->input->get('toDate').'&car='.$this->input->get('car'))?>
                <button type="button" class="btn btn-block btn-primary waves-effect waves-light m-b-15" id="login">Masuk Untuk Percepat Proses Ini</button>
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
                            <label for="password" class="control-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hp" class="control-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="hp" id="hp" placeholder="Contoh : 0821xxxx">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="alamat" class="control-label">Alamat Tempat Tinggal</label>
                            <textarea class="form-control autogrow" name="alamat" id="alamat" placeholder="Alamat Tempat Tinggal" style="overflow: hidden; word-wrap: break-word; resize: vertical; height: 104px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin pull-right">
                            <button type="submit" class="btn btn-success btn-flat wafes-effect wafes-light">Sewa Sekarang</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div id="signin" style="display:none;">
            <?=form_open('/rent/store/signin?armada='.$this->input->get('armada').'&regionalArea='.$this->input->get('regionalArea').'&fromDate='.$this->input->get('fromDate').'&toDate='.$this->input->get('toDate').'&car='.$this->input->get('car'))?>
            <button type="button" class="btn btn-block btn-primary waves-effect waves-light m-b-15" id="daftar">Daftar Untuk Customer Baru</button>
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
                            <label for="password" class="control-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin pull-right">
                            <button type="submit" class="btn btn-success btn-flat wafes-effect wafes-light">Sewa Sekarang</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>