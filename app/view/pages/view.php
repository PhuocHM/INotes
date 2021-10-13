<h1 class="display-4 text-center">Xem ghi chú</h1>
<div class="space-between"></div>


<div class="container" style="width:800px">
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center"><?= $note->title ?></h5>
            <p class="card-text text-center"><?= $note->content ?></p>
            <a href="index.php?controller=Home&action=index" class="btn btn-danger"><i class="fas fa-arrow-left">&ensp;Back</i></a>
        </div>
    </div>

</div>