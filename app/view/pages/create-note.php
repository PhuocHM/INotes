<h1 class="display-4 text-center">Thêm ghi chú</h1>
<div class="space-between"></div>
<div class="container" style="width:800px">
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control <?= (isset($errors['title'])) ? 'is-invalid' : '' ?>" id="title" name="title">
            <div id="emailHelp" class="form-text" style="color:red"><?= (isset($errors['title'])) ? $errors['title'] : ''; ?></div>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Loại</label>
            <select name="type_id" id="type_id" class="form-select <?= (isset($errors['type_id'])) ? 'is-invalid' : '' ?>">
                <option value="" selected>Chọn loại</option>
                <?php foreach ($types as $key => $type) : ?>
                    <option value="<?= $type->id ?>"><?= $type->name ?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-text" style="color:red"><?= (isset($errors['type_id'])) ? $errors['type_id'] : ''; ?></div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea rows="10" cols="50" class="form-control <?= (isset($errors['content'])) ? 'is-invalid' : '' ?>" name="content" id="content"></textarea>
            <div id="emailHelp" class="form-text" style="color:red"><?= (isset($errors['content'])) ? $errors['content'] : ''; ?></div>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="index.php?controller=Home&action=index" class="btn btn-danger">Hủy</a>
    </form>
</div>