 <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>

            <?php 
            session();
            $validasi = \Config\Services::validation();
            ?>
            <!-- /.card-header -->
             <?php echo form_open('Jurusan/UpdateData/' . $jurusan['id_prodi']) ?>

             <!-- /.card-body -->
            <div class="card-body">



            <div class="row">
          

              <div class="col-md-2">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input type="text" name="kode_prodi" value="<?= $jurusan['kode_prodi'] ?>" class="form-control" placeholder="Masukkan Kode Prodi" required>
                    <p class ="text-danger"> <?= $validasi->getError('kode_prodi'); ?> </p>
                  </div>
              </div>  

              <div class=col-md-8>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="nama_prodi" value="<?= $jurusan['nama_prodi'] ?>" class="form-control" placeholder="Masukkan Nama Prodi" required>
                    <p class ="text-danger"> <?= $validasi->getError('nama_prodi'); ?> </p>
                  </div>
              </div>
          </div>
          
          
      
                
                <div class="form-group">
                    <label>Visi Misi</label>
                    <textarea id="summernote" name="Visi_Misi"><?= $jurusan['Visi_Misi'] ?></textarea>
                </div>
            </div>
            <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
             <a href="<?= base_url('Jurusan') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
            <?php echo form_close() ?>
            <!-- /.card-footer-->
          </div>

          

          <script>
  $(function () {
    // Summernote
    $('#summernote').summernote({
      height: 150
    });

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

