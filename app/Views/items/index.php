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

<form action="<?= site_url('item/deleteAll') ?>" method="post" id="formDeleteAll">
<input type="hidden" name="_method" value="DELETE">

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a onclick="tambah()" class="btn btn-sm btn-primary">Tambah <i class="fa fa-plus"></i></a>
            <a class="btn btn-sm btn-info btnMultipleAdd">Mulitple Add <i class="fa fa-plus"></i></a>
            <button type="submit" class="btn btn-sm btn-danger deleteAll">Hapus Semua <i class="fa fa-trash-alt"></i></button>
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Item</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
        <div class="card-text viewdata"></div>

            <table id="example" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th><input type="checkbox" name="checkAll" id="checkAll"></th>
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

<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-users" method="post">
    <?= csrf_field() ?>
      <div class="modal-body">
            <label for="name">Nama ITem</label>
            <input type="text" name="name" id="name" class="form-control">
            
            <label for="category_id">Kategori ITem</label>
            <select name="category_id" id="category_id" class="form-control">
                <option selected disabled>Pilih Kategori</option>
                <?php foreach($categories as $category) : ?>
                    <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>
  </div>
</div>

</form>
<!-- /.Form Delete All -->

<?= $this->endSection() ?>

<?= $this->section('custom-styles') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
let url;
let status = 'tambah';

$(document).ready(function() {
    $('#example').DataTable({
        processing: true,
        serverSide: true,
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

    $('#checkAll').click(function (e) {
        if ($(this).is(":checked")) {
            $('.checkbox').prop('checked', true);
        } else {
            $('.checkbox').prop('checked', false);
        }
    })

    $('#formDeleteAll').submit(function (e) {
        e.preventDefault();
        let total = $('.checkbox:checked');
        if (total.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Perhatian',
                text: 'Maaf silahkan pilih data yang mau dihapus!', 
            });
        } else {
            Swal.fire({
                title: 'Hapus Semua',
                text: 'Yakin ingin menghapus semua ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Ya, Hapus ${total.length} data ini`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success,
                            });
                            window.location.href = ("<?= site_url('item') ?>");
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });
        }
        return false;
    });

    $('.btnMultipleAdd').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('item/multipleForm') ?>",
            // headers: {'X-Requested-With': 'XMLHttpRequest'},
            dataType: 'json',
            beforeSend: function () {
                $('.viewdata').html('<i class="fa fa-spin fa-spinner">')
            },
            success: function (response) {
                $('.viewdata').html(response.data).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    });
});

// function tambah() {
//         status = 'tambah';
//         $('#exampleModal').modal('show');
//         $('#form-users')[0].reset();
//     }

// function edit(id_user) {
//     status = 'edit';
//     $('#exampleModal').modal('show');
//     $('#id_user').val(id_user);
//     $.ajax({
//         url: " echo base_url('home/edit'); ?>",
//         type: 'POST',
//         dataType: 'JSON',
//         data: $('#form-users').serialize(),
//         success: function(x) {
//             if (x.sukses == true) {
//                 $('#nama_user').val(x.data.nama_user);
//                 $('#alamat').val(x.data.alamat);
//             }
//         }
//     });
// }

// function hapus(id_user) {
//     $.ajax({
//         url: " echo base_url('home/hapus'); ?>",
//         type: 'POST',
//         dataType: 'JSON',
//         data: {
//             id_user: id_user
//         },
//         success: function(x) {
//             if (x.sukses == true) {
//                 tampil_table_users();
//             }
//         }
//     });
// }

// function proses() {
//     if (status == 'tambah') {
//         url = " echo base_url('item/create'); ?>";
//     } else if (status == 'edit') {
//         url = " echo base_url('item/update'); ?>";
//     } else {
//         url = " echo base_url('item/delete'); ?>";
//     }

//     $.ajax({
//         url: url,
//         headers: {'X-Requested-With': 'XMLHttpRequest'},
//         type: 'POST',
//         // dataType: 'JSON',
//         data: $('#form-users').serialize(),
//         success: function(x) {
//             if (x.sukses == true) {
//                 $('#exampleModal').modal('hide');
//                 tampil_table_users();
//             }
//         }
//     });
// }

// function show_tables() {
//     $('#example').DataTable({
//         processing: true,
//         serverSide: true,
//         responsive: true,
//         ajax: {
//             url: "<?= base_url('item/datatables') ?>",
//             type: "GET",
//             data: {},
//         },
//         columnDefs: [{
//                 targets: [0, -1],
//                 orderable: false,
//             },
//             {
//                 width: "1%",
//                 targets: [0, -1],
//             },
//             {
//                 className: "dt-nowrap",
//                 targets: [-1],
//             }
//         ],
//     });
// }

</script>

<?= $this->endSection() ?>