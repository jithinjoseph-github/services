<style>
    .top-btn {
        margin-top: 31px;
    }
</style>
<div class="content-wrapper" style="min-height: 790px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $customer['name'] ?> - Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://adminlte.io/themes/v3/starter.html#">Home</a></li>
                        <li class="breadcrumb-item active">Customer Services</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= base_url('customerservices/getlist/') . $customer['id'] ?>">
                        <input type="hidden" name="search" value="1">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Due Date From</label>
                                <input class="form-control" type="date" name="date_from"
                                       value="<?= $dateFrom ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Due Date To</label>
                                <input class="form-control" type="date" name="date_to"
                                       value="<?= $dateTo ?>">
                            </div>
                            <div class="col-md-3">
                                <button class="top-btn btn btn-primary" type="submit">Search</button>
                            </div>
                            <div class="col-md-3">
                                <a class="top-btn btn btn-primary float-right"
                                   href="<?= base_url('customerservices/create/').$customer['id'] ?>">Add Service</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Service</th>
                                    <th>Due Dates</th>
                                    <th>Completed</th>
                                    <th><i class="fa fa-bars"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($services as $service): ?>
                                    <tr>
                                        <td><?= $service['id'] ?></td>
                                        <td><?= $service['service_name'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($service['due_date'])) ?></td>
                                        <td>
                                            <?= !empty($service['completed_at']) ? date('d-m-Y', strtotime($service['completed_at'])) : '' ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('customerservices/edit/' . $service['id']) ?>">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
