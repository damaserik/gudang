<br><br><br>
<div class="content">
		<div class="container-fluid">
		<div class="row justify-content-md-center" >
			<div class="col-md-10" >
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3>Form Edit Nota</h3>
					</div>
					  <div class="card-body">
							<?php foreach ($ubah_data as $key => $row): ?>			
				        	<form method="POST" action="<?php echo site_url('gudang/nota/nota_edit/'.$row->id_nota)?>">
							<div class="form-row">
								<div class="col-md-2" hidden="">
									<div class="form-group">
								    	<label style="font-size: 11pt;">ID Nota</label>
								    	<input type="text" class="form-control" name="id_nota" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->id_nota?>">
								    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Nomor</label>
								    	<input type="text" class="form-control" name="nomor" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->nomor?>">
								    </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label style="font-size: 11pt;">Order Penjualan</label>
								    	<input type="text" class="form-control" name="order_penj" style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->order_penj?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Tgl Order</label>
								    	<input type="date" class="form-control" name="tgl_order" style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->tgl_order?>">
								    </div>
							    </div>
							    <div class="col-md-4">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Tujuan</label>
								    	<textarea class="form-control form-control-sm" name="tujuan" style="font-size: 11pt;" autocomplete="off" rows="3"><?php echo $row->tujuan?></textarea>
							    	</div>
							    </div>
							    <div class="col-md-6">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Ket</label>
								    	<textarea class="form-control form-control-sm" name="ket" style="font-size: 11pt;" autocomplete="off" rows="3"><?php echo $row->ket?></textarea>
							   		</div>
							    </div>
							   	<div class="col-md-2">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Tgl Nota</label>
								    	<input type="date" class="form-control" name="tgl_nota"  style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->tgl_nota?>">
							   		</div>
							   	</div>
							</div>
							<br>
							  <button type="submit" class="btn btn-primary btn-sm toaster">Simpan</button>
							  <a href="<?php echo site_url('gudang/nota/view_nota');?>" class="btn btn-secondary btn-sm toaster" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
							</form>
							<?php endforeach ?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>