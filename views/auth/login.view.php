<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
    <!-- APP CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/styles.css'); ?>">
    <style>

        body{
            background-color:#99ffee;
    background-image:
    radial-gradient(at 81% 66%, hsla(178,76%,62%,1) 0px, transparent 50%),
    radial-gradient(at 48% 30%, hsla(46,76%,73%,1) 0px, transparent 50%),
    radial-gradient(at 12% 78%, hsla(235,64%,75%,1) 0px, transparent 50%),
    radial-gradient(at 27% 68%, hsla(282,88%,72%,1) 0px, transparent 50%),
    radial-gradient(at 60% 64%, hsla(21,98%,74%,1) 0px, transparent 50%),
    radial-gradient(at 97% 11%, hsla(222,83%,69%,1) 0px, transparent 50%),
    radial-gradient(at 91% 9%, hsla(0,98%,75%,1) 0px, transparent 50%);
        }

    </style>
</head>
<body >
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-7 col-lg-5">
                    <div class="card p-4 p-md-5 shadow-sm">
                        <h3 class="text-center mb-4">User Login</h3>

                        <form action="<?php echo ROOT_URL . 'login'; ?>" method="POST" autocomplete="off">
                            <div class="mb-3">
                                <label for="input_username" class="form-label text-black-50 fs-sm">Username</label>
                                <input type="text"
                                       id="input_username"
                                       class="form-control rounded <?php echo (isset($_SESSION['errors']['username'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Enter your username"
                                       name="username"
                                       required>
                                <?php if (isset($_SESSION['errors']['username'])): ?>
                                    <?php foreach ($_SESSION['errors']['username'] as $error): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="input_password" class="form-label text-black-50 fs-sm">Password</label>
                                <input type="password"
                                       id="input_password"
                                       class="form-control rounded <?php echo (isset($_SESSION['errors']['password'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Enter your password"
                                       name="password"
                                       required>
                                <?php if (isset($_SESSION['errors']['password'])): ?>
                                    <?php foreach ($_SESSION['errors']['password'] as $error): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="my-2">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign in</button>
                            </div>
                        </form>
                        
                        <div class="d-grid gap-2  mb-3">
                            
                            <a href="<?php echo url('register'); ?>" class="btn btn-outline-success w-200">
                                Sign Up
                            </a>
                            
                            

                            <a href="<?php echo url('/'); ?>" class="btn btn-outline-info w-25 mt-3 mx-auto ">
                                Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo asset('js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
<?php clear_errors(); ?>