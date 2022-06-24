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
            <button name="btnAdd" id="btnAdd" class="btn btn-sm btn-primary">Tambah <i class="fa fa-plus"></i></button>
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Kategori</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
        <div class="card-text viewdata"></div>

            <table id="datatables" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Name</th>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" id="form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <span id="name_error" class="text-danger"></span>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="hidden" name="hidden_id" id="hidden_id">
            <input type="hidden" name="action" id="action" value="Add">
            <button type="submit" name="submit" id="submit_button" class="btn btn-primary">Simpan</button>
        </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('custom-styles') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

$(document).ready(function() {
	$('#datatables').DataTable({
		"aoColumnDefs": [{ 
			"bSortable": true,
			"aTargets": [ 0,1,2 ] 
		}],
		"order":[],
		"serverSide":true,
		"searching": true,
		"lengthChange":true,
		"ajax":{
			url:"<?=base_url('category/datatables')?>",
			type:'GET'
		}
	});

    $('#btnAdd').click(function(){
        $('#form')[0].reset();
        $('.modal-title').text('Tambah Data');
        $('#name_error').text('');
        $('#action').val('Add');
        $('#submit_button').val('Add');
        $('#exampleModal').modal('show');
    });

    $('#user_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url('category/action'); ?>",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            beforeSend:function(){
                $('#submit_button').val('tunggu...');
                $('#submit_button').attr('disabled', 'disabled');
            }, 
            success:function(data)
            {
                $('#submit_button').val('Simpan');
                $('#submit_button').attr('disabled', false);
                if(data.error == 'yes') {
                    $('#name_error').text(data.name_error);
                } else {
                    $('#userModal').modal('hide');
                    $('#message').html(data.message);
                    $('#sample_table').DataTable().ajax.reload();
                    setTimeout(function(){
                        $('#message').html('');
                    }, 5000);
                }
            }
        })
    });
});
</script>

<?= $this->endSection() ?>