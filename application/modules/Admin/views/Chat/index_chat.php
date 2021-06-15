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
                        <div class="box px-5 pt-5 pb-5 lg:pb-0 mt-5">
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
                        <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                    src="<?= base_url('assets/admin/images/profile-3.jpg') ?>">
                                <div
                                    class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium">Sylvester Stallone</a>
                                    <div class="text-xs text-gray-500 ml-auto">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is
                                    not simply random text. It has roots in a piece of classical Latin literature from
                                    45 BC, making it over 20</div>
                            </div>
                            <div
                                class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                                6</div>
                        </div>
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
                                    src="<?= base_url('assets/admin/images/profile-3.jpg') ?>">
                            </div>
                            <div class="ml-3 mr-auto">
                                <div class="font-medium text-base">Sylvester Stallone</div>
                                <div class="text-gray-600 text-xs sm:text-sm">Hey, I am using chat <span
                                        class="mx-1">•</span> Online</div>
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
                        <div id="livechat"></div>
                    </div>
                    <form action="#" id="form-chat">
                        <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-gray-200">
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
$(document).ready(function() {
    $('#livechat').append(`
    <div class="chat__box__text-box flex items-end float-left mb-4">
                                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('assets/admin/images/profile-3.jpg') ?>">
                                        </div>
                                        <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
                                            Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                            <div class="mt-1 text-xs text-gray-600">2 mins ago</div>
                                        </div>
                                        
                                    </div>
                                    <div class="clear-both"></div>
                                    <div class="chat__box__text-box flex items-end float-right mb-4">
                                        <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                            Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                            <div class="mt-1 text-xs text-theme-25">1 mins ago</div>
                                        </div>
                                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('assets/admin/images/profile-4.jpg') ?>">
                                        </div>
                                    </div>
    `)
});

$('#form-chat').submit(function(e) {
    e.preventDefault();
    let data = $("#message").val();
    // setTimeout(() => {
    let Jam = new Date().getHours();
    let Menit = new Date().getMinutes();
    $('#livechat').append(`
    <div class="clear-both"></div>
    <div class="chat__box__text-box flex items-end float-right mb-4">
        <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
        ` + data + `
            <div class="mt-1 text-xs text-theme-25">` + Jam + `:` + Menit + `</div>
        </div>
        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('assets/admin/images/profile-4.jpg') ?>">
        </div>
    </div>
        
    `)
    $("#message").val("");
    window.scrollTo(0,document.body.scrollHeight);
    document.getElementById("message").focus();
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