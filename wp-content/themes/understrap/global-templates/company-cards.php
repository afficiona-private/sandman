<?php 
$post_slug = $post->post_name;
?>
<div class="company-cards row <?php echo $post_slug != 'contact-us' ? 'justify-content-center' : '' ?>">
  <?php
    $itemIndex = 0;
    foreach([1,2,3,4,5,6,7] as $index) {
      $animDelay = ($itemIndex + 3) / 10;
      ?>
        <div class="col-6 col-sm-5 col-md-3 wow fadeIn" data-wow-delay="<?php echo $animDelay; ?>s">
          <div class="each p-3 p-md-4">
            <img src="//localhost:3000/wordpress/wp-content/uploads/2020/04/Tata@2x-e1586714742707.png" alt="">
          </div>
        </div>
      <?php
      $itemIndex++;
    }
  ?>
</div>