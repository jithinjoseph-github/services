<div class="content-wrapper" style="min-height: 790px;">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Customers</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="https://adminlte.io/themes/v3/starter.html#">Home</a></li>
						<li class="breadcrumb-item active">Customers</li>
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
									<th>Contact No.</th>
									<th>Email</th>
									<th><i class="fa fa-bars"></i></th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($customers as $customer): ?>
									<tr>
										<td><?= $customer['id'] ?></td>
										<td><?= $customer['name'] ?></td>
										<td><?= $customer['phone'] ?></td>
										<td><?= $customer['email'] ?></td>
										<td>
                                            <a href="<?= base_url('customerservices/getlist/'.$customer['id']) ?>">
                                                Services
                                            </a>
                                        </td>
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
