<h1><?= $title ?></h1>

<div class="container">
    <?php  if( ! empty($posts)) : ?>
        <?php foreach ($posts as $post) : ?>
            <div class="card">
                <div class="card-title">
                    <?= $post['title'] ?>
                </div>
                <div class="card-body">
                    <?= $post['text'] ?>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>