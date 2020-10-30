
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="our-team">
					<div class="pic">
						<img src="<?= base_url('assets/logo/LogoHeader.png') ?>" width="500px" alt="">
                    </div><br>
                    <!-- <h3 style="color: azure;">"System Integrator yang merupakan lembaga <br>konsultan dalam bidang teknologi informasi dan manajemen " -->
                    </h3>
				</div>
            </div>
            <br>
            <div class="col-md-12 col-sm-12" align="center">
            <br>
                        <img src="<?= base_url('assets/logo/diamond.png') ?>"><br>
                       <h3>LOKASI TOKO <?= $DataPerusahaan->data[0]->nama_perusahaan ?> </h3>
                       <p><?= $DataPerusahaan->data[0]->alamat ?></p>
                       <p><?= $DataPerusahaan->data[0]->no_hp ?></p>
                       <p><?= $DataPerusahaan->data[0]->email ?></p>
            </div>

            <iframe src=" <?= $DataPerusahaan->data[0]->lokasi ?>" width="1500" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>


