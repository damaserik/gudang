<br><br><br>
<div class="content">
		<div class="container-fluid">
		<div class="row justify-content-md-center" >
			<div class="col-md-10" >
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3>Form Edit User</h3>
					</div>
					  <div class="card-body">
							<?php foreach ($ubah_data as $key => $row): ?>			
				        	<form method="POST" action="<?php echo site_url('gudang/user/user_edit/'.$row->id_user)?>">
							<div class="form-row">
								<div class="col-md-2" hidden="">
									<div class="form-group">
								    	<label style="font-size: 11pt;">ID User</label>
								    	<input type="text" class="form-control" name="id_user" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->id_user?>">
								    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Username</label>
								    	<input type="text" class="form-control" name="username" autofocus style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->username?>">
								    </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label style="font-size: 11pt;">Password</label>
								    	<input type="text" class="form-control" name="password" style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->password?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
								    	<label style="font-size: 11pt;">Hak Akses</label>
								    	<!-- <input type="text" class="form-control" name="Hak Akses" style="font-size: 11pt;" autocomplete="off" value="<?php echo $row->hak_akses?>"> -->
										<select name="hak_akses" class="form-control" required="">
										    <option selected="" value="<?php echo $row->hak_akses?>"><?php echo $row->hak_akses?></option>
										    <option ></option>
										    <option value="Admin">Admin</option>
										    <option value="Adku">Adku</option>
										    <option value="Niaga">Niaga</option>
										    <option value="Direksi">Direksi</option>
										    <option value="Super Admin">Super Admin</option>
									  	</select>
								    </div>
							    </div>
							</div>
							<br>
							  <button type="submit" class="btn btn-primary btn-sm toaster">Simpan</button>
							  <a href="<?php echo site_url('gudang/user/view_user');?>" class="btn btn-secondary btn-sm toaster" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
							</form>
							<?php endforeach ?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>