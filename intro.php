<?php

// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE INTRO SCREEN
// =========================================================

require_once("include/initialize.php");

// Make sure the user is actually logged in
if (!isset($_SESSION['UID'])) {
    redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Tajale Solutions</title>

    <!-- Pixel Font -->
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
            padding: 0;

            overflow: hidden;

        }


        body {

            background: #000;

            font-family:
                'Press Start 2P',
                monospace;

        }


        /* =================================================
           INTRO SCREEN
        ================================================= */

        .intro-screen {

            position: fixed;

            inset: 0;

            width: 100%;
            height: 100%;

            background: #000;

            display: flex;

            justify-content: center;

            align-items: center;

            overflow: hidden;

        }


        /* =================================================
           GIF
        ================================================= */

        .intro-gif {

            width: 100%;
            height: 100%;

            object-fit: contain;

            image-rendering: pixelated;

        }


        /* =================================================
           DARK OVERLAY
        ================================================= */

        .intro-overlay {

            position: absolute;

            inset: 0;

            pointer-events: none;

            background:
                radial-gradient(
                    circle,
                    transparent 35%,
                    rgba(0, 0, 0, .45) 100%
                );

        }


        /* =================================================
           SKIP TEXT
        ================================================= */

        .skip-text {

            position: absolute;

            bottom: 25px;

            left: 50%;

            transform:
                translateX(-50%);

            color: rgba(255,255,255,.55);

            font-size: 8px;

            letter-spacing: 1px;

            text-shadow:
                2px 2px 0 #000;

            opacity: 0;

            animation:
                showSkip 2s forwards;

        }


        @keyframes showSkip {

            from {
                opacity: 0;
            }

            to {
                opacity: .7;
            }

        }


        /* =================================================
           FADE OUT
        ================================================= */

        .fade-out {

            animation:
                fadeOut .8s ease forwards;

        }


        @keyframes fadeOut {

            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }

        }


        /* =================================================
           MOBILE
        ================================================= */

        @media (max-width: 768px) {

            .intro-gif {

                width: 100%;
                height: 100%;

                object-fit: contain;

            }

            .skip-text {

                font-size: 7px;

            }

        }

    </style>

</head>


<body>


    <div
        class="intro-screen"
        id="introScreen"
    >

        <!--
            Put your Roaring Knight GIF here.

            Example:
            intro.gif

            Folder:
            /intro.gif
        -->

        <img
            src="intro.gif"
            class="intro-gif"
            id="introGif"
            alt="Intro"
        >


        <div class="intro-overlay"></div>


        <div class="skip-text">

            CLICK ANYWHERE TO SKIP

        </div>

    </div>


    <script>

        /*
         * ================================================
         * INTRO SETTINGS
         * ================================================
         *
         * Change this if your GIF has a different length.
         *
         * Example:
         *
         * 5000 = 5 seconds
         * 8000 = 8 seconds
         * 10000 = 10 seconds
         *
         */

        const INTRO_LENGTH = 3000;


        const introScreen =
            document.getElementById("introScreen");


        /*
         * ================================================
         * GO TO DASHBOARD
         * ================================================
         */

        function goToDashboard() {

            introScreen.classList.add("fade-out");

            setTimeout(function() {

                window.location.href = "index.php";

            }, 800);

        }


        /*
         * ================================================
         * AUTOMATICALLY CONTINUE
         * ================================================
         */

        setTimeout(function() {

            goToDashboard();

        }, INTRO_LENGTH);


        /*
         * ================================================
         * CLICK TO SKIP
         * ================================================
         */

        introScreen.addEventListener(
            "click",
            function() {

                goToDashboard();

            }
        );


        /*
         * ================================================
         * SPACEBAR TO SKIP
         * ================================================
         */

        document.addEventListener(
            "keydown",
            function(event) {

                if (event.code === "Space") {

                    event.preventDefault();

                    goToDashboard();

                }

            }
        );

    </script>


</body>

</html>