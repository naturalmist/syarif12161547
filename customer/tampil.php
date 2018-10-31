<?php
include '../config/class.php';

$data_customer = $stripe->view_customer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Customer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="padding-top: 100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-body">
						<h3 class="text-center">Data Customer</h3>
						<table class="table-bordered table">
							<thead>
								<tr>
									<th>No</th>
									<th>E-mail</th>
									<th>Deskripsi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_customer as $key => $value): ?>
									<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $value['email'] ?></td>
									<td><?php echo $value['description'] ?></td>
									<td>
										<a href="hapus.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
										<a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning btn-xs">Edit</a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<a href="tambah.php" class="btn btn-primary btn-sm">Tambah</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</body>
</html>