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
        <form action="<?= base_url('save-news') ?>" enctype="multipart/form-data" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul</label> <input type="text" id="judul" name="judul" class="input w-full border mt-2" placeholder="Masukan Judul"> 

                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>  <input type="file"
                                            onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])"
                                            type="file" name="photo" class="input w-full border mt-2 flex-1"
                                            placeholder="Masukan Nama Jenis">
                                </div>
                                <div class="form-group">
                                    <label>Tautan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <?= base_url('/') ?>
                                        </span>
                                        <input type="text" class="input border" name="slug" id="slug" value="" readonly>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Isi</label>
                                    <textarea rows="4" cols="50" id="editor" name="isi"></textarea>
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
        </form>
    </div>

</div>


<script>
$("#judul").on('keyup', function() {
    let id = $(this).val();
    let res = id.split(' ').join('-')
    $('#slug').val(res.toLowerCase());
});
$('.ui-title').css('display', 'none');
ClassicEditor
    // .create(document.querySelector('#editor'))
    .create(document.querySelector('#editor'), {
        toolbar: [
            'heading', '|',
            'fontfamily', 'fontsize', '|',
            'alignment', '|',
            'fontColor', 'fontBackgroundColor', '|',
            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
            'link', '|',
            'outdent', 'indent', '|', 'JustifyLeft',
            'bulletedList', 'numberedList', 'todoList', '|',
            'code', 'codeBlock', '|',
            'insertTable', '|',
            'blockQuote', '|',
            'undo', 'redo',
        ],

        ckfinder: {
            uploadUrl: base_url +
                'assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        }
    })
    .then(editor => {
        editor.ui.view.editable.element.style.height = '500px';
    })
    .catch(error => {
        // console.error(error);
    });
</script>