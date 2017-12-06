<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
			<div class="item active">
				<img src="<?=base_url('assets/images/slider/slide1.png')?>" height="100%" width="204" style="width: 100%">
			</div>

			<div class="item">
				<img src="<?=base_url('assets/images/slider/slide2.png')?>" height="100%" width="204" style="width: 100%">
			</div>

			<div class="item">
				<img src="<?=base_url('assets/images/slider/banner_jakarta.jpg')?>" height="100%" width="204" style="width: 100%">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	<div class="panel panel-color panel-info">
		<div class="panel-heading">
			<center><div class="panel-title" style="font-size: 20px;">Tentukan Perjalanan Anda</div></center>
		</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="form-group">
					<label>Lokasi Penjemputan</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-map-marker"></i>
						</div>
						<select class="form-control select2" data-placeholder="Tentukan Lokasi ...">
							<option>Surakarta</option>
							<option>DKI Jakarta</option>
							<option>Bandung</option>
							<option>Surabaya</option>
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
                          <input type="text" name="fromDate" class="form-control pull-right" autocomplete="off">
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
                          <input type="text" name="toDate" class="form-control pull-right" autocomplete="off">
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
								<input type="number" class="form-control" name="" max="4" min="0">
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
		</div>
	</div>
</div>
<div class="col-md-12">
	
</div>
<div class="col-md-12" style="margin-top: 30px;">
	<h1 align="center" style="margin-bottom: 50px;">Destinasi Favorit</h1>
	<div class="col-md-4">
		<div class="panel panel-custom panel-border">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">DKI Jakarta</h3>
            </div>
            <img src="<?=base_url('assets/images/gallery/jakarta.jpg')?>" width="100%" height="277">
        </div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-custom panel-border">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Surabaya</h3>
            </div>
            <img src="<?=base_url('assets/images/gallery/surabaya.jpg')?>" width="100%" height="277">
        </div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-custom panel-border">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Bali</h3>
            </div>
            <img src="<?=base_url('assets/images/gallery/bali.png')?>" width="100%" height="277">
        </div>
	</div>
</div>
<div class="col-md-12" style="margin-top: 30px;">
	<h1 align="center" style="margin-bottom: 50px;">Partner Pembayaran</h1>
</div>