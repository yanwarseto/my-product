<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>War Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>

<body>
    <nav>
        <a class="logo" href="/"><span class="mark">War </span>Store</a>
        <form method="GET" action="<?= base_url('home/search') ?>" id="searchForm">
            <input type="text" name="search" placeholder="Search" class="search_input" />
            <div class="search_icon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </form>
    </nav>

    <ul class="product_list_ul" id="productUI">
        <?php if (!empty($product)) : ?>
            <?php foreach ($product as $p) : ?>
                <li class="product_list_item">
                    <img src="<?= !empty($p['images']) ?  $p['images'][0] : 'https://via.placeholder.com/1280x720?text=No+Image+Available' ?>" alt="<?= $p['title'] ?>" />
                    <div class="product_info">
                        <h3><?= $p['title'] ?></h3>
                        <span class=""><?= !empty($p['brand']) ?  $p['brand'] : '-' ?> </span>
                    </div>
                    <div class="overview">
                        <h3>Detail</h3>
                        <p> <?php
                            if (isset($getDetailDb[$p['id']]) && $getDetailDb[$p['id']] != null) : ?>
                                <?= $getDetailDb[$p['id']] ?>
                            <?php else : ?>
                                <?= $p['description'] ?>
                            <?php endif; ?>
                        </p>

                        <a class="details-button" href="/details/<?= $p['id'] ?>">Details</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>