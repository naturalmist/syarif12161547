<?php
include '../config/class.php';

$ambil = $stripe->take_customer($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Customer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="padding-top: 100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-body">
						<h3 class="text-center">Edit Customer</h3>
						<form method="POST">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" name="email" value="<?php echo $ambil['email']; ?>">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="text" class="form-control" name="deskripsi" value="<?php echo $ambil['description'] ?>">
							</div>
							<button class="btn btn-primary btn-sm" name="update">Update</button>
						</form>
						<?php
						if(isset($_POST['update']))
						{
							$result = $stripe->update_customer($_POST['email'],$_POST['deskripsi'],$_GET['id']);

							if($result['tax_info']==null)
							{
								echo "<script>alert('Customer berhasil diupdate');location='tampil.php';</script>";
							}
							else
							{
									echo "<script>alert('Customer gagal diupdate');location='edit.php".$_GET['id']."';</script>";
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