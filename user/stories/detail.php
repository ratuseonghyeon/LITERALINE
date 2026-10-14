<?php
require_once "../../config/koneksi.php";
/*
|--------------------------------------------------------------------------
| Ambil ID cerita dari URL
|--------------------------------------------------------------------------
*/

$id = isset($_GET['id'])
    ? (int) $_GET['id']
    : 0;


/*
|--------------------------------------------------------------------------
| Validasi ID
|--------------------------------------------------------------------------
*/

if ($id <= 0) {
    die("ID cerita tidak valid.");
}


/*
|--------------------------------------------------------------------------
| Ambil data cerita
|--------------------------------------------------------------------------
*/

$query = "
    SELECT
        stories.*,
        categories.name AS category_name
    FROM stories
    LEFT JOIN categories
        ON stories.category_id = categories.id
    WHERE stories.id = $id
    LIMIT 1
";

$result = mysqli_query($conn, $query);


/*
|--------------------------------------------------------------------------
| Cek query
|--------------------------------------------------------------------------
*/

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}


/*
|--------------------------------------------------------------------------
| Ambil data cerita
|--------------------------------------------------------------------------
*/

$story = mysqli_fetch_assoc($result);


/*
|--------------------------------------------------------------------------
| Cek apakah cerita ditemukan
|--------------------------------------------------------------------------
*/

if (!$story) {
    die("Cerita tidak ditemukan.");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($story['title']); ?> - Literaline
    </title>


    <!-- =====================================================
         GOOGLE FONTS
    ====================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;
            padding: 0;

            min-height: 100vh;

            font-family: 'Poppins', sans-serif;

            color: #33251F;

            overflow-x: hidden;

            background:
                linear-gradient(
                    rgba(38, 18, 14, 0.60),
                    rgba(38, 18, 14, 0.74)
                ),
                url('/literaline/LITERALINE/assets/images/jihan/library.jpg');

            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }


        /* =====================================================
           PAGE WRAPPER
        ===================================================== */

        .page {
            min-height: 100vh;

            padding:
                55px 25px
                70px;
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {
            position: relative;

            width: 100%;
            max-width: 1050px;

            margin: 0 auto;

            padding: 42px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255, 249, 240, 0.98),
                    rgba(245, 235, 221, 0.97)
                );

            border:
                1px solid
                rgba(176, 141, 87, 0.65);

            border-radius: 24px;

            box-shadow:
                0 25px 60px
                rgba(0, 0, 0, 0.38),

                0 0 0 1px
                rgba(176, 141, 87, 0.18);

            overflow: hidden;
        }


        .container::before {
            content: "";

            position: absolute;

            top: 0;
            left: 0;
            right: 0;

            height: 5px;

            background:
                linear-gradient(
                    90deg,
                    #7A3543,
                    #B08D57,
                    #7A3543
                );
        }


        /* =====================================================
           BACK BUTTON
        ===================================================== */

        .back-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 35px;

            padding:
                10px 16px;

            color: #5A1F2B;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            border:
                1px solid
                rgba(176, 141, 87, 0.55);

            border-radius: 999px;

            background:
                rgba(255, 249, 240, 0.82);

            transition:
                all 0.3s ease;
        }


        .back-button:hover {
            color: #FFF9F0;

            background: #5A1F2B;

            border-color: #5A1F2B;

            transform:
                translateX(-3px);
        }


        /* =====================================================
           STORY DETAIL
        ===================================================== */

        .story-detail {
            display: flex;

            align-items: flex-start;

            gap: 55px;
        }


        /* =====================================================
           COVER AREA
        ===================================================== */

        .cover-area {
            position: relative;

            flex-shrink: 0;

            width: 290px;
            height: 400px;

            display: flex;

            align-items: center;
            justify-content: center;
        }


        /* =====================================================
           COVER FRAME
        ===================================================== */

        .cover-frame {
            position: relative;

            width: 290px;
            height: 400px;
        }


        /*
         * Frame emas berada DI ATAS cover.
         * Bagian putih pada JPG akan dibuat menyatu
         * supaya area cover tetap terlihat.
         */

        .cover-frame::before {
            content: "";

            position: absolute;

            inset: 0;

            background-image:
                url('/literaline/LITERALINE/assets/images/jihan/cover-frames.png');

            background-size: 100% 100%;

            background-position: center;

            background-repeat: no-repeat;

            z-index: 3;

            pointer-events: none;

            opacity: 0.90;

            mix-blend-mode: multiply;

            filter:
                sepia(0.20)
                brightness(1.02)
                contrast(1.05);
        }


        /* =====================================================
           AREA FOTO / NO COVER
        ===================================================== */

        .cover-inner {
            position: absolute;

            top: 9%;
            left: 9%;

            width: 82%;
            height: 82%;

            overflow: hidden;

            z-index: 1;

            background:
                linear-gradient(
                    145deg,
                    #E7D6C1,
                    #F7EEE3
                );

            border-radius: 5px;
        }


        /* =====================================================
           COVER CERITA
        ===================================================== */

        .cover {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        /* =====================================================
           TIDAK ADA COVER
        ===================================================== */

        .no-cover {
            width: 100%;
            height: 100%;

            display: flex;

            align-items: center;
            justify-content: center;

            text-align: center;

            padding: 25px;

            background:
                linear-gradient(
                    145deg,
                    #E7D6C1,
                    #F7EEE3
                );

            color: #7A3543;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size: 25px;

            font-weight: 600;
        }


        /* =====================================================
           STORY INFO
        ===================================================== */

        .story-info {
            flex: 1;

            min-width: 0;

            padding-top: 5px;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        h1 {
            margin:
                0 0 8px;

            color: #5A1F2B;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size:
                clamp(42px, 5vw, 62px);

            line-height: 0.95;

            font-weight: 600;
        }


        /* =====================================================
           AUTHOR
        ===================================================== */

        .author {
            margin:
                0 0 18px;

            color: #765F55;

            font-size: 15px;
        }


        .author::before {
            content: "✦ ";

            color: #B08D57;
        }


        /* =====================================================
           CATEGORY
        ===================================================== */

        .category {
            display: inline-block;

            margin-bottom: 28px;

            padding:
                7px 14px;

            background:
                rgba(176, 141, 87, 0.14);

            border:
                1px solid
                rgba(176, 141, 87, 0.55);

            border-radius: 999px;

            color: #7A3543;

            font-size: 12px;

            font-weight: 600;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .story-divider {
            width: 100%;

            height: 1px;

            margin:
                0 0 26px;

            background:
                linear-gradient(
                    90deg,
                    #B08D57,
                    rgba(176, 141, 87, 0)
                );
        }


        /* =====================================================
           DESCRIPTION
        ===================================================== */

        .description {
            color: #4D3A32;

            font-size: 15px;

            line-height: 1.9;
        }


        .description h3 {
            margin:
                0 0 12px;

            color: #5A1F2B;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size: 30px;

            font-weight: 600;
        }


        .description p {
            margin: 0;
        }


        /* =====================================================
           READ BUTTON
        ===================================================== */

        .read-button {
            position: relative;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            margin-top: 30px;

            padding:
                13px 23px;

            color: #FFF9F0;

            background:
                linear-gradient(
                    135deg,
                    #5A1F2B,
                    #7A3543
                );

            border:
                1px solid
                #5A1F2B;

            border-radius: 10px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            box-shadow:
                0 10px 20px
                rgba(90, 31, 43, 0.22);

            overflow: hidden;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }


        .read-button::after {
            content: "";

            position: absolute;

            top: 0;
            left: -120%;

            width: 80%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255, 255, 255, 0.28),
                    transparent
                );

            transform:
                skewX(-20deg);

            transition:
                left 0.6s ease;
        }


        .read-button:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 14px 25px
                rgba(90, 31, 43, 0.30);
        }


        .read-button:hover::after {
            left: 140%;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .page {
                padding:
                    30px 15px
                    45px;
            }


            .container {
                padding:
                    30px 22px;
            }


            .story-detail {
                flex-direction: column;

                align-items: center;

                gap: 35px;
            }


            .story-info {
                width: 100%;

                text-align: center;
            }


            .story-divider {
                background:
                    linear-gradient(
                        90deg,
                        transparent,
                        #B08D57,
                        transparent
                    );
            }


            .read-button {
                margin-left: auto;
                margin-right: auto;
            }
        }


        @media (max-width: 480px) {

            h1 {
                font-size: 42px;
            }


            .container {
                border-radius: 18px;
            }


            .cover-area,
            .cover-frame {
                width: 250px;
                height: 350px;
            }
        }

    </style>

</head>


<body>

<div class="page">

    <div class="container">


        <!-- =================================================
             KEMBALI
        ================================================== -->

        <a
            href="index.php"
            class="back-button"
        >
            ← Kembali ke Daftar Cerita
        </a>


        <!-- =================================================
             DETAIL CERITA
        ================================================== -->

        <div class="story-detail">


            <!-- =================================================
                 COVER
            ================================================== -->

            <div class="cover-area">

                <div class="cover-frame">

                    <div class="cover-inner">

                        <?php if (!empty($story['cover'])): ?>

                            <img
                                class="cover"
                                src="../assets/<?= htmlspecialchars($story['cover']); ?>"
                                alt="<?= htmlspecialchars($story['title']); ?>"
                            >

                        <?php else: ?>

                            <div class="no-cover">
                                Tidak ada cover
                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 INFORMASI CERITA
            ================================================== -->

            <div class="story-info">


                <h1>
                    <?= htmlspecialchars($story['title']); ?>
                </h1>


                <p class="author">
                    Oleh <?= htmlspecialchars($story['author']); ?>
                </p>


                <span class="category">

                    <?= htmlspecialchars(
                        $story['category_name'] ?? 'Tanpa kategori'
                    ); ?>

                </span>


                <div class="story-divider"></div>


                <div class="description">

                    <h3>Sinopsis</h3>

                    <p>
                        <?= nl2br(
                            htmlspecialchars($story['description'])
                        ); ?>
                    </p>

                </div>


                <!-- =================================================
                     MULAI MEMBACA
                ================================================== -->

                <a
                    href="../chapters/?story_id=<?= (int) $story['id']; ?>"
                    class="read-button"
                >
                    Mulai Membaca
                </a>


            </div>

        </div>

    </div>

</div>

</body>

</html>