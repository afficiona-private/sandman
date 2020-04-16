<?php 
$post_slug = $post->post_name;
?>
<div class="company-cards row">
  <?php
    foreach([1,2,3,4,5,6,7] as $index) {
      ?>
        <div class="col-6 col-sm-5 col-md-3">
          <div class="each p-2 p-sm-3 p-md-5">
            <img src="//localhost:3000/wordpress/wp-content/uploads/2020/04/Tata@2x-e1586714742707.png" alt="">
          </div>
        </div>
      <?php
    }
  ?>
</div>