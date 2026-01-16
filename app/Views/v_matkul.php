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
                    <th width="100px">Kode Matkul</th>
                    <th>Mata Kuliah</th>
                    <th width="100px">SKS</th>
                    <th width="50px">Semester</th>
                    <th>Program Studi</th>
                    <th width="120px">Aksi</th>
                  </tr>
                  <?php $no = 1;
                   foreach ($matkul as $key => $id) { ?>
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $id['kode_matkul'] ?></td>
                    <td><?= $id['nama_matkul'] ?></td>
                    <td class="text-center"><?= $id['sks'] ?></td>
                    <td class="text-center"><?= $id['semester'] ?></td>
                    <td><?= $id['prodi'] ?></td>
                    <td class="text-center">
                   
                        <div class="btn-group">
                          <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $id['id_matkul'] ?>"><i class="fas fa-pencil-alt"></i></button>
                          <a href="<?= base_url('Matkul/DeleteData/' . $id['id_matkul']) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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

           <!-- /.modal tambah data -->
      <div class="modal fade" id="add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Matkul/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Matkul</label>
                    <input type="text" name="kode_matkul" maxlength="4" class="form-control" placeholder="Masukkan Kode Matkul" required>
                </div>
                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <input type="text" name="nama_matkul" class="form-control" placeholder="Masukkan Nama Mata Kuliah" required>
                </div>
                <div class="form-group">
                    <label>SKS</label>
                    <input type="text" name="sks" maxlength="1"class="form-control" placeholder="Masukkan SKS" required>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" name="semester" maxlength="2" class="form-control" placeholder="Masukkan Semester" required>
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" name="prodi" class="form-control" placeholder="Masukkan Program Studi" required>
                </div>
                <div class="form-group">
                    <label>Dosen Pengampu</label>
                    <input type="text" name="dosen_pengampu" class="form-control" placeholder="Masukkan Dosen Pengampu" required>
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
    <?php foreach ($matkul as $key => $id) { ?>
        <div class="modal fade" id="edit<?= $id['id_matkul'] ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Matkul/UpdateData/' . $id['id_matkul']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Matkul</label>
                    <input type="text" name="kode_matkul" maxlength="4" value="<?= $id['kode_matkul'] ?>" class="form-control" placeholder="Masukkan Kode Matkul" required>
                </div>
                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <input type="text" name="nama_matkul" value="<?= $id['nama_matkul'] ?>" class="form-control" placeholder="Masukkan Nama Mata Kuliah" required>
                </div>
                <div class="form-group">
                    <label>SKS</label>
                    <input type="text" name="sks" maxlength="1" value="<?= $id['sks'] ?>" class="form-control" placeholder="Masukkan jumlah SKS" required>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" name="semester" maxlength="2" value="<?= $id['semester'] ?>" class="form-control" placeholder="Masukkan Semester" required>
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" name="prodi" value="<?= $id['prodi'] ?>" class="form-control" placeholder="Masukkan Program Studi" required>
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

    