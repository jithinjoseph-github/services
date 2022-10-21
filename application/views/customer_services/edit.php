<div class="content-wrapper" style="min-height: 790px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $service['customer_name'] ?> - Edit Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://adminlte.io/themes/v3/starter.html#">Home</a></li>
                        <li class="breadcrumb-item active">Customers - Edit Service</li>
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
                        <form action="<?= base_url('customerservices/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $service['id'] ?>">
                            <input type="hidden" name="customer_id" value="<?= $service['customer_id'] ?>">
                            <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Completed at</label>
                                    <input name="completed_at" type="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

