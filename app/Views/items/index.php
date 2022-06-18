<?= $this->extend('layouts/default', compact('title')) ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0"><?= $title ?? '' ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a href="" class="btn btn-sm btn-primary">Tambah <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Item</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Name</th>
                        <th>Nama Kategori</th>
                        <th class="text-center" style="width: 10%"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<?= $this->section('custom-styles') ?>

<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<?= $this->endSection() ?>

<?= $this->endSection('content') ?>

<?= $this->section('custom-scripts') ?>

<!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
let url;
let status = 'tambah';

$(document).ready(function() {
    show_tables();
});

function tambah() {
        status = 'tambah';
        // alert('htest');
        $('#exampleModal').modal('show');
        $('#form-users')[0].reset();
    }

function edit(id_user) {
    status = 'edit';
    $('#exampleModal').modal('show');
    $('#id_user').val(id_user);
    $.ajax({
        url: " echo base_url('home/edit'); ?>",
        type: 'POST',
        dataType: 'JSON',
        data: $('#form-users').serialize(),
        success: function(x) {
            if (x.sukses == true) {
                $('#nama_user').val(x.data.nama_user);
                $('#alamat').val(x.data.alamat);
            }
        }
    });
}

function hapus(id_user) {
    $.ajax({
        url: " echo base_url('home/hapus'); ?>",
        type: 'POST',
        dataType: 'JSON',
        data: {
            id_user: id_user
        },
        success: function(x) {
            if (x.sukses == true) {
                tampil_table_users();
            }
        }
    });
}

function proses() {
    if (status == 'tambah') {
        url = " echo base_url('home/tambah'); ?>";
    } else if (status == 'edit') {
        url = " echo base_url('home/update'); ?>";
    } else {
        url = " echo base_url('home/hapus'); ?>";
    }

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: $('#form-users').serialize(),
        success: function(x) {
            if (x.sukses == true) {
                $('#exampleModal').modal('hide');
                tampil_table_users();
            }
        }
    });
}

function show_tables() {
    $('#example').DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        responsive: true,
        ajax: {
            url: "<?= base_url('item/datatables') ?>",
            type: "GET",
            data: {},
        },
        columnDefs: [{
                targets: [0, -1],
                orderable: false,
            },
            {
                width: "1%",
                targets: [0, -1],
            },
            {
                className: "dt-nowrap",
                targets: [-1],
            }
        ],
    });
}

</script>

<?= $this->endSection() ?>