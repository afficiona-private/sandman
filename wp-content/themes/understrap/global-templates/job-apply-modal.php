<!-- Modal -->
<div class="modal fade" id="jobApplyModal" tabindex="-1" role="dialog" aria-labelledby="jobApplyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-4">
        <h2 class="h5 mb-3 modal-title text-black text-center">
          <?php echo $title; ?>
        </h2>

        <?php echo do_shortcode( '[contact-form-7 id="757" title="Job Application"]' ); ?>
      </div>
    </div>
  </div>
</div>