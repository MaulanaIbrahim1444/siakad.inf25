<div class="col-md-8 mx-auto">
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h5 class="mb-0">Edit Data Dosen</h5>
        </div>

        <form action="<?= base_url('dosen/update/' . $dosen['id_dosen']) ?>"
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field() ?>

            <!-- simpan foto lama -->
           

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label>Kode Dosen</label>
                        <input type="text"
                               name="kode_dosen"
                               class="form-control"
                               value="<?= $dosen['kode_dosen'] ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label>NIDN</label>
                        <input type="text"
                               name="nidn"
                               class="form-control"
                               value="<?= $dosen['nidn'] ?>">
                    </div>

                    <div class="col-md-6">
                        <label>Nama Dosen</label>
                        <input type="text"
                               name="nama_dosen"
                               class="form-control"
                               value="<?= $dosen['nama_dosen'] ?>"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="L" <?= $dosen['jk']=='L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $dosen['jk']=='P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Tgl Lahir</label>
                        <input type="date"
                               name="tgl_lahir"
                               class="form-control"
                               value="<?= $dosen['tgl_lahir'] ?>">
                    </div>

                    <div class="col-md-6">
                        <label>Pendidikan Terakhir</label>
                        <input type="text"
                               name="pendidikan_terakhir"
                               class="form-control"
                               value="<?= $dosen['pendidikan_terakhir'] ?>">
                    </div>

                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="<?= $dosen['email'] ?>">
                    </div>

                    <div class="col-md-12">
                        <label>Foto Dosen</label>
                        <input type="file" name="foto" class="form-control">

                        <?php if (!empty($dosen['foto'])): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('uploads/dosen/' . $dosen['foto']) ?>"
                                     width="100"
                                     class="img-thumbnail">
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <div class="card-footer text-end">
                <a href="<?= base_url('dosen') ?>" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>

        </form>
    </div>
</div>
