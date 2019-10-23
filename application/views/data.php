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
	<div class="container-fluid">
		<h3 class="pt-4 text-center">Tampilan Data Export</h3><br>
		<div class="table-responsive">
			<table border="1" class="table">
				<thead class="thead-dark text-center">
					<tr>
						<th>NO</th>
						<th>NAMA</th>
						<th>NPM</th>
						<th>TEMPAT LAHIR</th>
						<th>TANGGAL LAHIR</th>
						<th>AGAMA</th>
						<th>ALAMAT</th>
					</tr>
				</thead>
				<?php
					$param1=count($data)/6;
					$param3=0;
					for ($i=0; $i < $param1; $i++) { 
						$param2=0;$no=$i+1?>
						<tr><td class="text-center"><?php echo $no; ?></td>
						<?php
						for ($param2=0; $param2 < 6; $param2++) { ?>
							<td class="text-center"><?php echo $data[$param3]; ?></td>
						<?php $param3++; } ?>
						</tr>
					<?php }
				?>
			</table>
		</div><br>
		<form action="<?php echo base_url('/controllers/tambahData'); ?>" method="POST" class="text-right">
			<?php foreach ($data as $key) {?>
				<input type="hidden" name="data[]" value="<?php echo $key; ?>">
			<?php } ?>
			<span class="float-left text-left">
				<a href="<?php echo base_url(); ?>">
					<button type="button" class="btn btn-danger btn-sm ">HAPUS SEMUA DATA INPUTAN</button>
				</a>
			</span>
			<input type="submit" value="Tambah Data" class="btn btn-sm btn-success">
			<input type="submit" formaction="<?php echo base_url('/controllers/exportData'); ?>" value="Export Ke Excel" class="btn btn-sm btn-success">
		</form>
	</div>
</body>
</html>