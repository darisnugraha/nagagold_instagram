<div class="content">
    <!-- BEGIN: Top Bar -->
    <?= $this->load->view('Themes/Admin/tollbar') ?>

    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
        </h2>
    </div>
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Chat Side Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
            <div class="intro-y pr-1">
                <div class="box p-2">
                    <div class="chat__tabs nav-tabs justify-center flex"> <a data-toggle="tab" data-target="#chats"
                            href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Chats</a> <a
                            data-toggle="tab" data-target="#profile" href="javascript:;"
                            class="flex-1 py-2 rounded-md text-center">Profile</a> </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-content__pane active" id="chats">
                    <div class="pr-1">
                        <div class="box px-5 pt-5 pb-5 lg:pb-0 mt-5 hidden">
                            <div class="relative text-gray-700">
                                <input type="text" class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13"
                                    placeholder="Search for messages or users...">
                                <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0"
                                    data-feather="search"></i>
                            </div>
                            <div class="overflow-x-auto scrollbar-hidden">
                                <br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                    <?php $no=1; foreach($ChatData->data as $row ): ?>
                    <?php
                        $count_mess = array_filter($row->detail, function ($var)
                        {
                            return $var->input_by === "CUSTOMER" && $var->status === "OPEN";
                        });

                        // echo json_encode($count_mess);
                        // die;
                    ?>
                        <a href="#" onclick="pilihChat('<?=$row->kode_customer?>'); return false;" class="font-medium">
                        <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                    src="<?= base_url('assets/admin/images/profile-1.png') ?>">
                                <!-- <div
                                    class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                </div> -->
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <?php
                                    $count = count($row->detail);
                                    $json = json_encode($row->detail[$count-1]);
                                ?>
                                <div class="flex items-center">
                                    <span><?= $row->nama_customer?></span>
                                    <div class="text-xs text-gray-500 ml-6"><?= date('H:i',strtotime($row->detail[$count-1]->input_date) - (8 * 60 * 60))?></div>
                                </div>
                                <div class="w-full truncate text-gray-600"><div class="fa fa-check" style="display:<?= $row->detail[$count-1]->input_by === 'ADMIN TOKO' ? '' : 'none'?>"></div>&nbsp;<?= strpos($row->detail[$count-1]->pesan,'\n') ? str_replace('\n','<br>&nbsp;',$row->detail[$count-1]->pesan) : $row->detail[$count-1]->pesan?></div>
                            </div>
                            <div
                                class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1 <?= count($count_mess) > 0 ? "":"hidden"?>" id="count_<?=$row->kode_customer?>">
                                <span id="jumlah_pesan_belum_dibaca_<?=$row->kode_customer?>"><?= count($count_mess) ?></span>
                            </div>
                        </div>
                        </a>
                        <br>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="tab-content__pane" id="profile">
                    <div class="pr-1">
                        <div class="box px-5 py-10 mt-5">
                            <div class="w-20 h-20 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                <img alt="Midone Tailwind HTML Admin Template"
                                    src="<?= base_url('assets/admin/images/profile-9.png') ?>">
                            </div>
                            <div class="text-center mt-3">
                                <div class="font-medium text-lg"><?= $this->session->userdata('nama_user') ?></div>
                                <div class="text-gray-600 mt-1">Admin Toko Mas Hidup</div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Chat Side Menu -->
        <!-- BEGIN: Chat Content -->
        <div class="intro-y col-span-12 lg:col-span-8 xxl:col-span-9">
            <div class="chat__box box">
                <!-- BEGIN: Chat Active -->
                <div class="hidden h-full flex flex-col">
                    <div class="flex flex-col sm:flex-row border-b border-gray-200 px-5 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                    src="<?= base_url('assets/admin/images/profile-1.png') ?>">
                            </div>
                            <div class="ml-3 mr-auto">
                                <div class="font-medium text-base"><span id="nama_customer"></span></div>
                                <div class="text-gray-600 text-xs sm:text-sm"> <span
                                        class="mx-1">•</span> Customer</div>
                            </div>
                        </div>
                        <div
                            class="flex items-center sm:ml-auto mt-5 sm:mt-0 border-t sm:border-0 border-gray-200 pt-3 sm:pt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                            <!-- <a href="javascript:;" class="w-5 h-5 text-gray-500"> <i data-feather="search" class="w-5 h-5"></i> </a> -->
                            <!-- <a href="javascript:;" class="w-5 h-5 text-gray-500 ml-5"> <i data-feather="user-plus" class="w-5 h-5"></i> </a> -->
                            <div class="dropdown relative ml-auto sm:ml-3">
                                <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-500"> <i
                                        data-feather="more-vertical" class="w-5 h-5"></i> </a>
                                <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content box p-2">
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> End Chat </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-y-scroll px-5 pt-5 flex-1">
                        <div id="chat">
                            
                        </div>
                    </div>
                    <form action="#" id="form-chat">
                        <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-gray-200" style="margin: top 100px;">
                            <textarea id="message"
                                class="chat__box__input input w-full h-16 resize-none border-transparent px-5 py-3 focus:shadow-none"
                                rows="1" placeholder="Type your message..."></textarea>

                            <button type="submit"
                                class="w-8 h-8 sm:w-10 sm:h-10 block bg-theme-1 text-white rounded-full flex-none flex items-center justify-center mr-5">
                                <i data-feather="send" class="w-4 h-4"></i> </button>
                        </div>
                    </form>
                </div>
                <!-- END: Chat Active -->
                <!-- BEGIN: Chat Default -->
                <div class="h-full flex items-center">
                    <div class="mx-auto text-center">
                        <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                        </div>
                        <div class="mt-3">
                            <div class="font-medium">Hey, <?= $this->session->userdata('nama_user') ?>!</div>
                            <div class="text-gray-600 mt-1">Silakan pilih obrolan untuk mengirim pesan.</div>
                        </div>
                    </div>
                </div>
                <!-- END: Chat Default -->
            </div>
        </div>
        <!-- END: Chat Content -->
    </div>
</div>
<script>
let data = '<?= json_encode($ChatData)?>';
localStorage.setItem('datachat', data || []);
let chatdata = JSON.parse(localStorage.getItem('datachat'));
chatdata = chatdata.data;
let kode_cust = '';
let baseurl = '<?php echo base_url()?>';
const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
    ];
let no = 0;
let tgl = '';
let margin = 0;

function pilihChat(kode) {
    $(`#jumlah_pesan_belum_dibaca_${kode}`).html('');
    $(`#jumlah_pesan_belum_dibaca_${kode}`).append('0');
    document.getElementById(`count_${kode}`).style.display = "none";

    $.ajax({
        url: baseurl + 'wp-chat/confirm/' + kode,
        method: "PUT",
        cache: false,
        beforeSend: function(e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=utf-8')
            }
        },
        error: function(e) {
            console.log(e);
            let respone = JSON.parse(e.responseText);
            Swal.fire({
                    title: 'Opps!!!',
                    text: respone.pesan,
                    type: 'warning',
                    reverseButtons: true
                })
        },
        success: function(respons) {
            let respone = JSON.parse(respons);
            if (respone.status === 'berhasil') {
                let chat = chatdata.find(function (item) {
                    return item.kode_customer === kode;
                });
            kode_cust = kode;
            $('#nama_customer').html(chat.nama_customer);
            $('#chat').empty();
            chat.detail.forEach(element => {
            let date = new Date(element.input_date);
            date.setHours(date.getHours() - 8);
            // console.log(date);
            let Jam = new Date(date).getHours();
            let Menit = new Date(date).getMinutes();
            let Tanggal = new Date(date).getDate();
            let Month = new Date(date).getMonth();
            let Year = new Date(date).getFullYear();
            let tgl_chat = Tanggal + ' ' + monthNames[Month] + ' ' + Year;

            let menit_display = ("0" + Menit).slice(-2);
            
            let jam_display = ("0" + Jam).slice(-2);
            if (tgl === tgl_chat) {
                $('#chat').append(``);
            }else{
                if (no === 0) {
                    no = 1;
                }else{
                    margin = 100;
                }
                $('#chat').append(`
                    <div style="margin-top:${margin}px;">
                        <div class="live-chat-wrapper">
                            <p style="text-align:center;">${tgl_chat}</p>
                        </div>
                    </div>
                `);
            }
            tgl = tgl_chat;
            let lb = /\n/;
            let lb_search = element.pesan.search(lb);
            
            if (element.input_by === "CUSTOMER") {
                $('#chat').append(`
            <div>
            <div class="chat__box__text-box flex items-end float-left mb-4">
                
            </div>
            <div class="clear-both"></div>
            <div class="chat__box__text-box flex items-end float-right mb-4" style="margin-right:${element.pesan.length > 40 ? '15' : '0'}px;">
                <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                    <${element.jenis_pesan === "Link" ? "a href = '"+element.pesan+"' target='_blank'":"p"}>
                        ${element.pesan.length > 40 ? element.pesan.substring(0,24) + "\n" + element.pesan.substr(24, 24) + "\n" + element.pesan.substr(element.pesan.length - 24, element.pesan.length) : lb_search > -1 ? element.pesan.replace(/(\r\n|\r|\n)/g,"<br>") : element.pesan}
                    </${element.jenis_pesan === "Link" ? "a":"p"}>
                    <div class="mt-1 text-xs text-theme-25">${jam_display}:${menit_display}</div>
                </div>
                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('assets/admin/images/profile-1.png') ?>">
                </div>
            </div>
            </div>
            `)
            }else{
                $('#chat').append(`
            <div style="margin-top:70px;">
            <div class="chat__box__text-box flex items-end float-left mb-4">
                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('assets/admin/images/profile-9.png') ?>">
                </div>
                <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
                    ${lb_search > -1 ? element.pesan.replace(/(\r\n|\r|\n)/g,"<br>") : element.pesan}
                    <div class="mt-1 text-xs text-gray-600">${jam_display}:${menit_display}</div>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="chat__box__text-box flex items-end float-right mb-4">
               
            </div>
            </div>
            `)
            }
        });
            }else{
                console.log('gagal');
            }
        },
    })
    }

    // let pesan_data = '';
    // document.getElementById('message').addEventListener('keyup', function(event) {
    //     if (event.code === 'Enter'){
            
    //     }
    // });

$('#form-chat').submit(function(e) {
    // let tgl = '';
    e.preventDefault();
    let data_terima = $('#message').val();
    let data_kirim = data_terima.replace(/(\r\n|\r|\n)/g, "\\n");
    let data_display = $("#message").val().replace(/(\r\n|\r|\n)/g , "<br>");
    console.log(data_kirim);
    let Jam = new Date().getHours();
    let Menit = new Date().getMinutes();
    let Tanggal = new Date().getDate();
    let Month = new Date().getMonth();
    let Year = new Date().getFullYear();
    let tgl_chat = Tanggal + ' ' + monthNames[Month] + ' ' + Year;
    if (tgl === tgl_chat) {
        $('#chat').append(``);
    }else{
        $('#chat').append(`
            <div>
                <div class="live-chat-wrapper">
                    <p style="text-align:center;">${tgl_chat}</p>
                </div>
            </div>
        `);
    }
    tgl = tgl_chat;
    $('#chat').append(`
    <div style="margin-top:60px;">
    <div class="chat__box__text-box flex items-end float-left mb-4">
        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('assets/admin/images/profile-9.png') ?>">
        </div>
        <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
            ${data_display}
        <div class="mt-1 text-xs text-gray-600">2 mins ago</div>
    </div>
    </div>
    <div class="clear-both"></div>
    <div class="chat__box__text-box flex items-end float-right mb-4">
        
    </div>
    </div>
    `)
    $("#message").val("");
    window.scrollTo(0,document.body.scrollHeight);
    document.getElementById("message").focus();
    $.ajax({
        url: base_url + 'add/wp-chat',
        method: "POST",
        dataType : "json",
        data: {
            kode_customer : kode_cust, 
            pesan : data_kirim,
            jenis_pesan : '-',
            nama_file : '-',
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
            location.reload();
            // pilihChat(localStorage.getItem('kode_cust'));
        },
    })

});
</script>