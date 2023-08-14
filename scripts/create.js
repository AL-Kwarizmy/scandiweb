$('#productType').on("change", function () {
    if ($('#productType').find(":selected").val() === 'DVD')
    {
        $('#product-description').html(`
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2">
                    <label for="size" class="col-form-label">Size (MB)</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="size" name="size" class="form-control">
                </div>
            </div>
            <br>
        `)
    } else if ($('#productType').find(":selected").val() === 'Furniture')
    {
        $('#product-description').html(`
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2">
                    <label for="height" class="col-form-label">Height (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="height" name="height" class="form-control">
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2"">
                    <label for="width" class="col-form-label">Width (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="width" name="width" class="form-control">
                </div>
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2">
                    <label for="length" class="col-form-label">Length (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="length" name="length" class="form-control">
                </div>
            </div>
            <br>
        `)
    } else if ($('#productType').find(":selected").val() === 'Book')
    {
        $('#product-description').html(`
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2">
                    <label for="weight" class="col-form-label">Weight (KG)</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="weight" name="weight" class="form-control">
                </div>
            </div>
            <br>
        `)
    } else {
        $('#product-description').html(``)
    }
});