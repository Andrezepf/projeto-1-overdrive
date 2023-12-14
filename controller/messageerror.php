<?php
if(isset($_SESSION['messageerror'])) :
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?= $_SESSION['messageerror']; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php 
unset($_SESSION['messageerror']);
endif;
?>