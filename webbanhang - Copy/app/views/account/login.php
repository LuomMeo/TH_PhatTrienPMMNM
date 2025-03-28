<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white animate__animated animate__fadeIn" style="border-radius: 1.5rem;">
                    <div class="card-body p-5 text-center">
                        <form action="/account/checklogin" method="post">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-3 text-uppercase">Welcome Back</h2>
                                <p class="text-white-70 mb-5">Log in to access exclusive deals!</p>

                                <div class="form-outline form-white mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-light"><i class="fas fa-user"></i></span>
                                        <input type="text" name="username" class="form-control form-control-lg" id="typeEmailX" 
                                               placeholder="Username" required />
                                    </div>
                                    <label class="form-label" for="typeEmailX">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-light"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control form-control-lg" id="typePasswordX" 
                                               placeholder="Password" required />
                                    </div>
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label text-white-70" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#!" class="text-white-50 text-decoration-none small">Forgot Password?</a>
                                </div>

                                <button class="btn btn-primary btn-lg px-5 py-2" type="submit">Login</button>

                                <div class="d-flex justify-content-center text-center mt-5 pt-1">
                                    <a href="#!" class="social-icon text-white mx-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="social-icon text-white mx-3"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#!" class="social-icon text-white mx-3"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? 
                                    <a href="/account/register" class="text-white-50 fw-bold text-decoration-none">Sign Up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    /* Gradient Background */
    .gradient-custom {
        background: linear-gradient(135deg, #1e2a38 0%, #0f1419 100%);
    }

    /* Card Styling */
    .card {
        background: linear-gradient(145deg, #283541, #1c2529);
        border: none;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        border-radius: 1.5rem;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        padding: 3.5rem 3rem !important;
    }

    /* Heading and Text */
    h2 {
        font-family: 'Poppins', sans-serif;
        font-size: 2.25rem;
        letter-spacing: 1.5px;
        color: #ffffff;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .text-white-70 {
        color: rgba(255, 255, 255, 0.7) !important;
        font-size: 1.1rem;
    }

    /* Form Inputs */
    .form-outline {
        position: relative;
        margin-bottom: 2rem !important;
    }

    .input-group-text {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border-radius: 0.5rem 0 0 0.5rem;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-left: none;
        color: #ffffff;
        padding: 0.85rem 1.25rem;
        border-radius: 0 0.5rem 0.5rem 0;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: #007bff;
        box-shadow: 0 0 12px rgba(0, 123, 255, 0.3);
        color: #ffffff;
        outline: none;
    }

    .form-label {
        position: absolute;
        top: 50%;
        left: 3.5rem;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.6);
        font-size: 1rem;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-control:focus + .form-label,
    .form-control:not(:placeholder-shown) + .form-label {
        top: -0.75rem;
        left: 2.5rem;
        font-size: 0.85rem;
        color: #007bff;
        background: linear-gradient(145deg, #283541, #1c2529);
        padding: 0 0.35rem;
    }

    /* Checkbox */
    .form-check-input {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-check-input:checked {
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Button */
    .btn-primary {
        background: linear-gradient(90deg, #007bff, #0056b3);
        border: none;
        padding: 0.85rem 3rem;
        border-radius: 0.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #0056b3, #003d82);
        box-shadow: 0 5px 20px rgba(0, 123, 255, 0.4);
        transform: translateY(-3px);
    }

    /* Social Icons */
    .social-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .social-icon i {
        font-size: 1.5rem;
    }

    /* Links */
    .text-white-50.text-decoration-none:hover {
        color: #007bff !important;
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .card-body {
            padding: 2.5rem 2rem !important;
        }

        h2 {
            font-size: 1.75rem;
        }

        .btn-primary {
            padding: 0.75rem 2rem;
        }

        .social-icon {
            width: 42px;
            height: 42px;
        }

        .social-icon i {
            font-size: 1.25rem;
        }
    }
</style>