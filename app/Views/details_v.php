<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Horizontally center */
            align-items: center;
            /* Vertically center */
            height: 100vh;
            /* Ensure the body takes full height of the screen */
            margin: 0;
            /* Remove any default margins */
            background-color: #f8f8f8;
        }

        .edit-button {
            margin-left: 10px;
        }

        .synopsis h3 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 1.1rem;
            color: #222;
            margin-top: 15px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <a class="logo" href="/" style="text-align: center;"><span class="mark">War </span>Store
    </a><br>
    <div class="movie-container">
        <!-- Movie Poster -->
        <div class="poster">
            <img src="<?= !empty($getDetails['images']) ?  $getDetails['images'][0] : 'https://via.placeholder.com/1280x720?text=No+Image+Available' ?>" alt="<?= $getDetails['title'] ?>" />
        </div>

        <!-- Movie Information -->
        <div class="details">

            <h1 class="title"><?= $getDetails['title'] ?></h1>
            <div class="synopsis">
                <h3>Details
                    <a href="javascript:void(0);" class="edit-button" id="editButton">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </h3>
                <p class="description">
                    <?php if ($getOverviewDb != null) : ?>
                        <?= $getOverviewDb ?>
                    <?php else : ?>
                        <?= $getDetails['description'] ?>
                    <?php endif; ?>
                </p>
                <p class="category">Category: <?= $getDetails['category'] ?></p>
                <p class="price">Price: $<?= number_format($getDetails['price'], 2) ?></p>
                <p class="rating">⭐ Rating: <?= $getDetails['rating'] ?> </p>
                <p class="stock">In Stock: <?= $getDetails['stock'] ?> units</p>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Synopsis -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Edit Details</h2>
            <form action="/updateOverview" method="POST">
                <input type="hidden" name="product_id" value="<?= $getDetails['id'] ?>" />
                <textarea name="overview" rows="6" cols="50" style="text-align:left">
                <?php if ($getOverviewDb != null) : ?>
                    <?= $getOverviewDb ?>
                    <?php else : ?>
                    <?= $getDetails['description'] ?>
                    <?php endif; ?>
                </textarea>
                <br><br>
                <button type="submit" style="align-self: center; background-color: #4CAF50; color: white; padding: 12px 24px; border: none; border-radius: 25px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

</body>
<script>
    var modal = document.getElementById("editModal");
    var editButton = document.getElementById("editButton");
    var closeModal = document.getElementById("closeModal");

    editButton.onclick = function() {
        modal.style.display = "block";
    }

    closeModal.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>