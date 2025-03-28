<?php include 'app/views/shares/header.php'; ?>

<!-- Kiểm tra và hiển thị lỗi -->
<?php if (isset($errors) && !empty($errors)): ?>
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach ($errors as $err): ?>
                    <li><?php echo htmlspecialchars($err); ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<!-- Form đăng ký -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0 p-4 animate__animated animate__fadeIn" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h3 class="text-center mb-4 font-weight-bold text-dark">Create Your Account</h3>
            <p class="text-center text-muted mb-4">Join us to explore exclusive deals!</p>
            
            <form class="user" action="/account/save" method="post" novalidate>
                <div class="form-group">
                    <label for="username" class="font-weight-semibold">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-user" id="username" name="username" 
                               placeholder="Enter your username" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fullname" class="font-weight-semibold">Full Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-user" id="fullname" name="fullname" 
                               placeholder="Enter your full name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-semibold">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-user" id="password" name="password" 
                               placeholder="Enter your password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmpassword" class="font-weight-semibold">Confirm Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" 
                               placeholder="Confirm your password" required>
                    </div>
                </div>

                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-block py-2 text-uppercase font-weight-bold">
                        Register Now
                    </button>
                </div>

                <div class="text-center mt-3">
                    <small class="text-muted">Already have an account? 
                        <a href="/account/login" class="text-primary font-weight-bold">Login here</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>