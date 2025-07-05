
<!-- Modal for Registration -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
        max-width: 400px;
    ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Admin Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Message Box -->
                <div id="registerMessage" class="alert d-none"></div>

                <form id="registerForm" novalidate>
                    <div class="mb-3">
                        <label for="user" class="form-label">Username</label>
                        <input type="text" id="user" name="user" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="pass_confirm" class="form-label">Confirm Password</label>
                        <input type="password" id="pass_confirm" name="pass_confirm" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>

                <div class="mt-3 text-center">
                    Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#authModal" data-bs-dismiss="modal">Login here</a>.
                </div>
            </div>
        </div>
    </div>
</div>
