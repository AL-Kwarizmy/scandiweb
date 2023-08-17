<!DOCTYPE html>
<html lang="">
<head>
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/product.css">
    <link rel="stylesheet" href="../../styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Scandiweb</title>

</head>

<body>
<form method="POST" action="/product/delete">
<header>
    <p>
        Product List
    </p>
    <div>
        <a  class="btn btn-outline-success btn-lg" href="/product/create">
            <span>ADD</span>
        </a>
        <button type="submit" class="btn btn-outline-danger btn-lg mx-3" id="delete-product-btn">MASS DELETE</button>
    </div>
</header>

<hr class="header-hr"/>
<section>
    <div class="product-list">
        <?php foreach($data as $product) : ?>
        <div class="product">
            <div class="form-check checkbox">
                <input class="form-check-input delete-checkbox" type="checkbox" name="<?= $product->getSku() ?>" value="<?= $product->getId() ?>">
            </div>
            <div class="product-data">
                <p><?= $product->getSku() ?></p>
                <p><?= $product->getName() ?></p>
                <p><?= number_format($product->getPrice(), 2, '.', '') ?> $</p>
                <p><?= $product->productDescription() ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
</form>
<footer class="footer">
    <hr/>
    <div>
        <p>Scandiweb Test assignment</p>
    </div>
</footer>
</body>

</html>