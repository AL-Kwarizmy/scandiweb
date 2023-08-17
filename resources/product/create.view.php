<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>

</head>
<body>
<form id="product_form" method="POST">
<header>
    <p>
        Product Add
    </p>
    <div>
        <button type="submit" class="btn btn-primary btn-lg">Save</button>

        <a class="btn btn-secondary btn-lg" href="/">
            <span>Cancel</span>
        </a>
    </div>
</header>
<hr class="header-hr"/>
<section>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="sku" class="form-label">SKU</label>
            </div>
            <div class="col-auto">
                <input type="text" id="sku" name="sku" class="form-control" required>
            </div>

            <div class="col-auto">
                <span class="form-text">
                    <?= $data['skuIsEmpty'] ?? ''  ?>
                </span>
                <span class="form-text">
                    <?= $data['skuIsDuplicated'] ?? ''  ?>
                </span>
            </div>

        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="name" class="col-form-label">Name</label>
            </div>
            <div class="col-auto">
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="price" class="col-form-label">Price ($)</label>
            </div>
            <div class="col-auto">
                <input type="number" id="price" name="price" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="productType" class="switcher-label">Type Switcher</label>
            </div>

            <div class="col-auto">
                <select class="form-select" name="type" id="productType" required="required">
                    <option selected value="" disabled="disabled">Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>

        </div>
        <br>
        <div id="product-description">

        </div>

</section>
</form>

<footer class="footer">
    <hr/>
    <div>
        <p>Scandiweb Test assignment</p>
    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../scripts/create.js"></script>
</body>
</html>