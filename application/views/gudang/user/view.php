<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>User</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <a href="<?php echo site_url('gudang/user/tambah_user');?>"><button type="button" class="btn btn-dark btn-block">Tambah</button></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-sm table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th width="16%">Username</th>
                  <th>Password</th>
                  <th width="16%">Hak Akses</th>
                  <th width="9%">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->username?></td>
                  <td><?php echo $row->password?></td>
                  <td><?php echo $row->hak_akses?></td>
                  <td class="project-actions text-center">
                      <a title="Edit" href="<?php echo site_url('gudang/user/edit_user/'.$row->id_user)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&nbsp;
                      <a  title="Hapus" href="<?php echo site_url('gudang/user/user_hapus/'.$row->id_user)?>" onclick="return confirm('Konfirmasi Hapus Data ?')"><i class="fas fa-trash fa-sm"></i></a></td>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

