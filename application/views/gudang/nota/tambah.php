<!-- Main content -->
<br><br><br>
<div class="content">
	<div class="container-fluid">
		<div class="row justify-content-md-center" >
			<div class="col-md-10" >
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Input Nota</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('gudang/nota/simpan_nt');?>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label style="font-size: 11pt;">Nomor</label>
									<input class="form-control form-control-sm" type="text" name="nonota" id="nonota" placeholder="ex : xxx/kdunit/bln/thn" required="" autocomplete="off" autofocus="">
									<input class="form-control form-control-sm" type="text" name="kd" hidden="" value="<?php echo $kode?>" >
								</div>
							</div>							
							<div class="col-md-6">
								<div class="form-group">
									<label style="font-size: 11pt;">Order Penjualan</label>
									<input class="form-control form-control-sm" type="text" name="order_penj" required="" autocomplete="off" autofocus="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Order</label>
									<input class="form-control form-control-sm" type="date" name="tgl_order" required="" autocomplete="off" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label style="font-size: 11pt;">Tujuan</label>
									<textarea class="form-control form-control-sm" name="tujuan" rows="3"></textarea>
								</div>
							</div>							
							<div class="col-md-6">
								<div class="form-group">
									<label style="font-size: 11pt;">Keterangan</label>
									<textarea class="form-control form-control-sm" name="ket" rows="3"></textarea>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Nota</label>
									<input class="form-control form-control-sm" type="date" name="tgl_nota" required="" autocomplete="off" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
<!-- 							<div class="col-md-4">
								<div class="form-group">
									<label style="font-size: 11pt;">Status</label>
									<input class="form-control form-control-sm" type="text" name="stat" id="stat">
								</div>
							</div>	
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Perubahan</label>
									<input class="form-control form-control-sm" type="date" name="tgl_nota" required="" autocomplete="off" value="<?php echo date('Y-m-d');?>">
								</div>
							</div> -->
						</div>
						<br>
						<div class="row">
							<div class="col-md-2"><h6><i><b>Detail Nota</b></i></h6></div>
							<div class="col-md-10">
								<hr>
							</div>
						</div>
						<div id="insert-dtlnota"></div>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">							
									<input type="button" class="btn btn-success btn-sm" value="Tambah Form" id="tambah-dtlnota">
									<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-dtlnota">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">							 
									<a href="<?php echo site_url('gudang/nota/view_nota');?>" class="btn btn-secondary btn-sm toaster" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
								</div>
							</div>
						</div>
						<?php echo form_close() ?> 
						<input type="hidden" id="jmldtlnota" value="1"> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->
<script type="text/javascript">
    $(document).ready(function(){
    	$('#nota').keyup(function(){
	        $(this).val($(this).val().toUpperCase());
	    });
        // Tambah Pemesanan
        $("#tambah-dtlnota").click(function(){ // Ketika tombol Tambah Data Form di klik
	    var jumlah = parseInt($("#jmldtlnota").val()); // Ambil jumlah data form pada textbox pesanan baru
	    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
	      
	    // Kita akan menambahkan form dengan menggunakan append
	    // pada sebuah tag div yg kita beri id 
	    $("#insert-dtlnota").append("<div class='row'>"
		+	"<div class='col-md-6'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Nama Barang</label>"
		+			"<input type='text' class='form-control form-control-sm' name='nama_brg[]'>"
		+		"</div>"
		+	"</div>"
		+	"<div class='col-md-3'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Sat 1</label>"
		+			"<input class='form-control form-control-sm' type='text' name='sat1[]' placeholder='BGR/KRG/BOX/ | KG/MTR' required=''>"
		+		"</div>"
		+	"</div>"
		+	"<div class='col-md-3'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Sat 2</label>"
		+			"<input class='form-control form-control-sm' type='text' name='sat2[]' placeholder='YDS' required=''>"
		+		"</div>"
		 +	"</div>"
		// +	"<div class='col-md-2'>"
		// +		"<div class='form-group'>"
		// +			"<label style='font-size: 11pt;'>Tanggal Diperlukan</label>"
		// +			"<input class='form-control form-control-sm' type='date' name='tglperlu[]' required='' autocomplete='off'>"
		// +		"</div>"
		// +	"</div>"
		// +	"<div class='col-md-2'>"
		// +		"<div class='form-group'>"
		// +			"<label style='font-size: 11pt;'>Jumlah Permintaan</label>"
		// +			"<input class='form-control form-control-sm' type='number' name='jml[]' min='0' required='' autocomplete='off'>"
		// +		"</div>"
		// +	"</div>"
		// + "</div>"
		+"<hr>"
		);
		// set id dengan id baru
		/*document.getElementById("barang").id 	= "barang"+nextform;
		document.getElementById("unit").id 		= "unit"+nextform;
		document.getElementById("gudang").id 	= "gudang"+nextform;
		document.getElementById("tglperlu").id 	= "tglperlu"+nextform;
		document.getElementById("jml").id 		= "jml"+nextform;
		document.getElementById("ketdet").id 	= "ketdet"+nextform;*/

		$("#jmldtlnota").val(nextform); // Ubah value textbox jmlorderwoff dengan variabel nextform	
		});

		// Buat fungsi untuk mereset form ke semula
		$("#reset-dtlnota").click(function() {
			var s = confirm("Yakin Reset?");
			if(s){
		     $("#insert-dtlnota").html(""); // Kita kosongkan isi dari div insert-form
		     $("#jmldtlnota").val("1"); // Ubah kembali value jumlah form menjadi 1
		    }else{
		   	 return false;
		    }
		}); 
    });
</script>
