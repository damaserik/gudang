<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>Nota</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <?php if($this->session->userdata('hak_akses') == "Admin" || $this->session->userdata('hak_akses') == "Super Admin"){ ?>
      <a href="<?php echo site_url('gudang/nota/tambah_nota');?>"><button type="button" class="btn btn-dark btn-block">Tambah</button></a>
      <?php } ?>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-sm table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th width="16%">Nomor</th>
                  <th>Tujuan</th>
                  <th width="16%">Order Penjualan</th>
                  <th width="10%">Tgl Order</th>
                  <th>Keterangan</th>
                  <th width="10%">Tgl Nota</th>
                  <th width="9%">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->nomor?></td>
                  <td><?php echo $row->tujuan?></td>
                  <td><?php echo $row->order_penj?></td>
                  <td><?php echo date('d/m/Y',strtotime($row->tgl_order))?></td>
                  <td><?php echo $row->ket?></td>
                  <td><?php echo date('d/m/Y',strtotime($row->tgl_nota))?></td>
                  <td class="project-actions text-center">
                      <a  title="Cetak" href="<?php echo site_url('gudang/laporan/laporan_nota_cetak/'.$row->id_nota)?>"><i class="fas fa-print fa-sm"></i></a>&nbsp;
                      <a  title="Detail Nota" href="<?php echo site_url('gudang/nota/view_dtlnota/'.$row->id_nota)?>"><i class="fas fa-align-justify fa-sm"></i></a>&nbsp;
                      <?php if($this->session->userdata('hak_akses') == "Admin" || $this->session->userdata('hak_akses') == "Super Admin"){ ?>
                      <a title="Edit" href="<?php echo site_url('gudang/nota/edit_nota/'.$row->id_nota)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&nbsp;
                      <a  title="Hapus" href="<?php echo site_url('gudang/nota/nota_hapus/'.$row->id_nota)?>" onclick="return confirm('Konfirmasi Hapus Data ?')"><i class="fas fa-trash fa-sm"></i></a></td>
                      <?php } ?>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

