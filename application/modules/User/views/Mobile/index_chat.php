<style>
.btnchoose {
    position: absolute;
    width: 40px;
    height: 55px;
    top: 0;
    right: 0;
    z-index: 30;
    border: 0;
    background-color: #ffffff;
    font-size: 1rem;
    color: #020310;
    outline: none !important;
}
.btnsearch {
    position: absolute;
    width: 55px;
    height: 50px;
    margin-top: 15px;
    border-radius: 10px;
    top: 0;
    right: 0;
    z-index: 30;
    border: 1;
    background-color: #ffffff;
    font-size: 1rem;
    color: #020310;
    outline: none !important;
}
</style>
<div class="page-content-wrapper">
    <div class="live-chat-intro mb-3">
        <img src="<?= base_url('assets/mobile/v2/img/bg-img/profile-9.png') ?>" alt="">
        <p>Admin <br> Toko Mas Hidup</p>
    </div>
    <div class="support-wrapper py-3">
        <div class="container">
            <div id="chat">
                <div id="livechat"></div>
                <div id="livechat2"></div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div id="down"></div>
<div class="type-text-form">
<button onClick="" class="btnchoose" style="left : 20px !important" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
    <form id="form-chat" method="POST">
        <textarea class="form-control" style="margin-left:30px;" name="message" id="message" cols="30" rows="10"
            placeholder="Type your message ..." required></textarea>
        <button type="submit" style="right : 20px !important"><i class="fa fa-paper-plane-o"></i></button>
    </form>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="cari-barang">
          <form id="form-search" method="POST">
            <input class="form-control" id="cari" type="search" placeholder="Enter your keyword">
            <button type="submit" style="right : 20px !important" class="btnsearch"><i class="fa fa-search"></i></button>
          </form>
          </div>
        <div id="load_data" style="margin-top: 20px;"></div>
        <div id="load_data_message"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    let data;
    data = '<?= json_encode($ChatData->data)?>';
    let chatdata = JSON.parse(data);

    var limit = 2;
    var start = 0;
    var action = 'inactive';

    let type_message = '-';

$(document).ready(function() {
    // console.log('<?php echo base_url('add/chat') ?>');
    // console.log(chatdata);
    if (chatdata.length > 0) {
        chatdata[0].detail.forEach(element => {
            let Tanggal = new Date(element.input_date).getDate();
            // console.log(Tanggal);
            let Jam = new Date(element.input_date).getHours();
            let Menit = new Date(element.input_date).getMinutes();
            if (element.input_by === "CUSTOMER") {
                $('#chat').append(`
                <div>
                <div class="live-chat-wrapper">
                <div class="agent-message-content d-flex align-items-center">
                    
                </div>
                <div class="user-message-content">
                    <div class="user-message-text">
                    ${element.jenis_pesan === "Link" ? "<a href = '"+element.pesan+"' target='_blank'>":""}
                        <p> ${element.pesan}</p>
                    ${element.jenis_pesan === "Link" ? "</a>":""}
                        <span>${Jam}:${Menit}</span>
                    </div>
                </div>
                </div>
                </div>
                `)
            }else{
                $('#chat').append(`
                <div>
                <div class="live-chat-wrapper">
                <div class="agent-message-content d-flex align-items-center">
                    <div class="agent-thumbnail mr-2"><img src="<?= base_url('assets/mobile/v2/img/bg-img/profile-9.png') ?>"
                            alt=""></div>
                    <div class="agent-message-text">
                        <p>${element.pesan}</p>
                        <span>${Jam}:${Menit}</span>
                    </div>
                </div>
                <div class="user-message-content">
                   
                </div>
                </div>
                </div>
                `)
            }
            
        });
        
    }else{
        $('#livechat').append(`
        <div class="live-chat-wrapper">
                <p style="text-align:center;">Belum Ada Pesan!</p>
            </div>
        `)
    }
   
});

$('#form-chat').submit(function(e) {
    e.preventDefault();
    let data = $("#message").val();
    // setTimeout(() => {
    let Jam = new Date().getHours();
    let Menit = new Date().getMinutes();
    $('#chat').append(`
    <div>
         <div class="user-message-content">
                    <div class="user-message-text">
                        <p> ` + data + `</p><span>` + Jam + `:` + Menit + `</span>
                    </div>
                </div>
    </div>
    `)

    $("#message").val("");
    window.scrollTo(0, document.body.scrollHeight);
    
        $.ajax({
            url: base_url + 'add/chat',
            method: "POST",
            dataType : "json",
            data: { 
                pesan : data,
                jenis_pesan : type_message
                },
            cache: false,
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=utf-8')
                }
            },
            error: function(e) {
                console.log(e);
            },
            complete: function(respons) {
                console.log(respons);
                type_message = 'Text';
                location.reload();
            },
        })
    });

        function load_data(start, limit, nama_barang) {
            $.ajax({
                url: 'http://54.151.162.118:3753/api/barang/regexp-name-active/'+nama_barang+ '&'+start+'&'+limit,
                method: "GET",
                cache: false,
                success: function(data) {
                    // console.log(data);
                    var _display = '';
                    _display += '<div class="row">';

                    data.data.forEach(element => {
                    // console.log(element);
                    _display += `
                        <div class="col-6 col-sm-4">
                            <div class="card top-product-card mb-3">
                                <div class="card-body">
                                    <a onclick="" class="product-thumbnail d-block" href="#">
									<img onError="this.onerror=null;this.src='http://localhost/hidup_retail//assets/images/notfound.png'" class="mb-2" src="${element.gambar[0].lokasi_gambar}" alt=""></a>
									<a onclick="" class="product-title d-block" href="#">
									${element.nama_barang}</a>
									<p class="sale-price">
                                    ${element.harga_jual.toLocaleString('id-ID', {currency: 'IDR', style: 'currency'})}
									</p>
									<div class="product-rating">
									    Kadar : ${element.kadar.toFixed(2)}<br>
									    Berat : ${element.berat.toFixed(2)}<br>
									</div>
                                    <a onclick="addlink('${element.kode_barcode}','${element.nama_barang}')" class="add-cart-btn btn btn-success" href="#"> <i class="lni lni-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                        });
                    _display += '</div>';

                    $('#load_data').html(_display);
                    $('#load_data_message').html("");
                    action = 'inactive';
                },
                error: function (request, error) {
                    action = 'active';
                    $('#load_data_message').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                           Mohon maaf barang yang anda cari tidak ada !!!<br>
                        </div>
                    </div>
                    <br><br>
                    `);
                } 
            })
        }

        function addlink(kode, nama) {
            var base_url = '<?php echo base_url() ?>';
            let link = '';
            // console.log(base_url);
            $.ajax({
                url: base_url + 'link',
                method: "POST",
                dataType : "json",
                data: {kode_barcode:kode},
                cache: false,
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=utf-8')
                    }
                },
                error: function(e) {
                    console.log(e);
                },
                complete: function(respons) {
                    // console.log(respons.responseJSON);
                    link = respons.responseJSON;
                    document.getElementById('message').value = link;
                    type_message = 'Link';
                },
            })
        }

        function lazzy_loader(limit) {
            var output = '';

            output += '<div class="row">';
            for (var count = 0; count < limit; count++) {
                output += '<div class="col-6 col-sm-4">';
                output += '<div class="card top-product-card mb-3">';
                output += '<div class="card-body">';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                output += '</div>';
                output += '</div>';
                output += '</div>';
            }
            output += '</div>';
            $('#load_data_message').html(output);
        }

    $('#form-search').submit(function(e) {
        var nama_barang = $('#cari').val();
        e.preventDefault();
        $('#load_data').empty();
        $('#load_data_message').html("");
        lazzy_loader(limit);
        load_data(start,limit,nama_barang);

        if (action == 'inactive') {
            lazzy_loader(limit);
            action = 'active';
            load_data(start,limit,nama_barang);
        }
    });
</script>