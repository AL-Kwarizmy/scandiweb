$('#productType').on("change", function () {
    if ($('#productType').find(":selected").val() === 'DVD')
    {
        $('#product-description').html(`
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2">
                    <label for="size" class="col-form-label">Size (MB)</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="size" name="size" class="form-control" aria-describedby="sizeHelpInLine" required>
                </div>
                  <div class="col-auto">
                    <span id="sizeHelpInLine" class="form-text">
                        Please provide disc space in MB.
                    </span>
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
                    <input type="number" id="height" name="height" class="form-control" required>
                </div> 
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2"">
                    <label for="width" class="col-form-label">Width (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="width" name="width" class="form-control" required>
                </div>            
            </div>
            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-1 col-sm-2">
                    <label for="length" class="col-form-label">Length (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="length" name="length" class="form-control" required>
                </div>
            </div>
            <br>
            <div id="dimensionsHelpBlock" class="form-text">
                Please provide dimensions in HxWxL format.
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
                    <input type="number" step="any" id="weight" name="weight" class="form-control" aria-describedby="weightHelpInLine" required>
                </div>
                 <div class="col-auto">
                    <span id="weightHelpInLine" class="form-text">
                        Please provide weight in Kg.
                    </span>
                 </div>                
            </div>
            <br>
        `)
    } else {
        $('#product-description').html(``)
    }
});

$( "#productType" ).validate({
    rules: {
        type: { required: true }
    }
});