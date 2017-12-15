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
            <div class="panel-title">
                <i class="zmdi zmdi-assignment"></i> Detail Penyewaan Anda
                <div class="pull-right">
                    <?=$pembayaran->status == 0 ?
                    '<label class="label label-danger">BELUM DIBAYAR</label>':
                    '<label class="label label-success">DIBAYAR</label>'
                    ?>
                </div>
            </div>
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
                    <td><?=$sewa->tanggal_mulai?></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td><?=$sewa->tanggal_selesai?></td>
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
            <div class="panel-title"><i class="zmdi zmdi-assignment"></i> Informasi Tambahan</div>
        </div>
        <div class="panel-body">
            <h3>Informasi Penyewa</h3>
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td><?=$customer->nama_depan.' '.$customer->nama_belakang?></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td><?=$customer->email?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td><?=$customer->HP?></td>
                </tr>
            </table>
            <br>
            <br>
            <h3>Silahkan Lakukan Pembayaran Ke</h3>
            <table class="table">
                <tr>
                    <td>Nama Bank</td>
                    <td>Bank Rakyat Indonesia (BRI)</td>
                </tr>
                <tr>
                    <td>Nomor Rekening</td>
                    <td>123 456 789 1011</td>
                </tr>
                <tr>
                    <td>Atas Nama</td>
                    <td>CV. DolankuyDotCom</td>
                </tr>
            </table>
        </div>
    </div>
</div>