<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" data-backdrop="false"
    aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="resetPassword" action="{{ route('users.updatepwd', $user->id) }}" method="post">

                @csrf
                @method('PUT')
                <div class="modal-body">
                    <p>Are you sure you want to reset the password for this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reset</button>
                </div>

            </form>

        </div>
    </div>
</div>
