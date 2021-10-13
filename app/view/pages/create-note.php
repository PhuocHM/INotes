<h1 class="display-4 text-center">Thêm ghi chú</h1>
<div class="space-between"></div>
<div class="container" style="width:800px">
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Loại</label>
            <select name="type_id" id="type_id" class="form-select">
                <option selected>Chọn loại</option>
                <?php foreach ($types as $key => $type) : ?>
                    <option value="<?= $type->id ?>"><?= $type->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea rows="10" cols="50" class="form-control" name="content" id="content"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <button type="submit" class="btn btn-danger">Hủy</button>
    </form>
</div>