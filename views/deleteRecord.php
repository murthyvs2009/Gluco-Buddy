<div class="modal" tabindex="-10" style="top:200px; display: block !important;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Record</h5>
        <?php $MainUrl = BASEURL . "WeeklyRecord"; ?>
        <button type="button" class="close" data-dismiss="modal" onClick="redirect('<?php echo $MainUrl; ?>')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this record?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onClick="redirect('<?php echo $MainUrl; ?>')" data-dismiss="modal">Close</button>
      <form action="" method="POST">
      <input type="submit" name="deleteModalSubmit" class="btn btn-danger" value="Delete"/>
      </form>
      </div>
    </div>
  </div>
</div>

<script>
  function redirect(url) {
    // Perform redirection using JavaScript
    window.location.href = url;
  }
</script>
