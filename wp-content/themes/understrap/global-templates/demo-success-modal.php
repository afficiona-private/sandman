<?php
$params = array(
    // 63 is the contact form id for Request Demo form.
    'where'=>"form.id = '63'"
);

// Run the find
$title = 'Thank you for requesting a demo of our software!';
$message = 'We will get back to you shortly with a convenient time and place for the demo. In the meantime we are sending you some additional information of our software.';
$btnText = 'Okay';

$msgPod = pods( 'form_success_message' );
$msgPod->find( $params );
while ( $msgPod->fetch() ) {
  $title = $msgPod->field('message_title');
  $message = $msgPod->field('message');
  $btnText= $msgPod->field('button_text');
}
?>

<!-- Modal -->
<div class="modal fade" id="demoSuccessModal" tabindex="-1" role="dialog" aria-labelledby="demoSuccessModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body px-2 py-5 text-center">
        <h2 class="h5 mb-3 modal-title text-black text-center">
          <?php echo $title; ?>
        </h2>
        <p class="px-4 mb-4">
          <?php echo $message; ?>
        </p>

        <div class="row justify-content-center">
          <div class="col-12 col-md-4">
            <button class="btn btn-secondary btn-block" data-dismiss="modal" aria-label="Close">
              <?php echo $btnText; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>