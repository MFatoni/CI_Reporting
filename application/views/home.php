<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/js.js"></script>
</head>
<body>
	<div class="d-flex justify-content-center top">
		<div class="col-sm-5 p-5 bg-light rounded border-secondary">
			<h5 class="text-center">INPUT DATA</h5><hr><br>
			<form action="<?php echo base_url('/controllers/inputData'); ?>" method="POST">
				<div class="form-group">
					<input type="text" class="form-control form-control-sm" placeholder="Nama" name="nama"><br>
					<input type="text" class="form-control form-control-sm" placeholder="NPM" name="npm"><br>
					<input type="text" class="form-control form-control-sm" placeholder="Tempat Lahir" name="tempatlahir"><br>
					<input type="date" class="form-control form-control-sm" name="tanggallahir"><br>
					<select class="form-control form-control-sm" name="agama">
						<option>Agama</option>
						<option>Islam</option>
						<option>Kristen Protestan</option>
						<option>Katolik</option>
						<option>Hindu</option>
						<option>Budha</option>
						<option>Kong Hu Cu</option>
				    </select><br>
					<textarea class="form-control form-control-sm" placeholder="Alamat" name="alamat"></textarea><br>
					<?php if(!empty($data)){ foreach($data as $key){ ?>
						<input type="hidden" name="temp[]" value="<?php echo $key; ?>">
					<?php }} ?>
					<table class="table">
						<tr>
							<td><a href="<?php echo base_url(); ?>"><button type="button" class="btn btn-danger btn-sm">HAPUS SEMUA DATA INPUTAN</button></a></td>
							<td class="text-right "><button class="btn btn-sm btn-success" > SUBMIT </button></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</body>
</html>