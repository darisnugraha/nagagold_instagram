<div class="page-content-wrapper">
    <div class="live-chat-intro mb-3">
        <img src="<?= base_url('assets/mobile/v2/img/bg-img/9.jpg') ?>" alt="">
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
        <textarea class="form-control" name="message" id="message" cols="30" rows="10"
            placeholder="Type your message ..."></textarea>
        <button type="submit" style="right : 20px !important"><i class="fa fa-paper-plane-o"></i></button>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#livechat').append(`
    <div class="live-chat-wrapper">
                <div class="agent-message-content d-flex align-items-center">
                    <div class="agent-thumbnail mr-2"><img src="<?= base_url('assets/mobile/v2/img/bg-img/9.jpg') ?>"
                            alt=""></div>
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