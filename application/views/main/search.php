<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
    <div class="panel panel-color panel-default" style="margin-bottom: 50px; margin-top: 30px;">
        <div class="panel-heading bg-purple">
            <center><div class="panel-title" style="font-size: 70px;">
                <img src="<?=base_url('assets/images/logos.png');?>">
            </div></center>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-color panel-info">
        <div class="panel-body">
            <?= form_open('search', array('method'=>'get')) ?>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lokasi Penjemputan</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <select class="form-control select2" placeholder="Tentukan Lokasi ..." data-placeholder="Tentukan Lokasi ..." name="regionalArea">
                            <option></option>
                            <option value="Surakarta"<?=$this->input->get('regionalArea') == 'Surakarta' ? ' selected="selected"':NULL?>>Surakarta</option>
                            <option value="DKI Jakarta"<?=$this->input->get('regionalArea') == 'DKI Jakarta' ? ' selected="selected"':NULL?>>DKI Jakarta</option>
                            <option value="Bandung"<?=$this->input->get('regionalArea') == 'Bandung' ? ' selected="selected"':NULL?>>Bandung</option>
                            <option value="Surabaya"<?=$this->input->get('regionalArea') == 'Surabaya' ? ' selected="selected"':NULL?>>Surabaya</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row input-daterange">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="fromDate" class="form-control pull-right" autocomplete="off" value="<?=$this->input->get('fromDate')?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="toDate" class="form-control pull-right" autocomplete="off" value="<?=$this->input->get('toDate')?>">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jumlah Mobil</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-car"></i>
                                </div>
                                <input type="number" class="form-control" name="car" max="4" min="0" value="<?=$this->input->get('car')?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label></label>
                            <button id="btn" class="btn btn-primary waves-effect waves-light btn-lg m-b-5">Cari Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<?php
if (isset($pencarian)) {
?>
<div class="col-md-12">
    <div class="card-box">
        <p><?=$total?> results in {elapsed_time} seconds</p>
        <br>
        <?php
        if ($total < 1) {
            echo "<center><h2>Data Tidak Ditemukan</h2></center>";
        } else {
            foreach ($pencarian as $armada) {
        ?>
        <div class="panel panel-custom panel-border">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 25px !important;"><?=$armada['nama']?></h3>
            </div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-left">
                        <img src="<?=base_url('assets/images/gallery/armada/'.$armada['img_name'])?>" class="media-object" style="width:250px;height:200px;">
                    </div>
                    <div class="media-body">
                        <p><?=word_limiter($armada['description'], 500,' ...')?></p>
                        <div class="row">
                            <div class="col-md-6" style="font-size: 20px;">
                                <span data-toggle="tooltip" data-placement="right" title="" data-original-title="Maksimal Penumpang" style="margin-right: 10px;"><i class="zmdi zmdi-accounts"></i> <?=$armada['penumpang']?></span>
                                <span data-toggle="tooltip" data-placement="right" title="" data-original-title="Maksimal Barang Bawaan" style="margin-right: 10px;"><i class="zmdi zmdi-case"></i> <?=$armada['barang']?></span>
                                <span data-toggle="tooltip" data-placement="right" title="" data-original-title="Crew Saat Perjalanan"><i class="zmdi zmdi-male-alt"></i> 5</span>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <a class="btn btn-info btn-squere" href="<?=base_url('rent?armada='.$armada['id'].'&'.$_SERVER['QUERY_STRING'])?>">Rp. <?=number_format( $armada['harga_sewa'], 0 , '' , ',' ). ',-'?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<?php
}
?>