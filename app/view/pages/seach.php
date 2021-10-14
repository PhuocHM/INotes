<h1 class="display-4 text-center">Các kết quả tìm kiếm cho : <?= $title ?></h1>
<div class="space-between"></div>
<div class="container" style="width:1000px">
    <div class="row">
        <div class="col">
            <select class="form-select" aria-label="Default select example">
                <option>Thể loại</option>
                <?php foreach ($types as $key => $type) : ?>
                    <option value="<?= $type->id ?>"><?= $type->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tiêu đề ..." required>
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="space-between"></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    STT
                </th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Phân loại</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $note) : ?>
                <tr>
                    <th scope="row"><?= ++$key ?></th>
                    <td><?= $note->title ?></td>
                    <td><?= $note->name ?></td>
                    <td>
                        <a href="index.php?controller=Home&action=edit&note_id=<?= $note->id ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <a href="index.php?controller=Home&action=delete&note_id=<?= $note->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($result)) : ?>
                <tr>
                    <td colspan="4" style="color:red" class="text-center">Không có kết quả phù hợp</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>