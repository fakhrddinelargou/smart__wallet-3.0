<!-- check password -->
<?php echo  $_SESSION['mode'] ?>
<?php if(isset($_SESSION['mode']) and $_SESSION['mode'] == 'password') { ?>
<!-- Error Alert -->
<div
  id="emailError"
  class="hidden fixed top-5 left-1/2 -translate-x-1/2
         bg-red-100 text-red-700
         px-6 py-2 rounded-md shadow-md
         text-sm"
>
  Password is incorrect
</div>
<?php unset($_SESSION['mode']) ?>
<?php } ?>


<!-- check if is it there -->
<?php if(isset($_SESSION['mode']) and $_SESSION['mode'] == 'errorEmail') { ?>
<!-- Error Alert -->
<div
  id="emailError"
  class="hidden fixed top-5 left-1/2 -translate-x-1/2
         bg-red-100 text-red-700
         px-6 py-2 rounded-md shadow-md
         text-sm"
>
  Email not found
</div>
<?php unset($_SESSION['mode']) ?>
<?php } ?>

<script>

    