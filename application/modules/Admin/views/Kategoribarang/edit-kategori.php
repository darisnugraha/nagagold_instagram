<?php
$no = 1;
foreach ($DataKategori->data as $row) : ?>
<div class="p-5" id="header-footer-modal">
    <div class="preview">
        <div class="modal" id="editkategori<?= $row->kode_kategori  ?>">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Kategori
                    </h2>
                </div>
                <form action="<?= base_url('edit-kategori') ?>" method="POST" enctype="multipart/form-data">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label>Kode Kategori</label>
                            <input type="hidden" value="<?= $row->kode_kategori ?>" name="kode_kategori"
                                class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Kategori">
                            <input type="text" autocomplete="off" value="<?= $row->kode_kategori ?>" disabled
                                class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Kategori">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label>Nama Kategori</label>
                            <input type="text" autocomplete="off" required onkeypress="return event.keyCode != 13;"
                                value="<?= $row->nama_kategori ?>" name="nama_kategori"
                                class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Kategori">
                        </div>
                        <?php
                            $icon = array(
                                'aksesoris' => "aksesoris",
                                'anting' => "anting",
                                'aampuran' => "campuran",
                                'cincin' => "cincin",
                                'gelang' => "gelang",
                                'giwang' => "giwang",
                                'kalung' => "kalung",
                                'liontin' => "liontin",
                                'setelan' => "setelan",
                                'lainnya' => "lainnya",
                            );
                            ?>
                        
                        <input type="hidden" name="banner_lama" value="<?= $row->icon ?>">
                        <div class="col-span-12">
                        <label>Ukuran File 32px x 32px</label>
                            <div class="relative mt-2"> <input type="file"  onchange="document.getElementById('output<?=$row->kode_kategori ?>').src = window.URL.createObjectURL(this.files[0])"
                                name="photo"  class="input pr-12 w-full border col-span-4"
                                    placeholder="Price">
                                <div
                                    class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                    <img width="570" height="250" onerror="this.onerror=null;this.src='<?= base_url('assets/images/slidenotfound.jpg') ?>';" id="output<?=$row->kode_kategori ?>" class="viewimages"
                                        src="<?= $row->icon ?>">
                                    </div>
                            </div>
                        </div>
                        <!-- <div class="col-span-12">
                            <label>Ukuran File 1280px x 810px</label>
                            <img width="570" height="250" onerror="this.onerror=null;this.src='<?= base_url('assets/images/slidenotfound.jpg') ?>';" id="output<?=$row->kode_kategori ?>" class="viewimages"
                                src="<?= $row->banner ?>">
                        </div>
                        <div class="col-span-12">
                            <input type="file"
                                onchange="document.getElementById('output<?=$row->kode_kategori ?>').src = window.URL.createObjectURL(this.files[0])"
                                type="file" name="photo" class="input w-full border mt-2 flex-1"
                                placeholder="Masukan Nama Jenis">
                        </div> -->
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal"
                            class="button w-20 border text-gray-700 mr-1">Batal</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="source-code hidden">
        <button data-target="#copy-header-footer-modal"
            class="copy-code button button--sm border flex items-center text-gray-700"> <i data-feather="file"
                class="w-4 h-4 mr-2"></i> Copy code </button>
        <div class="overflow-y-auto h-64 mt-3">
            <pre class="source-preview"
                id="copy-header-footer-modal"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTagdiv class=&quot;text-center&quot;HTMLCloseTag HTMLOpenTaga href=&quot;javascript:;&quot; data-toggle=&quot;modal&quot; data-target=&quot;#header-footer-modal-preview&quot; class=&quot;button inline-block bg-theme-1 text-white&quot;HTMLCloseTagShow ModalHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;modal&quot; id=&quot;header-footer-modal-preview&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;modal__content&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;flex items-center px-5 py-5 sm:py-3 border-b border-gray-200&quot;HTMLCloseTag HTMLOpenTagh2 class=&quot;font-medium text-base mr-auto&quot;HTMLCloseTagBroadcast MessageHTMLOpenTag/h2HTMLCloseTag HTMLOpenTagbutton class=&quot;button border items-center text-gray-700 hidden sm:flex&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;file&quot; class=&quot;w-4 h-4 mr-2&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag Download Docs HTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown relative sm:hidden&quot;HTMLCloseTag HTMLOpenTaga class=&quot;dropdown-toggle w-5 h-5 block&quot; href=&quot;javascript:;&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;more-horizontal&quot; class=&quot;w-5 h-5 text-gray-700&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTag/aHTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown-box mt-5 absolute w-40 top-0 right-0 z-20&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown-box__content box p-2&quot;HTMLCloseTag HTMLOpenTaga href=&quot;javascript:;&quot; class=&quot;flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;file&quot; class=&quot;w-4 h-4 mr-2&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag Download Docs HTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;p-5 grid grid-cols-12 gap-4 row-gap-3&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagFromHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagToHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagSubjectHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;Important Meeting&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagHas the WordsHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;Job, Work, Documentation&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagDoesn&#039;t HaveHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;Job, Work, Documentation&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagSizeHTMLOpenTag/labelHTMLCloseTag HTMLOpenTagselect class=&quot;input w-full border mt-2 flex-1&quot;HTMLCloseTag HTMLOpenTagoptionHTMLCloseTag10HTMLOpenTag/optionHTMLCloseTag HTMLOpenTagoptionHTMLCloseTag25HTMLOpenTag/optionHTMLCloseTag HTMLOpenTagoptionHTMLCloseTag35HTMLOpenTag/optionHTMLCloseTag HTMLOpenTagoptionHTMLCloseTag50HTMLOpenTag/optionHTMLCloseTag HTMLOpenTag/selectHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;px-5 py-3 text-right border-t border-gray-200&quot;HTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;button w-20 border text-gray-700 mr-1&quot;HTMLCloseTagCancelHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;button w-20 bg-theme-1 text-white&quot;HTMLCloseTagSendHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
        </div>
    </div>
</div>
<?php endforeach; ?>