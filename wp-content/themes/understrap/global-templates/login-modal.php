<?php
$invitePageLink = get_permalink( get_page_by_path( 'invite' ) );
?>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-close" data-dismiss="modal" aria-label="Close">
        <i class="fa fa-times" aria-hidden="true"></i>
      </div>
      <div class="modal-body p-4">
        <h2 class="modal-title text-primary text-center">Welcome</h2>
        <h3 class="text-center mb-5">Login to your account</h3>

        <!-- Login Form -->
        <form id="loginForm"> <!-- the handler is mentioned in custom-javascript.js  -->
          <div class="form-group">
            <input type="text" pattern="[^\s]+" class="form-control" id="loginUsername" placeholder="Username">
          </div>
          <!-- Username -->
          <div class="form-group">
            <input type="password" pattern="[^\s]+" class="form-control" id="loginPassword" placeholder="Password">
          </div>
          <!-- Password -->

          <p class="text-center"><a href="#" class="text-body">Forgot your password?</a></p>

          <div class="row justify-content-center">
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary btn-block mb-5">Log In</button>
            </div>
          </div>

          <p class="text-center">Interested to try Sandman</p>
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <a type="button" href="<?php echo $invitePageLink; ?>" class="btn btn-secondary btn-block">
                Request an Invite
              </a>
            </div>
          </div>
          <!-- Password-->
        </form>
      </div>
    </div>
  </div>
</div>