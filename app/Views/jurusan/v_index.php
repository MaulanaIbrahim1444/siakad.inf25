<!-- /.col -->
          <div class="col-md-12">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>
    
               <div class="card-tools">
                  <a class="btn btn-primary btn-flat btn-xs">
                    <i class="fas fa-plus"></i>Tambah
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-sm">
                  <tr class="text-center">
                    <th width="50px">NO</th>
                    <th>Kode</th>
                    <th>Jurusan</th>
                    <th width="50px">Aksi</th>
                  </tr>
                  <?php $no = 1;
                   foreach ($jurusan as $key => $id) { ?>
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $id['kode_prodi'] ?></td>
                    <td><?= $id['nama_prodi'] ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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