<!-- /.col -->
          <div class="col-md-12">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>
    
                <div class="card-tools d-flex align-items-center">
            
                  <?php if (session()->getFlashdata('insert')) { ?>
                    <div class="alert alert-success alert-dismissible fade show mb-0 mr-2 py-1 px-2">
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
              
          
            
                  <a href="<?= base_url('Jurusan/input') ?>" class="btn btn-primary btn-flat btn-xs">
                    <i class="fas fa-plus"></i>Tambah
                  </a>

               
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <table class="table table-bordered table-sm">
                  <tr class="text-center bg-primary">
                    <th width="50px">NO</th>
                    <th>Kode</th>
                    <th>Jurusan</th>
                    <th width="120px">Aksi</th>
                  </tr>
                  <?php $no = 1;
                   foreach ($jurusan as $key => $id) { ?>
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $id['kode_prodi'] ?></td>
                    <td><?= $id['nama_prodi'] ?></td>
                    <td class="text-center">
                      <?php if ($id['id_prodi'] <> 0) { ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Jurusan/Detail/' . $id['id_prodi']) ?>" class="btn btn-info btn-sm btn-flat"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('Jurusan/Edit/' . $id['id_prodi']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                          <a href="<?= base_url('Jurusan/Delete/' . $id['id_prodi']) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                        </div>
                      <?php } ?>
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