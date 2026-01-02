<div class="card">
    <div class="card-header">
        <h3 class="card-title">Umpan Balik Pengguna</h3>
    </div>

    <div class="card-body">
        <form method="post" action="<?= base_url('feedback/simpan') ?>" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <input type="radio" name="jk" value="Laki-laki"> Laki-laki
                <input type="radio" name="jk" value="Perempuan"> Perempuan
            </div>

            <div class="form-group">
                <label>Keluhan</label><br>
                <input type="checkbox" name="keluhan[]" value="Antrian terlalu lama"> Antrian terlalu lama<br>
                <input type="checkbox" name="keluhan[]" value="Aplikasi lelet"> Aplikasi lelet<br>
                <input type="checkbox" name="keluhan[]" value="Pelayanan kurang"> Pelayanan kurang
            </div>

            <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Kirim</button>
        </form>
    </div>
</div>
