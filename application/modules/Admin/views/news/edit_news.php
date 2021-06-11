<style>
.input-group {
  display: flex;
  align-content: stretch;
}

.input-group > input {
  flex: 1 0 auto;
}
.input-group-addon {
  background: #eee;
  border: 1px solid #ccc;
  padding: 0.5em 1em;
}
</style>
<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            News
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
                <a href="<?= base_url('add-news') ?>" data-toggle="modal" data-target="#header-footer-modal-preview"
                    class="button inline-block bg-theme-1 text-white">Add News</a>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('save-edit-news') ?>" enctype="multipart/form-data" method="POST">
        <?php foreach($news->data  as $row ): ?>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul</label> <input type="text" value="<?= $row->judul ?>" id="judul" name="judul" class="input w-full border mt-2" placeholder="Masukan Judul"> 

                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>  
                                    <input type="hidden" value="<?= $row->_id ?>" class="file-image d-none" name="id">
                                    <input type="hidden" value="<?= $row->lokasi_gambar ?>" class="file-image d-none" name="file_gambar_lama">
                                    <input type="file" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])"
                                            type="file" name="photo" class="input w-full border mt-2 flex-1"
                                            placeholder="Masukan Nama Jenis">
                                            <small style="color:red">* Ukuran File 1280px x 810px </small>
                                            <small style="color:red">* Kosongkan Jika Tidak Ingin Mengedit Gambar </small>
                                </div>
                                <div class="form-group">
                                    <label>Tautan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <?= base_url('/') ?>
                                        </span>
                                        <input type="text" value="<?= $row->slug ?>" class="input border" name="slug" id="slug" value="" readonly>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea rows="4" cols="50" id="editor" name="isi"><?= $row->deskripsi ?></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button class="button w-20 bg-theme-1 text-white w-full"> Simpan </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </form>
    </div>

</div>

<script type='text/javascript'> 
tinymce.init({
		selector: "#editor",
        mode: "specific_textareas",
		plugins: [
			 "advlist autolink lists link charmap print preview hr anchor pagebreak",
			 "searchreplace wordcount visualblocks visualchars code fullscreen",
			 "insertdatetime nonbreaking save table contextmenu directionality",
			 "emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ",
		automatic_uploads: true,
   });
</script>
<script>
$("#judul").on('keyup', function() {
    let id = $(this).val();
    let res = id.split(' ').join('-')
    $('#slug').val(res.toLowerCase());
});
$('.ui-title').css('display', 'none');
// ClassicEditor
//     // .create(document.querySelector('#editor'))
//     .create(document.querySelector('#editor'), {
//         toolbar: [
//             'heading', '|',
//             'fontfamily', 'fontsize', '|',
//             'alignment', '|',
//             'fontColor', 'fontBackgroundColor', '|',
//             'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
//             'link', '|',
//             'outdent', 'indent', '|', 'JustifyLeft',
//             'bulletedList', 'numberedList', 'todoList', '|',
//             'code', 'codeBlock', '|',
//             'insertTable', '|',
//             'blockQuote', '|',
//             'undo', 'redo',
//         ],

//         ckfinder: {
//             uploadUrl: base_url +
//                 'assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
//         }
//     })
//     .then(editor => {
//         editor.ui.view.editable.element.style.height = '500px';
//     })
//     .catch(error => {
//         // console.error(error);
//     });
</script>