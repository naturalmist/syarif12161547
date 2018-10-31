<?php
include '../config/class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Customer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="padding-top: 100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-body">
						<h3 class="text-center">Tambah Customer</h3>
						<form method="POST">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="text" class="form-control" name="deskripsi">
							</div>
							<button class="btn btn-primary btn-sm" name="save">Save</button>
						</form>
						<?php
						if(isset($_POST['save']))
						{
							$result = $stripe->create_customer($_POST['email'],$_POST['deskripsi']);

							if($result['tax_info']==null)
							{
								echo "<script>alert('Customer berhasil ditambah');location='tampil.php';</script>";
							}
							else
							{
									echo "<script>alert('Customer gagal ditambah');location='tambah.php';</script>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</body>
</html>