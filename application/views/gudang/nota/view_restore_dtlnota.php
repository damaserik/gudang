<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>Restore Detail Nota</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <!-- <a href="<?php echo site_url('gudang/nota/view_res_nota');?>"><button type="button" class="btn btn-dark btn-block">Kembali</button></a> -->
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-sm table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th width="16%">Nomor</th>
                  <th>Nama Barang</th>
                  <th width="16%">Order Penjualan</th>
                  <th width="10%">Tgl Order</th>
                  <th width="14%">Sat 1</th>
                  <th width="14%">Sat 2</th>
                  <th width="8%">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->nomor?></td>
                  <td><?php echo $row->nama_brg?></td>
                  <td><?php echo $row->order_penj?></td>
                  <td><?php echo date('d/m/Y',strtotime($row->tgl_order))?></td>
                  <td><?php echo $row->sat1?></td>
                  <td><?php echo $row->sat2?></td>
                  <td class="project-actions text-center">
                     <?php if($this->session->userdata('hak_akses') == "Admin" || $this->session->userdata('hak_akses') == "Super Admin"){ ?>
                      <a title="Restore" href="<?php echo site_url('gudang/nota/res_dtl_nota/'.$row->id_dtl)?>" onclick="return confirm('Konfirmasi Restore Data ?')"><i class="fas fa-sync fa-sm"></i></a> <?php } ?> </td>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

