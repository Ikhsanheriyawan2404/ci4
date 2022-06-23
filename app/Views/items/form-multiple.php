<form action="" method="post">
<div class="mb-3">
    <a href="<?= site_url('item') ?>" class="btn btn-sm btn-primary">Kembali</a>
    <button type="submit" class="btn btn-sm btn-primary btnSave">Simpan Semua</button>
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
                    <select name="category_id" class="form-control">
                        <option value="">Haha</option>
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
    $('.btnAddForm').click(function (e) {
        e.preventDefault();

        $('.formAdd').append(`
            <tr>
                <td>
                    <input type="text" name="name[]" class="form-control">
                </td>
                <td>
                    <select name="category_id" class="form-control">
                        <option value="">Haha</option>
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

</script>