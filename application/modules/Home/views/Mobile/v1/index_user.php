<div class="container">
            <div class="text-center">
                <div class="figure-profile shadow my-4">
                    <figure><img src="<?= base_url('assets/mobile/img/') ?>user1.png" alt=""></figure>
                </div>
                <h3 class="mb-1 "><?= $this->session->userdata('nama_customer') ?></h3>
                <!-- <p class="text-secondary">Sydney, Australia</p> -->
            </div>
            <br>
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <span class="btn btn-default p-3 btn-rounded-15">
                                <i class="material-icons">account_balance_wallet</i>
                            </span>
                        </div>
                        <div class="col pl-0">
                            <p class="text-secondary mb-1">Point Terkumpul</p>
                            <h4 class="text-dark my-0">10.000</h4>
                        </div>
                        <div class="col-auto pl-0 align-self-center">
                            <a href="<?= base_url('') ?>" class="btn btn-default button-rounded-36 shadow"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>
            </div>

            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link text-left active" id="nav-delivery-tab" data-toggle="tab" href="#nav-delivery" role="tab" aria-controls="nav-delivery" aria-selected="true">
                        <div class="row">
                            <div class="col-auto align-self-center pr-1">
                                <span class="btn btn-success button-rounded-26">
                                    <i class="material-icons md-18 text-mute">card_giftcard</i>
                                </span>
                            </div>
                            <div class="col pl-2">
                                <p class="text-secondary mb-0 small text-truncate">History Order</p>
                                <!-- <h6 class="text-dark my-0">4</h6> -->
                            </div>
                        </div>
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">
                    <ul class="list-items">
                        <li>
                            <div class="row">
                                <div class="col">Orange 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="#">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">Orange 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="#">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">Orange 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="#">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">Orange 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="#">Track</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <h6 class="subtitle">Contact Information</h6>
            <dl class="row mb-4">
                <dt class="col-3 text-secondary font-weight-normal">Email</dt>
                <dd class="col-9"><?= $this->session->userdata('email'); ?></dd>
                <dt class="col-3 text-secondary font-weight-normal">Phone</dt>
                <dd class="col-9"><?= $this->session->userdata('no_hp'); ?></dd>
            </dl>

            <h6 class="subtitle">Daftar Alamat</h6>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Alamat Lengkap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jl Sukaati Rt 01 Rw 07 Kec Regol Kel Pasirluyu Kota Bandung</td>
                        <td align="center"><input type="radio"></td>
                    </tr>
                </tbody>
            </table>     
            </div>       
            <a href="profile-edit.html" class="btn btn-lg btn-dark text-white btn-block btn-rounded shadow"><span>Edit Profile</span><i class="material-icons">arrow_forward</i></a>
            <br>
        </div>