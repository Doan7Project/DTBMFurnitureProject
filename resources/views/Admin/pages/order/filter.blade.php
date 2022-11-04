<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    .input-group-append {
        cursor: pointer;
    }

    .gj-datepicker button {
        border: none;
        background-color: rgb(16, 111, 199);
        color: white;
    }
    .gj-datepicker button:hover {
        background-color:  rgb(10, 84, 153);

    }
    .inputdate {
        /* display: flex;
        justify-content: center; */
    }
.dt-buttons>button{
    background-color:  rgb(16, 111, 199);
    border: none;
}
.dt-buttons>button:hover{
    background-color:  rgb(10, 84, 153);
}
</style>

<div class="inputdate row">
    <div class="col-md-3">
        <label for="">From date</label>
        <input class="datepicker" id="fromdate" />
    </div>
    <div class="col-md-3">
        <label for="">To date</label>
        <input class="datepicker" id="todate" />
    </div>
    <div class="col-md-3">
        <label for="">Category</label>
        <select class="form-select" id="searchCategory" aria-label="Default select example">
            <option selected>Choose Category...</option>
            <option value="">All</option>
          </select>
    </div>
    <div class="col-md-3">
        <label for="">Product</label>
        <select class="form-select" id="searchProduct" aria-label="Default select example">
            <option selected>Choose product...</option>
            <option value="">All</option>
          </select>
    </div>
</div>
<script>
    $('#fromdate').datepicker({
        uiLibrary: 'bootstrap5'
    });
    $('#todate').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>