{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to edit your account info
      </div>
      <div class="modal-footer">

        <button class=" btn btn-primary px-4 " type="submit">Edit your account</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}

<style>
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 30%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }

  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {
      top: -300px;
      opacity: 0
    }

    to {
      top: 0;
      opacity: 1
    }
  }

  @keyframes animatetop {
    from {
      top: -300px;
      opacity: 0
    }

    to {
      top: 0;
      opacity: 1
    }
  }

  /* The Close Button */
  .close {
    color: rgb(134, 134, 134);
    float: right;
    font-size: 24px;
  }

  .close:hover,
  .close:focus {
    color: rgb(105, 105, 105);
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    padding: 10px 16px;
    /* background-color: #b2cdf5; */
    color: white;
  }

  .modal-body {
    padding: 20px 20px 0px 20px;
  }

  .modal-footer {
    padding: 10px 16px;
    color: white;
  }
</style>




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">

      <span id="close" class="close">&times;</span>
    </div>
    <div class="modal-body">
      <p>Are you sure for changing your information?</p>
      <p>Please <span class="btn btn-warning text-white">Login agian</span> for continuing to buy product!</p>
    </div>
    <div class="modal-footer">
      <button class=" btn btn-primary" type="submit">Submit</button>
      <a id="closeBtn" class=" btn btn-secondary">Close</a>
    </div>
  </div>

</div>

<script>
  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var displayModal = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var closeModale = document.getElementById("close");
var closeModaleBtn = document.getElementById("closeBtn");
// When the user clicks the button, open the modal 
displayModal.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
  closeModale.onclick = function() {
  modal.style.display = "none";
}
closeModaleBtn.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>