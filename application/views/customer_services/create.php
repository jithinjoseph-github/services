<div class="content-wrapper" style="min-height: 790px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers - Add Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://adminlte.io/themes/v3/starter.html#">Home</a></li>
                        <li class="breadcrumb-item active">Customers - Add Service</li>
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
                        <form action="<?= base_url('customerservices/store') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer</label>
                                    <select name="customer_id" id="customers" class="form-control" required>
                                        <?php if (!empty($customer)) : ?>
                                            <option selected value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Service</label>
                                    <select name="service_id" name="service" id="services" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php foreach ($services as $service): ?>
                                            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Start Date</label>
                                    <input name="start_date" type="date" class="form-control" required>
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

<script>
  $(document).ready(function() {
    $('#customers').select2({
      ajax: {
        url: '<?= base_url('customerservices/getcustomers') ?>',
        dataType: 'json',
        data: function (params) {
          return {
            search: params.term,
          };
        },
        processResults: function (data) {
          return {
            results: data
          };
        }
      }
    });
    $('#services').select2();
  });
</script>
