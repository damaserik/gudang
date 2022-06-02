<br><br><br>
<div class="container">
	<h3>Form User</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('gudang/user/simpan_user/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4" hidden="">
				    <label>ID User</label>
				    <input type="text" class="form-control" name="id_user" autocomplete="off">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Username</label>
				    <input type="text" class="form-control" name="username" autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-6">
				    <label>Password</label>
				    <input type="text" class="form-control" name="password" autocomplete="off">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Hak Akses</label>
					<select name="hak_akses" class="form-control">
				    <option>-- Pilih --</option>
				    <option value="Admin">Admin</option>
				    <option value="Adku">Adku</option>
				    <option value="Niaga">Niaga</option>
				    <option value="Direksi">Direksi</option>
				    <option value="Super Admin">Super Admin</option>
				  	</select>
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('gudang/user/view_user');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>