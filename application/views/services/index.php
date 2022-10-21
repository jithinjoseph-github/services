<div class="content-wrapper" style="min-height: 790px;">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Services</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="https://adminlte.io/themes/v3/starter.html#">Home</a></li>
						<li class="breadcrumb-item active">Services</li>
					</ol>
				</div>
			</div>
		</div>
	</div>


	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">

						<div class="card-body p-0">
							<table class="table">
								<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Name</th>
									<th>type</th>
									<th><i class="fa fa-bars"></i></th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($services as $service): ?>
									<tr>
										<td><?= $service['id'] ?></td>
										<td><?= $service['name'] ?></td>
										<td><?= $service['type'] ?></td>
										<td></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>

			</div>

		</div>
	</div>

</div>
