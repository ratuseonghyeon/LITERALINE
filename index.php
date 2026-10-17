<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Literaline</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* =========================
           RESET
        ========================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #33251F;
        }


        /* =========================
           VIDEO BACKGROUND
        ========================== */

        .bg-video {
            position: fixed;
            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            z-index: -3;
        }


        /* =========================
           DARK OVERLAY
        ========================== */

        .overlay {
            position: fixed;
            inset: 0;

            background:
                linear-gradient(
                    rgba(51, 37, 31, 0.48),
                    rgba(51, 37, 31, 0.58)
                ),
                linear-gradient(
                    90deg,
                    rgba(90, 31, 43, 0.20),
                    transparent 45%,
                    rgba(51, 37, 31, 0.18)
                );

            z-index: -2;
        }


        /* =========================
           VIGNETTE
        ========================== */

        .vignette {
            position: fixed;
            inset: 0;

            background:
                radial-gradient(
                    circle at center,
                    transparent 35%,
                    rgba(25, 17, 14, 0.58) 100%
                );

            pointer-events: none;

            z-index: -1;
        }


        /* =========================
           MAIN CONTENT
        ========================== */

        .opening {
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            justify-content: center;
            align-items: center;

            text-align: center;

            padding: 30px;
        }


        /* =========================
           SMALL ORNAMENT
        ========================== */

        .ornament {
            margin-bottom: 12px;

            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;

            letter-spacing: 8px;

            color: #D8BFA8;

            opacity: 0;

            animation: fadeUp 1s ease forwards;
        }


        /* =========================
           LOGO
        ========================== */

        .logo {
            position: relative;
            display: inline-block;

            font-family: 'Great Vibes', cursive;
            font-size: clamp(70px, 10vw, 125px);
            line-height: 1;

            color: #FFF9F0;

            text-shadow:
                0 2px 8px rgba(51, 37, 31, 0.35),
                0 0 10px rgba(176, 141, 87, 0.25),
                0 0 24px rgba(176, 141, 87, 0.12);

            opacity: 0;

            animation: fadeUp 1.2s ease forwards;
            animation-delay: 0.25s;

            cursor: default;
        }


        /* =========================
           GOLD LINE
        ========================== */

        .gold-line {
            width: 90px;
            height: 1px;

            margin: 18px 0;

            background: #B08D57;

            box-shadow:
                0 0 8px rgba(176, 141, 87, 0.45);

            transform: scaleX(0);

            animation: lineReveal 1s ease forwards;
            animation-delay: 0.75s;
        }


        /* =========================
           TAGLINE
        ========================== */

        .tagline {
            max-width: 650px;

            font-family: 'Cormorant Garamond', serif;

            font-size: clamp(22px, 2.3vw, 32px);

            font-weight: 500;

            letter-spacing: 1px;

            line-height: 1.4;

            color: #F5EBDD;

            opacity: 0;

            animation: fadeUp 1.1s ease forwards;
            animation-delay: 0.9s;
        }


        /* =========================
           BUTTON WRAPPER
        ========================== */

        .button-wrapper {
            margin-top: 38px;

            opacity: 0;

            animation: fadeUp 1.1s ease forwards;
            animation-delay: 1.3s;
        }


        /* =========================
           ENTER BUTTON
        ========================== */

        .enter-btn {
            position: relative;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 220px;

            padding: 14px 28px;

            border: 1px solid #B08D57;

            border-radius: 999px;

            background: rgba(255, 249, 240, 0.08);

            color: #FFF9F0;

            text-decoration: none;

            font-family: 'Poppins', sans-serif;

            font-size: 13px;
            font-weight: 500;

            letter-spacing: 2px;

            overflow: hidden;

            backdrop-filter: blur(4px);

            transition:
                transform 0.35s ease,
                background 0.35s ease,
                box-shadow 0.35s ease;
        }


        /* =========================
           BUTTON SHIMMER
        ========================== */

        .enter-btn::before {
            content: "";

            position: absolute;

            top: -100%;
            left: -120%;

            width: 65%;
            height: 300%;

            background: linear-gradient(
                105deg,
                transparent 0%,
                transparent 40%,
                rgba(255, 255, 255, 0.04) 46%,
                rgba(255, 255, 255, 0.45) 50%,
                rgba(176, 141, 87, 0.18) 54%,
                transparent 62%,
                transparent 100%
            );

            transform: rotate(20deg);

            filter: blur(5px);

            transition:
                left 1s cubic-bezier(0.22, 0.61, 0.36, 1);

            pointer-events: none;
        }


        .enter-btn:hover {
            transform: translateY(-3px);

            background: rgba(90, 31, 43, 0.45);

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.25),
                0 0 16px rgba(176, 141, 87, 0.16);
        }


        .enter-btn:hover::before {
            left: 150%;
        }


        /* =========================
           BOTTOM TEXT
        ========================== */

        .bottom-text {
            position: fixed;

            left: 50%;
            bottom: 24px;

            transform: translateX(-50%);

            width: 100%;

            text-align: center;

            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            letter-spacing: 3px;

            color: rgba(245, 235, 221, 0.72);

            text-transform: uppercase;

            opacity: 0;

            animation: fadeIn 1s ease forwards;
            animation-delay: 1.8s;
        }

        /* =========================
           ANIMATIONS
        ========================== */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }


        @keyframes lineReveal {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 600px) {

            .opening {
                padding: 20px;
            }

            .logo {
                font-size: 70px;
            }

            .tagline {
                font-size: 22px;
            }

            .enter-btn {
                min-width: 200px;
                padding: 13px 24px;
            }

            .bottom-text {
                font-size: 8px;
                letter-spacing: 2px;
            }
        }

    </style>
</head>

<body>


    <!-- VIDEO BACKGROUND -->

    <video
        class="bg-video"
        autoplay
        muted
        loop
        playsinline
    >
        <source src="assets/video/index.mp4" type="video/mp4">

        Browser kamu tidak mendukung video.
    </video>


    <!-- OVERLAY -->

    <div class="overlay"></div>

    <div class="vignette"></div>


    <!-- OPENING CONTENT -->

    <main class="opening">

        <div class="ornament">
            ✦
        </div>

        <h1 class="logo">
            Literaline
        </h1>

        <div class="gold-line"></div>

        <p class="tagline">
            A Digital Space Where Stories Come Alive
        </p>

        <div class="button-wrapper">

            <a
                href="auth/login.php"
                class="enter-btn"
            >
                ENTER THE LIBRARY
            </a>

        </div>

    </main>


    <!-- FOOTER TEXT -->

    <div class="bottom-text">
        Read • Save • Share • Be a Part of the Story
    </div>


</body>
</html>