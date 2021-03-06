<div class="page-content-wrapper">
<div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">Semua Kategori</h6>
            </div>
            <div class="product-catagory-wrap">
                <div class="row">
                    <?php 
                    $data = $KategoriBarang->data;
                    $jml = count($data);
                    for($i=0; $i<$jml; $i++):?>
                    <?php if($data[$i]!= null): ?>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                            <div class="card-body">
                                <a onclick="$('.loaderform').show();"
                                    href="<?= base_url('carikategori/' . encrypt_url($data[$i]->kode_kategori).'/'. encrypt_url($data[$i]->nama_kategori)) ?>">
                                    <img src="<?= $data[$i]->icon?>" width="100px"><span><?= $data[$i]->nama_kategori ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    </div>