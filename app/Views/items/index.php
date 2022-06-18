<?= $this->extend('layouts/default', compact('title')) ?>

<?= $this->section('content') ?>

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Tables</a></li>
			<li><a href="#">Data Tables</a></li>
		</ol>
	</div>
</div>

<div class="page-header">
    <a class="btn btn-primary btn-sm" onclick="tambah()"><span><i class="fa fa-users"></i></span> Tambah </a>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-usd"></i>
					<span>Data Item</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
                
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Category ID</th>
							<th>ACtion</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal titleh</5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-users">
                    <div class="form-group">
                        <label for="name">Nama Item</label>
                        <input type="hidden" name="item_id" id="item_id">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <input type="text" class="form-control" id="category_id" name="category_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Closebutton>
                <button type="button" class="btn btn-primary" onclick="proses()">Save changesbutton>
            </div>
        </div>
    </div>
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