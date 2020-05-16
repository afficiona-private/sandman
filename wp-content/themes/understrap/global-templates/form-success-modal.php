<?php
$page_slug = $post->post_name;
$form_id = '';
if ($page_slug == 'request-demo' || $page_slug == 'home' || $page_slug == 'about-us') {
  $form_id = '63';
}
if ($page_slug == 'contact-us') {
  $form_id = '258';
}
if ($page_slug == 'invite') {
  $form_id = '468';
}

if ($form_id == '') {
  return;
}

$params = array(
    // 63 is the contact form id for Request Demo form.
    'where'=>"form.id = " . $form_id
);

// Run the find
$title = '';
$message = '';
$btnText = '';

$msgPod = pods( 'forms_success_msg' );
$msgPod->find( $params );
while ( $msgPod->fetch() ) {
  $title = $msgPod->field('message_title');
  $message = $msgPod->field('message');
  $btnText= $msgPod->field('button_text');
}
?>

<!-- Modal -->
<div class="modal fade form-success-modal" id="formSuccessModal" tabindex="-1" role="dialog" aria-labelledby="formSuccessModalLabel" aria-hidden="true">
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