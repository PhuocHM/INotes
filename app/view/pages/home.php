<h1 class="display-4 text-center">Các ghi chú</h1>
<div class="space-between"></div>
<div class="container" style="width:1000px">
    <div>
        <?php if (isset($_SESSION['messages'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['messages'] ?>
            </div>
            <?php unset($_SESSION['messages']); ?>
        <?php endif; ?>
    </div>
    <div class="space-between"></div>
    <form method="GET">
        <div class="row">
            <div class="col">
                <select name="type_id" class="form-select" aria-label="Default select example">
                    <option>Thể loại</option>
                    <?php foreach ($types as $key => $type) : ?>
                        <option value="<?= $type->id ?>"><?= $type->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="hidden" name="controller" value="Home">
                    <input type="hidden" name="action" value="seach">
                    <input type="text" class="form-control" placeholder="Tiêu đề ..." name="title">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <div class="space-between"></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    STT
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sort-down"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.php?controller=Home&action=sort&col_sort=id&sort_type=ASC">Cũ <i class="fas fa-arrow-right"></i> Mới</a></li>
                            <li><a class="dropdown-item" href="index.php?controller=Home&action=sort&col_sort=id&sort_type=DESC">Mới <i class="fas fa-arrow-right"></i> Cũ</a></li>
                        </ul>
                    </div>
                </th>
                <th scope="col">Tiêu đề
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sort-down"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.php?controller=Home&action=sort&col_sort=title&sort_type=ASC">A <i class="fas fa-arrow-right"></i> Z</a></li>
                            <li><a class="dropdown-item" href="index.php?controller=Home&action=sort&col_sort=title&sort_type=DESC">Z <i class="fas fa-arrow-right"></i> A</a></li>
                        </ul>
                    </div>
                </th>
                <th scope="col">Phân loại
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sort-down"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.php?controller=Home&action=sort&col_sort=name&sort_type=ASC">A <i class="fas fa-arrow-right"></i> Z</a></li>
                            <li><a class="dropdown-item" href="index.php?controller=Home&action=sort&col_sort=name&sort_type=DESC">Z <i class="fas fa-arrow-right"></i> A</a></li>
                        </ul>
                    </div>
                </th>
                <th scope="col">Hành động
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sort-down"></i>
                        </button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $key => $note) : ?>
                <tr>
                    <th scope="row"><?= ++$key ?></th>
                    <td><?= $note->title ?></td>
                    <td><?= $note->name ?></td>
                    <td>
                        <a href="index.php?controller=Home&action=view&note_id=<?= $note->id ?>" class="btn btn-success"><i class="far fa-eye"></i></a>
                        <a href="index.php?controller=Home&action=edit&note_id=<?= $note->id ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <a href="index.php?controller=Home&action=delete&note_id=<?= $note->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="space-between"></div>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="index.php?controller=Home&action=index&page=<?= $pre ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="index.php?controller=Home&action=index&page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?controller=Home&action=index&page=<?= $next ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>