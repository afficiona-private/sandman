<!-- Modal -->
<div class="modal fade" id="jobApplyModal" tabindex="-1" role="dialog" aria-labelledby="jobApplyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body px-2 py-5 text-center">
        <h2 class="h5 mb-3 modal-title text-black text-center">
          <?php echo $title; ?>
        </h2>

        <?php echo do_shortcode( '[contact-form-7 id="370" title="Job Apply Form"]' ); ?>
      </div>
    </div>
  </div>
</div>