<?php
// var_dump($DetailBarang);

foreach ($DetailBarang->data  as $row) :
?>
<style>
    .live-chat-intro {
	position: relative;
	z-index: 1;
	background-color: #2a166f;
	padding: 2rem 0;
	text-align: center;
	border-radius: 0 0 3rem 3rem;
}
.live-chat-intro p {
	color: #ffffff;
	margin-bottom: 0.5rem;
}
.live-chat-intro img {
	width: 50px;
	height: 50px;
	border-radius: 50%;
	margin: 0 auto 0.5rem;
	display: block;
}
.live-chat-intro .status {
	position: relative;
	z-index: 1;
	color: #ffffff;
	font-size: 14px;
	display: inline-block;
}
.live-chat-intro .status.online {
	padding-left: 15px;
}
.live-chat-intro .status.online::after {
	position: absolute;
	width: 10px;
	height: 10px;
	background-color: #2a166f;
	border-radius: 50%;
	content: "";
	margin-top: -5px;
	top: 50%;
	left: 0;
	z-index: 10;
}

.agent-message-content {
	position: relative;
	z-index: 1;
	margin-bottom: 1rem;
}
.agent-message-content .agent-thumbnail {
	-webkit-box-flex: 0;
	-ms-flex: 0 0 30px;
	flex: 0 0 30px;
	max-width: 30px;
	width: 30px;
}
.agent-message-content .agent-thumbnail img {
	width: 30px;
	height: 30px;
	border-radius: 50%;
	box-shadow: 0 1px 3px 0 rgba(15, 15, 15, 0.175);
	background-color: #ffffff;
	padding: 2px;
}
.agent-message-content .agent-message-text {
	position: relative;
	z-index: 1;
}
.agent-message-content .agent-message-text span {
	font-size: 12px;
	color: #747794;
	margin-left: 0.5rem;
	margin-top: 0.25rem;
	display: block;
}
.agent-message-content .agent-message-text p {
	display: inline-block;
	margin-bottom: 0;
	background-color: #ffffff;
	padding: 0.75rem 1rem 0.65rem;
	border-radius: 1rem 1rem 1rem 0.25rem;
}

.user-message-content {
	position: relative;
	z-index: 1;
	margin-bottom: 1rem;
}
.user-message-content .user-message-text {
	padding-left: 3rem;
}
.user-message-content .user-message-text p {
	display: inline-block;
	margin-bottom: 0;
	padding: 0.75rem 1rem 0.65rem;
	background-color: #2a166f;
	color: #ffffff;
	border-radius: 1rem 1rem 0.25rem 1rem;
}
.user-message-content .user-message-text span {
	font-size: 12px;
	display: block;
	color: #747794;
	margin-right: 0.5rem;
	margin-top: 0.25rem;
}

.type-text-form {
	
}
.type-text-form .form-control {
	-webkit-transition-duration: 500ms;
	-o-transition-duration: 500ms;
	transition-duration: 500ms;
	width: 100%;
	height: 55px;
	color: #747794;
	font-size: 13px;
}
.type-text-form .form-control:focus {
	border-color: transparent;
}
.type-text-form button[type="submit"] {
	width: 40px;
	height: 55px;
	border: 0;
	font-size: 1rem;
	color: #020310;
	outline: none !important;
}
.type-text-form .file-upload {
	position: absolute;
	width: 40px;
	height: 55px;
	top: 0;
	left: 0;
	z-index: 20;
}
.type-text-form .file-upload input {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 200;
	opacity: 0;
}
.type-text-form .file-upload span {
	position: absolute;
	top: 0;
	left: 0;
	background-color: #ffffff;
	height: 100%;
	width: 100%;
	z-index: 50;
	text-align: center;
	line-height: 55px;
}
</style>
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">HOME </a></li>
                <li><a href="#"><?= $row->nama_kategori ?> </a></li>
                <li class="active"><?= $row->nama_barang ?></li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">



                <!-- Main Content -->
                <div class="col-md-9  col-main">

                    <div class="row">

                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="product-media media-horizontal">

                                <div class="image_preview_container images-large">
                                    <?php
                                    $data_gambar = $row->gambar;
                                    for ($i = 0; $i < 1; $i++) : ?>
                                        <img id="img_zoom" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" data-zoom-image="<?= $data_gambar[$i]->lokasi_gambar ?>" src="<?= $data_gambar[$i]->lokasi_gambar ?>" alt="">
                                        <button class="btn-zoom open_qv"><span>zoom</span></button>
                                    <?php endfor; ?>

                                </div>
                                <div class="product_preview images-small">
                                    <div class="owl-carousel thumbnails_carousel" id="thumbnails" data-nav="true" data-dots="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'>
                                        <?php foreach ($row->gambar  as $gambar) : ?>
                                            <a href="#" data-image="<?=  $gambar->lokasi_gambar ?>" data-zoom-image="<?=  $gambar->lokasi_gambar ?>">
                                                <img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $gambar->lokasi_gambar ?>" data-large-image="<?= $gambar->lokasi_gambar ?>" alt="">
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <!--/ .owl-carousel-->

                                </div>
                                <!--/ .product_preview-->

                            </div><!-- image product -->
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="product-info-main">

                                <h1 class="page-title">
                                    <?= $row->nama_barang ?>
                                </h1>
                                <!-- <div class="product-reviews-summary"> -->
                                <!-- <div class="rating-summary">
                                            <div class="rating-result" title="<?= $row->views ?>%">
                                                <span style="width:<?= $row->views ?>%">
                                                    <span><span><?= $row->views ?></span>% of <span>100</span></span>
                                                </span>
                                            </div>
                                        </div> -->
                                <!-- <div class="reviews-actions"> -->
                                <!-- <a href="#" class="action view">Telah Dilihat <?= $row->views ?> Kali</a> -->
                                <!-- <a href="#" class="action add"><img alt="img" src="<?= base_url('assets/theme2/images/') ?>icon/write.png">&#160;&#160;write a review</a> -->
                                <!-- </div> -->
                                <!-- </div> -->

                                <div class="product-info-price">
                                    <div class="price-box">
                                        <span class="price">Rp.<?php $hasil = $row->harga_jual+$row->ongkos; echo number_format($hasil) ?> </span>
                                        <!-- <span class="old-price">$52.00</span>
                                            <span class="label-sale">-30%</span> -->
                                    </div>
                                </div>
                                <div class="product-code">
                                    <i>Harga dapat berubah sesuai dengan harga pasar yang berlaku.</i>
                                    <!-- Item Code: #453217907 :   -->
                                </div>
                                <div class="product-info-stock">
                                    <div class="stock available">
                                        <span class="label">Stock: </span>Tersedia
                                    </div>
                                </div>
                                <div class="product-condition">
                                    Kadar: <?= number_format($row->kadar_cetak,2) ?><br>
                                    Berat : <?= number_format($row->berat,3) ?> <br>
                                    Harga Barang : <?= number_format($row->harga_jual) ?> <br>
                                    Ongkos Produksi : <?= number_format($row->ongkos) ?> <br>
                                    <!-- Harga Emas : Rp.<?= number_format($row->harga_barang) ?><br> -->
                                    <!-- Barang ini Telah Dilihat Sebanyak <?= $row->views ?> Kali -->
                                </div>
                                <!-- <div class="product-overview">
                                        <div class="overview-content">
                                            Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. 
                                        </div>
                                    </div> -->

                                <div class="product-add-form">
                                    <!-- <p>Available Options:</p> -->
                                    <!-- <form> -->
                                    <div class="product-options-bottom clearfix">

                                        <div class="actions">
                                            <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                                <button onclick="$('.loaderform').show(); location.href='<?= base_url('detail-add-cart/' . encrypt_url($row->kode_barcode)); ?>'" type="submit" title="Add to Cart" class="action btn-cart"><span>Add to Cart</span></button>
                                            <?php elseif ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") : ?>
                                                <button onclick="Swal.fire('Oopss!','Admin tidak bisa menambahkan barang!','warning')" type="button" title="Add to Cart" class="action btn-cart"><span>Add to Cart</span></button>
                                            <?php else : ?>
                                                <button onclick="Swal.fire('Oopss!','Silahkan login terlebih dahulu!','info')" type="button" title="Add to Cart" class="action btn-cart"><span>Add to Cart</span></button>
                                            <?php endif; ?>
                                            <!-- <div class="product-addto-links">

                                                        <a href="#" class="action btn-wishlist" title="Wish List">
                                                            <span>Wishlist</span>
                                                        </a>
                                                        <a href="#" class="action btn-compare" title="Compare">
                                                            <span>Compare</span>
                                                        </a>
                                                    </div> -->
                                        </div>

                                    </div>

                                    <!-- </form> -->
                                </div>
                                <!-- <div class="product-addto-links-second">
                                        <a href="#" class="action action-print">Print</a>
                                        <a href="#" class="action action-friend">Send to a friend</a>
                                    </div>
                                    <div class="share">
                                        <img src="<?= base_url('assets/theme2/images/') ?>media/index1/share.png" alt="share">
                                    </div> -->
                            </div><!-- detail- product -->

                        </div><!-- Main detail -->

                    </div>
                    <!-- product tab info -->

                    <!-- <div class="product-info-detailed ">

                            <ul class="nav nav-pills" role="tablist">
                                <li role="presentation" class="active"><a href="#description"  role="tab" data-toggle="tab">Product Details   </a></li>
                                <li role="presentation"><a href="#tags"  role="tab" data-toggle="tab">information </a></li>
                                <li role="presentation"><a href="#reviews"  role="tab" data-toggle="tab">reviews</a></li>
                                <li role="presentation"><a href="#additional"  role="tab" data-toggle="tab">Extra Tabs</a></li>
                                <li role="presentation"><a href="#tab-cust"  role="tab" data-toggle="tab">Guarantees</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description">
                                    <div class="block-title">Product Details</div>
                                    <div class="block-content">
                                        <p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>
                                        <br>
                                        <p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>
                                        <br>
                                        <p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>
                                        <br>
                                        <p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>
                                   
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tags">
                                    <div class="block-title">information</div>
                                    <div class="block-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                       
                                    
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="reviews">
                                    <div class="block-title">reviews</div>
                                    <div class="block-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                       
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="additional">
                                    <div class="block-title">Extra Tabs</div>
                                    <div class="block-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                       
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab-cust">
                                    <div class="block-title">Guarantees</div>
                                    <div class="block-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Aldus PageMaker including versions of Lorem Ipsum</p>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>   -->

                    <!-- <div class="block-related">
                        <div class="block-title">
                            <strong class="title">Diskusi (0)</strong>
                        </div>
                        <div class="block-content">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <p><?= $row->nama_barang ?></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="box-authentication">
                                Chat
                                <div class="page-content-wrapper">
                                    <div class="live-chat-intro mb-3">
                                        <p>Nama Saya Lisa Admin <br> Toko Mas Hidup</p>
                                    </div>
                                <div class="support-wrapper py-3">
                                <div class="container">
                                    <div id="livechat"></div>
                                </div>
                                </div>
                                </div>
                            <br>
                            <br>
                            <br>
                            <div id="down"></div>
                            <div class="type-text-form">
                                <form id="form-chat" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class='col-md-10' style="padding:0px;">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="2" placeholder="Tanya Penjual ..."></textarea>
                                            </div>
                                            <div class='col-md-2' style="padding:0px;">
                                                <button type="submit" style="right : 20px !important"><i class="fa fa-paper-plane-o"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                End Chat
                            </div>    
                            </div>
                        </div>
                    </div> -->

                    <!-- block-related product -->
                    <div class="block-related ">
                        <div class="block-title">
                            <strong class="title">Rekomendasi Produk Untuk Anda </strong>
                        </div>
                        <div class="block-content ">
                            <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3}}'>
                                <?php
                                // var_dump($DataBarang);
                                // $jml = count($DataBarang->data_barang);
                                // for ($i = 0; $i < $jml; $i++) : 
                                ?>
                                <?php foreach ($DataBarang as $kategori) : ?>
                                    <?php foreach ($kategori->jenis as $jenis) : ?>
                                        <?php foreach ($jenis->barang as $barang) : ?>
                                            <li class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <?php $data_gambar = $barang->gambar;
                                                        for ($i = 0; $i < 1; $i++) : ?>
                                                            <a href="<?= base_url('produk/' . encrypt_url($barang->kode_barcode)) ?>" class="product-item-img">
                                                                <img width="300" height="200" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $data_gambar[$i]->lokasi_gambar ?>"></a>
                                                        <?php endfor; ?>

                                                        <!-- <div class="product-item-actions">
                                                            <a href="#" class="btn btn-wishlist"><span>wishlist</span></a>
                                                            <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                            <a href="#" class="btn btn-quickview"><span>quickview</span></a>
                                                        </div> -->
                                                        <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                                                <button onclick="$('.loaderform').show(); location.href='<?= base_url('detail-add-cart/' . encrypt_url($barang->kode_barcode)); ?>'" class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                                        <?php elseif ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") : ?>
                                                            <button onclick="Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )" class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                                        <?php else : ?>
                                                            <button onclick="Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )" class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="<?= base_url('produk/' . encrypt_url($barang->kode_barcode)) ?>"><?= $barang->nama_barang ?></a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price"> Rp.<?php $baranghasil = $barang->harga_jual+$barang->ongkos; echo number_format($baranghasil) ?></span>
                                                                <!-- <span class="price"> Rp.<?= number_format($barang->harga_jual) ?></span> -->
                                                                <!-- <span class="old-price">$52.00</span> -->
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <!-- <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                            </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <!-- block-related product -->

                    <!-- block-Upsell Products -->
                    <!-- <div class="block-upsell ">
                            <div class="block-title">
                                <strong class="title">You might also like</strong>
                            </div>
                            <div class="block-content ">
                                <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3}}'>
                                    
                                    
                                    <li class="product-item product-item-opt-2">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a href="#" class="product-item-img"><img src="<?= base_url('assets/theme2/images/') ?>media/detail/Upsell2-1.jpg" alt="product name"></a>
                                                <div class="product-item-actions">
                                                    <a href="#" class="btn btn-wishlist"><span>wishlist</span></a>
                                                    <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                    <a href="#" class="btn btn-quickview"><span>quickview</span></a>
                                                </div>
                                                <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="#">Leather Swiss Watch</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                        <span class="old-price">$52.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li class="product-item product-item-opt-2">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a href="#" class="product-item-img"><img src="<?= base_url('assets/theme2/images/') ?>media/detail/Upsell2-2.jpg" alt="product name"></a>
                                                <div class="product-item-actions">
                                                    <a href="#" class="btn btn-wishlist"><span>wishlist</span></a>
                                                    <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                    <a href="#" class="btn btn-quickview"><span>quickview</span></a>
                                                </div>
                                                <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                                
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="#">Sport T-Shirt For Men</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                        <span class="old-price">$52.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-item-opt-2">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a href="#" class="product-item-img"><img src="<?= base_url('assets/theme2/images/') ?>media/detail/Upsell2-3.jpg" alt="product name"></a>
                                                <div class="product-item-actions">
                                                    <a href="#" class="btn btn-wishlist"><span>wishlist</span></a>
                                                    <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                    <a href="#" class="btn btn-quickview"><span>quickview</span></a>
                                                </div>
                                                <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                               
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="#">Fashion Leather Handbag</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                        <span class="old-price">$52.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-item-opt-2">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a href="#" class="product-item-img"><img src="<?= base_url('assets/theme2/images/') ?>media/detail/Upsell2-3.jpg" alt="product name"></a>
                                                <div class="product-item-actions">
                                                    <a href="#" class="btn btn-wishlist"><span>wishlist</span></a>
                                                    <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                    <a href="#" class="btn btn-quickview"><span>quickview</span></a>
                                                </div>
                                                <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                                
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="#">Fashion Leather Handbag</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                        <span class="old-price">$52.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                
                                </ol>
                            </div>
                        </div> -->
                    <!-- block-Upsell Products -->

                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class=" col-md-3   col-sidebar">

                    <!-- Block  bestseller products-->
                    <div class="block-sidebar block-sidebar-categorie">
                        <div class="block-title">
                            <strong>KATEGORI PRODUK</strong>
                        </div>
                        <div class="block-content">
                            <ul class="items">
                                <?php
                                // var_dump($kategori->data);
                                $kategori = $KategoriBarang->data;
                                for ($i = 0; $i < count($KategoriBarang->data); $i++) : ?>
                                    <li class="parent">
                                        <a href="<?= base_url('carikategori/' . encrypt_url($kategori[$i]->kode_kategori) . '/' . encrypt_url($kategori[$i]->nama_kategori)) ?>"> <?= $kategori[$i]->nama_kategori ?></a>
                                        <span class="toggle-submenu"></span>
                                        <ul class="subcategory">
                                            <?php foreach ($kategori[$i]->jenis  as $rowdetaimenu) : ?>
                                                <li><a href="<?= base_url('carijenis/' . encrypt_url($rowdetaimenu->kode_jenis) . '/' . encrypt_url($rowdetaimenu->nama_jenis)) ?>"><?= $rowdetaimenu->nama_jenis ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div><!-- Block  bestseller products-->

                    <!-- Block  bestseller products-->
                    <div class="block-sidebar block-sidebar-products">
                        <div class="block-title">
                            <strong>Produk Baru</strong>
                        </div>
                        <div class="block-content">
                            <div class="owl-carousel" data-nav="false" data-dots="true" data-margin="0" data-autoplayTimeout="700" data-autoplay="true" data-loop="true" data-responsive='{
                                "0":{"items":1},
                                "420":{"items":1},
                                "480":{"items":2},
                                "600":{"items":2},
                                "992":{"items":1}
                                }'>
                                <div class="item">
                                    <?php if ($BarangBaru == null) : ?>
                                        Tidak Ada Barang Baru Hari Ini
                                    <?php else : ?>
                                        <?php $Z = 0; ?>
                                        <?php foreach ($BarangBaru->data  as $brgbaru) : ?>
                                            <?php if ($Z < 4) : ?>
                                                <div class="product-item product-item-opt-2">
                                                    <div class="product-item-info">
                                                        <div class="product-item-photo">
                                                            <a class="product-item-img" href="<?= base_url('produk/' . encrypt_url($brgbaru->kode_barcode)) ?>">
                                                                <?php $data_gambar = $brgbaru->gambar;
                                                                for ($i = 0; $i < 1; $i++) : ?>
                                                                    <img alt="product name" width="150" height="100" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $data_gambar[$i]->lokasi_gambar ?>">
                                                                <?php endfor; ?>
                                                            </a>
                                                        </div>
                                                        <div class="product-item-detail">
                                                            <strong class="product-item-name"><a href="<?= base_url('produk/' . encrypt_url($brgbaru->kode_barcode)) ?>"><?= $brgbaru->nama_barang ?></a></strong>
                                                            <div class="clearfix">
                                                                kadar <?= $brgbaru->kadar ?><br>
                                                                Berat <?= $brgbaru->berat ?><br>
                                                                <!-- Harga Barang <?= $brgbaru->harga_jual ?><br> -->
                                                                <div class="product-item-price">
                                                                    <span class="price">Rp.<?php $brgbaruhasil = $brgbaru->harga_jual+$brgbaru->ongkos; echo number_format($brgbaruhasil) ?></span>
                                                                    <!-- <span class="price">Rp.<?= number_format($brgbaru->harga_jual) ?></span> -->
                                                                </div>
                                                                <div class="product-reviews-summary">
                                                                    <div class="rating-summary">
                                                                        <!-- <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of <span>100</span></span>
                                                                        </span>
                                                                    </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $Z++;
                                            endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- Block  bestseller products-->

                </div><!-- Sidebar -->

            </div>
        </div>


    </main><!-- end MAIN -->
<?php endforeach; ?>

<script>
$(document).ready(function() {
    $('#livechat').append(`
    <div class="live-chat-wrapper">
                <div class="agent-message-content d-flex align-items-center">
                    <div class="agent-thumbnail mr-2"></div>
                    <div class="agent-message-text">
                        <p>Selmat siang Saya Lisa, Apakah ada yang bisa saya bantu ???</p>
                        <span>12:00</span>
                    </div>
                </div>
                <div class="user-message-content">
                    <div class="user-message-text">
                        <p> Okey Mantap!</p><span>12:09</span>
                    </div>
                </div>
            </div>
    `)
});

// $("#message").keypress(function(e) {
//     if (e.which == 13) {
//         //submit form via ajax, this is not JS but server side scripting so not showing here
//         let data = $("#message").val();
//         // setTimeout(() => {
//         let Jam = new Date().getHours();
//         let Menit = new Date().getMinutes();
//         $('#livechat').append(`
//          <div class="user-message-content">
//                     <div class="user-message-text">
//                         <p> ` + data + `</p><span>` + Jam + `:` + Menit + `</span>
//                     </div>
//                 </div>
//     `)
//         $("#message").val("");
//         window.scrollTo(0, document.body.scrollHeight);
//     }
// });

$('#form-chat').submit(function(e) {
    e.preventDefault();
    let data = $("#message").val();
    // setTimeout(() => {
    let Jam = new Date().getHours();
    let Menit = new Date().getMinutes();
    $('#livechat').append(`
         <div class="user-message-content">
                    <div class="user-message-text">
                        <p> ` + data + `</p><span>` + Jam + `:` + Menit + `</span>
                    </div>
                </div>
    `)
    $("#message").val("");
    window.scrollTo(0, document.body.scrollHeight);
    // $.ajax({
    //     url: base_url + '/save-konfirmasi',
    //     type: "post",
    //     data: new FormData(this),
    //     processData: false,
    //     contentType: false,
    //     cache: false,
    //     async: false,
    //     success: function(data) {
    //     }               
    // });
    // }, 3000);

});
</script>