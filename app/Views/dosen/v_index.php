
<div class="col-md-12">
     <div class="card card-outline card-danger">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $subjudul ?></h5>

        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>JK</th>
                        <th>Tgl Lahir</th>
                        <th>Pendidikan</th>
                        <th>Email</th>
                        <th width="120">Foto</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                    <tbody>
                    <?php $no = 1; foreach ($dosen as $d) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['kode_dosen'] ?></td>
                        <td><?= $d['nidn'] ?></td>
                        <td><?= $d['nama_dosen'] ?></td>
                        <td><?= $d['jk'] ?></td>
                        <td><?= $d['tgl_lahir'] ?></td>
                        <td><?= $d['pendidikan_terakhir'] ?></td>
                        <td><?= $d['email'] ?></td>

                        <td class="text-center">
                            <img src="<?= base_url('foto/' . $d['foto']) ?>" width="50">
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                  <a href="<?= base_url('dosen/dit/' . $d['id_dosen']) ?>"
                                    class="btn btn-warning btn-sm">Edit</a>

                                    <a href="<?= base_url('dosen/DeleteData/' . $d['id_dosen']) ?>"
                                    onclick="return confirm('Yakin hapus data ini?')"
                                    class="btn btn-danger btn-sm">Delete</a>

                                </a>
                            </div>
                        </td>
                    </tr>

                     
                        
                    <?php endforeach; ?>
                    </tbody>


                   

                    <?php if (empty($dosen)): ?>
                        <tr>
                            <td colspan="10" class="text-center text-muted">
                                Data dosen belum tersedia
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH DATA ================= -->

            <form action="<?= base_url('dosen/insert') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kode Dosen</label>
                            <input type="text" name="kode_dosen" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NIDN</label>
                            <input type="text" name="nidn" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL UPDATE FOTO ================= -->
<?php foreach ($dosen as $row): ?>
<div class="modal fade" id="modalFoto<?= $row['id_dosen'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('dosen/updateFoto/' . $row['id_dosen']) ?>"
                  method="post"
                  enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="modal-header">
                    <h5 class="modal-title">Update Foto Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <?php if (!empty($row['foto'])): ?>
                        <img src="<?= base_url('uploads/dosen/' . $row['foto']) ?>"
                             class="img-fluid mb-3"
                             style="max-height:200px">
                    <?php else: ?>
                        <p class="text-muted">Belum ada foto</p>
                    <?php endif; ?>

                    <input type="file" name="foto" class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">
                        <i class="fas fa-upload"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="<?= base_url('dosen/insert') ?>"
                  method="post"
                  enctype="multipart/form-data">
                  

                <?= csrf_field(); ?>

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label>Kode Dosen</label>
                            <input type="text" name="kode_dosen" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>NIDN</label>
                            <input type="text" name="nidn" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label>Foto Dosen</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            


            </form>

        </div>
    </div>
</div>

