<form action="<?= base_url('simpanrecorder') ?>"  enctype="multipart/form-data" method="post">
<input type="file" name="audio" accept="audio/*" />
<input type="submit" value="simpan">
<audio src="<?= base_url('assets/images/NsiPic/audio/'.$this->session->userdata('nama_file')) ?>" controls></audio>
</form>