<form action="<?= site_url('item/multipleSave') ?>" id="formMultipleAdd"  method="post">
<?= csrf_field() ?>
<div class="mb-3">
    <a type="button" class="btn btn-sm btn-primary btnBack">Kembali</a>
    <button type="submit" class="btn btn-sm btn-primary btnSaveAll">Simpan Semua</button>
</div>
    <table class="table table-sm table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Nama Kategori</th>
                <th><i class="fa fa-cog"></i><th>
            </tr>
        </thead>

        <tbody class="formAdd">
            <tr>
                <td>
                    <input type="text" name="name[]" class="form-control">
                </td>
                <td>
                    <select name="category_id[]" class="form-control">
                        <option selected disabled>Pilih Kategori</option>
                        <?php foreach($categories as $category) : ?>
                            <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary btnAddForm"><i class="fa fa-plus"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

</form>

<script>

$(document).ready(function (e) {

    $('#formMultipleAdd').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('.btnSaveAll').attr('disabled', 'disabled');
                $('.btnSaveAll').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function () {
                $('.btnSaveAll').removeAttr('disabled');
                $('.btnSaveAll').html('Simpan');
            },
            success: function (response) {
                if (response.success) {
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: `${response.success}`,
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = ("<?= site_url('item') ?>")
                        }
                    })
                    // window.location.href = ("<?= site_url('item') ?>");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }   
        });
        return false;
    });

    $('.btnAddForm').click(function (e) {
        e.preventDefault();

        $('.formAdd').append(`
            <tr>
                <td>
                    <input type="text" name="name[]" class="form-control">
                </td>
                <td>
                    <select name="category_id[]" class="form-control">
                        <option selected disabled>Pilih Kategori</option>
                        <?php foreach($categories as $category) : ?>
                            <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger btnDeleteForm"><i class="fa fa-trash-alt"></i></button>
                </td>
            </tr>
        `);
    });
});

$(document).on('click', '.btnDeleteForm', function(e) {
    e.preventDefault();
    $(this).parents('tr').remove();
});

$(document).on('click', '.btnBack', function(e) {
    e.preventDefault();
    $(this).parents('.viewdata').empty();
});

</script>


