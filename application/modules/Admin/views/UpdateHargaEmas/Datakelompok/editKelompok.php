<?php $no=1; foreach($data->data  as $row ): ?>
<div class="p-5" id="header-footer-modal">
    <div class="preview">
        <div class="modal" id="editkelompok<?=  $row->kode_kelompok ?>">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Kelompok
                    </h2>
                </div>
                <form action="<?= base_url('simpan-edit-kelompok') ?>" method="POST">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label>Kode Kelompok</label>
                            <input type="hidden" value="<?= $row->kode_kelompok ?>" required onkeypress="return event.keyCode != 13;" name="kode_kelompok" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Kelompok">
                            <input type="text" disabled value="<?= $row->kode_kelompok ?>" required onkeypress="return event.keyCode != 13;" name="kode_kelompok" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Kelompok">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label>Nama Kelompok</label>
                            <input type="text" value="<?= $row->nama_kelompok ?>" required onkeypress="return event.keyCode != 13;" name="nama_kelompok" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Kelompok">
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="source-code hidden">
        <button data-target="#copy-header-footer-modal" class="copy-code button button--sm border flex items-center text-gray-700"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy code </button>
        <div class="overflow-y-auto h-64 mt-3">
            <pre class="source-preview" id="copy-header-footer-modal"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTagdiv class=&quot;text-center&quot;HTMLCloseTag HTMLOpenTaga href=&quot;javascript:;&quot; data-toggle=&quot;modal&quot; data-target=&quot;#header-footer-modal-preview&quot; class=&quot;button inline-block bg-theme-1 text-white&quot;HTMLCloseTagShow ModalHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;modal&quot; id=&quot;header-footer-modal-preview&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;modal__content&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;flex items-center px-5 py-5 sm:py-3 border-b border-gray-200&quot;HTMLCloseTag HTMLOpenTagh2 class=&quot;font-medium text-base mr-auto&quot;HTMLCloseTagBroadcast MessageHTMLOpenTag/h2HTMLCloseTag HTMLOpenTagbutton class=&quot;button border items-center text-gray-700 hidden sm:flex&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;file&quot; class=&quot;w-4 h-4 mr-2&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag Download Docs HTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown relative sm:hidden&quot;HTMLCloseTag HTMLOpenTaga class=&quot;dropdown-toggle w-5 h-5 block&quot; href=&quot;javascript:;&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;more-horizontal&quot; class=&quot;w-5 h-5 text-gray-700&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTag/aHTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown-box mt-5 absolute w-40 top-0 right-0 z-20&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;dropdown-box__content box p-2&quot;HTMLCloseTag HTMLOpenTaga href=&quot;javascript:;&quot; class=&quot;flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagi data-feather=&quot;file&quot; class=&quot;w-4 h-4 mr-2&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag Download Docs HTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;p-5 grid grid-cols-12 gap-4 row-gap-3&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagFromHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagToHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagSubjectHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;Important Meeting&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagHas the WordsHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;Job, Work, Documentation&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagDoesn&#039;t HaveHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput type=&quot;text&quot; class=&quot;input w-full border mt-2 flex-1&quot; placeholder=&quot;Job, Work, Documentation&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;col-span-12 sm:col-span-6&quot;HTMLCloseTag HTMLOpenTaglabelHTMLCloseTagSizeHTMLOpenTag/labelHTMLCloseTag HTMLOpenTagselect class=&quot;input w-full border mt-2 flex-1&quot;HTMLCloseTag HTMLOpenTagoptionHTMLCloseTag10HTMLOpenTag/optionHTMLCloseTag HTMLOpenTagoptionHTMLCloseTag25HTMLOpenTag/optionHTMLCloseTag HTMLOpenTagoptionHTMLCloseTag35HTMLOpenTag/optionHTMLCloseTag HTMLOpenTagoptionHTMLCloseTag50HTMLOpenTag/optionHTMLCloseTag HTMLOpenTag/selectHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;px-5 py-3 text-right border-t border-gray-200&quot;HTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;button w-20 border text-gray-700 mr-1&quot;HTMLCloseTagCancelHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagbutton type=&quot;button&quot; class=&quot;button w-20 bg-theme-1 text-white&quot;HTMLCloseTagSendHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
        </div>
    </div>
</div>
<?php endforeach; ?>