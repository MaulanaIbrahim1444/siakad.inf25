<!-- /.col -->
          <div class="col-md-12">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>
    
                <div class="card-tools d-flex align-items-center">

                  <?php if (session()->getFlashdata('insert')) { ?>
                    <div class="alert alert-primary alert-dismissible fade show mb-0 mr-2 py-1 px-2">
                      <?= session()->getFlashdata('insert') ?>
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                  <?php } ?>

                  <?php if (session()->getFlashdata('update')) { ?>
                    <div class="alert alert-success alert-dismissible fade show mb-0 mr-2 py-1 px-2">
                      <?= session()->getFlashdata('update') ?>
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                  <?php } ?>

                  <?php if (session()->getFlashdata('delete')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-0 mr-2 py-1 px-2">
                      <?= session()->getFlashdata('delete') ?>
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                  <?php } ?>



                  <button type="button" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus"></i>Tambah
                  </button>

               
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table class="table table-bordered table-sm">
                  <tr class="text-center bg-primary">
                    <th width="50px">NO</th>
                    <th>Kode Ruangan</th>
                    <th>Ruang</th>
                    <th width="120px">Aksi</th>
                  </tr>
                  <?php $no = 1;
                   foreach ($ruang as $key => $id) { ?>
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $id['kode_ruang'] ?></td>
                    <td><?= $id['nama_ruang'] ?></td>
                    <td class="text-center">
                   
                        <div class="btn-group">
                          <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $id['id_ruang'] ?>"><i class="fas fa-pencil-alt"></i></button>
                          <a href="<?= base_url('Ruang/DeleteData/' . $id['id_ruang']) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                        </div>
                 
                    </td>
                  </tr>
                        
                  <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

           <!-- /.modal -->
      <div class="modal fade" id="add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Ruang/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Ruang</label>
                    <input type="text" name="kode_ruang" class="form-control" placeholder="Masukkan Kode Ruang" required>
                </div>
                <div class="form-group">
                    <label>Ruang</label>
                    <input type="text" name="nama_ruang" class="form-control" placeholder="Masukkan Nama Ruang" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat btn-sn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat btn-sn">Simpan</button>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <?php foreach ($ruang as $key => $id) { ?>
        <div class="modal fade" id="edit<?= $id['id_ruang'] ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Ruang/UpdateData/' . $id['id_ruang']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Ruang</label>
                    <input type="text" name="kode_ruang" value="<?= $id['kode_ruang'] ?>" class="form-control" placeholder="Masukkan Kode Ruang" required>
                </div>
                <div class="form-group">
                    <label>Ruang</label>
                    <input type="text" name="nama_ruang" value="<?= $id['nama_ruang'] ?>" class="form-control" placeholder="Masukkan Nama Ruang" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat btn-sn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat btn-sn">Simpan</button>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php } ?>