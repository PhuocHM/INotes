<h1 class="display-4 text-center">Chỉnh sửa ghi chú</h1>
<div class="space-between"></div>

<div class="container" style="width:800px">
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $note->title ?>">
            <div id="emailHelp" class="form-text" style="color:red"><?= (isset($errors['title'])) ? $errors['title'] : ''; ?></div>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Loại</label>
            <select name="type_id" id="type_id" class="form-select">
                <option value="" selected>Chọn loại</option>
                <?php foreach ($types as $key => $type) : ?>
                    <option <?php if ($type->id == $note->type_id) {
                                echo 'selected';
                            } ?> value="<?= $type->id ?>"><?= $type->name ?></option>
                <?php endforeach; ?>
            </select>
            <div id="emailHelp" class="form-text" style="color:red"><?= (isset($errors['type_id'])) ? $errors['type_id'] : ''; ?></div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea rows="10" cols="50" class="form-control" name="content" id="content"><?= $note->content ?></textarea>
            <div id="emailHelp" class="form-text" style="color:red"><?= (isset($errors['content'])) ? $errors['content'] : ''; ?></div>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <button type="submit" class="btn btn-danger">Hủy</button>
    </form>
</div>