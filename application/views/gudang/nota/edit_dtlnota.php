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
				        	<form method="POST" action="<?php echo site_url('gudang/nota/dtlnota_edit/'.$row->id_dtl)?>">
							<div class="form-row">
								<div class="col-md-2" hidden="">
									<div class="form-group">
								    	<label style="font-size: 11pt;">ID Detail</label>
								    	<input type="text" class="form-control" name="id_dtl" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->id_dtl?>">
								    	<input type="text" class="form-control" name="id_nota" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->id_nota?>">
								    </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Nama Barang</label>
								    	<input type="text" class="form-control" name="nama_brg" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->nama_brg?>">
								    </div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label style="font-size: 11pt;">Satuan Barang</label>
								    	<input type="text" class="form-control" name="sat1" style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->sat1?>">
									</div>
								</div>
							    <div class="col-md-3">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Satuan Barang</label>
								    	<input type="text" class="form-control" name="sat2" style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->sat2?>">
							    	</div>
							    </div>
							</div>
							<br>
							  <button type="submit" class="btn btn-primary btn-sm toaster">Simpan</button>
							  <a href="<?php echo site_url('gudang/nota/view_dtlnota/'.$row->id_nota);?>" class="btn btn-secondary btn-sm toaster" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
							</form>
							<?php endforeach ?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- <script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("ebagian").value = textHolder;
	  }
</script> -->