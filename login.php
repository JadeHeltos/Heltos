<?php

// =========================================================
// TAJALE SOLUTIONS
// LOGIN
// =========================================================

require_once("include/initialize.php");

if(isset($_SESSION['UID'])){
    redirect("index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tajale Solutions</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="<?php echo WEB_ROOT;?>plugins/fontawesome-free/css/all.min.css">


    <!-- Bootstrap -->

    <link rel="stylesheet"
          href="<?php echo WEB_ROOT;?>plugins/bootstrap/css/bootstrap.min.css">


    <!-- AdminLTE -->

    <link rel="stylesheet"
          href="<?php echo WEB_ROOT;?>dist/css/adminlte.min.css">


    <!-- Pixel-style font -->

    <link
        href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        html,
        body {

            width: 100%;
            height: 100%;

            margin: 0;

        }


        body {

            overflow: hidden;

            background: #050014;

            font-family:
                'Press Start 2P',
                monospace;

        }


        /* =========================================
           BACKGROUND
        ========================================= */

        .deltarune-bg {

            position: fixed;

            inset: -30px;

            background-image:

                linear-gradient(
                    rgba(5, 0, 25, 0.55),
                    rgba(8, 0, 35, 0.72)
                ),

                url("delta.jpg");

            background-size: cover;

            background-position: center;

            filter: blur(7px);

            transform: scale(1.08);

            z-index: -3;

        }


        /* Purple/blue atmospheric glow */

        .deltarune-bg::after {

            content: "";

            position: absolute;

            inset: 0;

            background:

                radial-gradient(
                    circle at 50% 40%,
                    rgba(80, 40, 180, 0.25),
                    transparent 45%
                ),

                linear-gradient(
                    180deg,
                    rgba(10, 0, 35, 0.2),
                    rgba(0, 0, 0, 0.75)
                );

        }


        /* =========================================
           STAR / PIXEL EFFECT
        ========================================= */

        .stars {

            position: fixed;

            inset: 0;

            pointer-events: none;

            z-index: -2;

            background-image:

                radial-gradient(
                    #ffffff 1px,
                    transparent 1px
                ),

                radial-gradient(
                    #8c7bff 1px,
                    transparent 1px
                );

            background-size:
                80px 80px,
                130px 130px;

            background-position:
                0 0,
                40px 60px;

            opacity: 0.18;

        }


        /* =========================================
           LOGIN CONTAINER
        ========================================= */

        .login-page {

            min-height: 100vh !important;

            background: transparent !important;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .login-box {

            width: 430px;

            max-width: 92%;

        }


        /* =========================================
           LOGO / TITLE
        ========================================= */

        .game-title {

            text-align: center;

            color: white;

            font-size: 24px;

            line-height: 1.5;

            margin-bottom: 18px;

            text-shadow:

                3px 3px 0 #3820a0,

                0 0 10px #635bff,

                0 0 25px #3c2cff;

            letter-spacing: 2px;

        }


        .game-subtitle {

            text-align: center;

            color: #aaa4d8;

            font-size: 9px;

            margin-bottom: 20px;

        }


        /* =========================================
           LOGIN CARD
        ========================================= */

        .card {

            background:
                rgba(3, 3, 10, 0.88) !important;

            border:
                3px solid #ffffff !important;

            border-radius:
                0 !important;

            box-shadow:

                0 0 0 4px #17122e,

                0 0 25px
                rgba(91, 67, 255, 0.65),

                0 0 70px
                rgba(72, 30, 255, 0.3);

            padding: 4px;

        }


        .login-card-body {

            background:
                #050509 !important;

            padding:
                30px !important;

            border:
                1px solid #39334f;

        }


        /* =========================================
           LOGO
        ========================================= */

        .logo-container {

            text-align: center;

            margin-bottom: 20px;

        }


        .login-logo img {

            max-width: 170px;

            image-rendering: pixelated;

            filter:

                drop-shadow(0 0 5px #fff)

                drop-shadow(0 0 12px #4f45ff);

        }


        /* =========================================
           TEXT
        ========================================= */

        .login-box-msg {

            color:
                #ffffff !important;

            font-size:
                10px !important;

            line-height:
                1.8;

            padding:
                0 !important;

            margin-bottom:
                25px !important;

            text-shadow:
                0 0 8px
                rgba(255,255,255,.5);

        }


        /* =========================================
           INPUTS
        ========================================= */

        .input-group {

            margin-bottom:
                18px !important;

        }


        .form-control {

            height:
                52px !important;

            background:
                #090914 !important;

            color:
                white !important;

            border:
                2px solid #383352 !important;

            border-radius:
                0 !important;

            font-family:
                'Press Start 2P',
                monospace !important;

            font-size:
                9px !important;

            padding-left:
                16px !important;

            transition:
                all .15s ease;

        }


        .form-control::placeholder {

            color:
                #77718e !important;

        }


        .form-control:focus {

            border-color:
                #6c5cff !important;

            box-shadow:

                0 0 8px #5145ff,

                inset 0 0 8px
                rgba(79, 67, 255, .15)
                !important;

        }


        .input-group-text {

            background:
                #0d0b1b !important;

            color:
                #7067ff !important;

            border:
                2px solid #383352 !important;

            border-left:
                0 !important;

            border-radius:
                0 !important;

        }


        /* =========================================
           LOGIN BUTTON
        ========================================= */

        .login-button {

            width: 100%;

            height: 55px;

            border:
                2px solid #ffffff;

            border-radius:
                0;

            background:
                #15102f;

            color:
                white;

            font-family:
                'Press Start 2P',
                monospace;

            font-size:
                10px;

            text-transform:
                uppercase;

            box-shadow:

                0 0 10px
                rgba(90, 72, 255, .5);

            transition:
                all .12s ease;

            cursor:
                pointer;

        }


        .login-button:hover {

            background:
                #261b5c;

            color:
                #ffffff;

            transform:
                translateY(-2px);

            box-shadow:

                0 0 8px #7065ff,

                0 0 20px #4f42ff;

        }


        .login-button:active {

            transform:
                translateY(2px);

            box-shadow:
                inset 0 0 10px #000;

        }


        .login-button i {

            margin-right:
                8px;

        }


        /* =========================================
           SOUL
        ========================================= */

        .soul {

            width:
                13px;

            height:
                13px;

            background:
                #ff1744;

            margin:
                20px auto 12px;

            transform:
                rotate(45deg);

            box-shadow:

                0 0 5px #ff1744,

                0 0 15px #ff1744;

            animation:
                soul-pulse 1.2s
                infinite alternate;

        }


        @keyframes soul-pulse {

            from {

                transform:
                    rotate(45deg)
                    scale(.8);

                opacity:
                    .65;

            }

            to {

                transform:
                    rotate(45deg)
                    scale(1.1);

                opacity:
                    1;

            }

        }


        /* =========================================
           COPYRIGHT
        ========================================= */

        .copyright {

            text-align:
                center;

            color:
                #55506d;

            font-size:
                7px;

            margin-top:
                15px;

            line-height:
                2;

        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 500px) {

            .login-box {

                width:
                    94%;

            }


            .login-card-body {

                padding:
                    22px !important;

            }


            .game-title {

                font-size:
                    17px;

            }


            .form-control {

                font-size:
                    8px !important;

            }


            .login-button {

                font-size:
                    8px;

            }

        }

    </style>

</head>


<body class="hold-transition login-page">


    <!-- =========================================
         BACKGROUND
    ========================================= -->

    <div class="deltarune-bg"></div>


    <!-- =========================================
         PIXEL STARS
    ========================================= -->

    <div class="stars"></div>


    <!-- =========================================
         LOGIN
    ========================================= -->

    <div class="login-box">


        <!-- TITLE -->

        <div class="game-title">

            TAJALE SOLUTIONS

        </div>


        <!-- SUBTITLE -->

        <div class="game-subtitle">

            ✦ ENTER THE DARK WORLD ✦

        </div>


        <!-- CARD -->

        <div class="card">


            <div class="card-body login-card-body">


                <!-- LOGO -->

                <div class="logo-container">

                    <img
                        src="deltalogo.png"
                        width="50%"
                        alt="Tajale Solutions Logo"
                    >

                </div>


                <!-- MESSAGE -->

                <p class="login-box-msg">

                    LOGIN TO START YOUR SESSION

                </p>


                <!-- LOGIN FORM -->

                <form
                    action="#"
                    method="post"
                >


                    <!-- USERNAME -->

                    <div class="input-group">

                        <input
                            type="text"
                            class="form-control"
                            name="username"
                            placeholder="USERNAME"
                            autocomplete="username"
                            required
                        >

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="input-group">

                        <input
                            type="password"
                            class="form-control"
                            name="userpass"
                            placeholder="PASSWORD"
                            autocomplete="current-password"
                            required
                        >

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>


                    <!-- LOGIN BUTTON -->

                    <button
                        type="submit"
                        name="btnLogin"
                        class="login-button"
                    >

                        <i class="fas fa-heart"></i>

                        LOGIN

                    </button>


                </form>


                <!-- SOUL -->

                <div class="soul"></div>


                <!-- COPYRIGHT -->

                <div class="copyright">

                    TAJALE SOLUTIONS
                    <br>

                    YOUR ADVENTURE AWAITS...

                </div>


            </div>

        </div>

    </div>


    <!-- =========================================
         JAVASCRIPT
    ========================================= -->

    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo WEB_ROOT;?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo WEB_ROOT;?>dist/js/adminlte.min.js"></script>


</body>

</html>


<?php

// =========================================================
// LOGIN PROCESS
// =========================================================

if(isset($_POST['btnLogin'])){


    $email = trim($_POST['username']);

    $upass = trim($_POST['userpass']);

    $h_upass = sha1($upass);


    // =========================================
    // EMPTY LOGIN
    // =========================================

    if ($email == '' OR $upass == '') {

        message(
            "Invalid Username and Password!",
            "error"
        );

        redirect("login.php");

    }


    // =========================================
    // AUTHENTICATE
    // =========================================

    else {

        $user = new User();

        $res = $user::AuthenticateUser(
            $email,
            $h_upass
        );


        // =====================================
        // SUCCESS
        // =====================================

        if ($res == true) {

            ?>

            <script>

                /*
                 * Successful login:
                 *
                 * Login
                 *    ↓
                 * Intro
                 *    ↓
                 * Dashboard
                 */

                window.location.href =
                    "intro.php";

            </script>

            <?php

        }


        // =====================================
        // FAILED LOGIN
        // =====================================

        else {

            echo "

            <script>

                alert(
                    'Invalid username or password.'
                );

                window.location.href =
                    'login.php';

            </script>

            ";

        }

    }

}

?>