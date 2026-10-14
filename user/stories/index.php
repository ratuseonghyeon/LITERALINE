<?php
require_once "../../config/koneksi.php";

/*
|--------------------------------------------------------------------------
| Ambil input dari URL
|--------------------------------------------------------------------------
*/

$search = isset($_GET['search'])
    ? trim($_GET['search'])
    : '';

$category_id = isset($_GET['category'])
    ? (int) $_GET['category']
    : 0;


/*
|--------------------------------------------------------------------------
| Ambil daftar kategori
|--------------------------------------------------------------------------
*/

$category_query = "
    SELECT id, name
    FROM categories
    WHERE name IS NOT NULL
      AND name != ''
    ORDER BY name ASC
";

$category_result = mysqli_query($conn, $category_query);

if (!$category_result) {
    die("Query kategori gagal: " . mysqli_error($conn));
}


/*
|--------------------------------------------------------------------------
| Query daftar cerita
|--------------------------------------------------------------------------
*/

$query = "
    SELECT
        stories.*,
        categories.name AS category_name
    FROM stories
    LEFT JOIN categories
        ON stories.category_id = categories.id
    WHERE 1 = 1
";


/*
|--------------------------------------------------------------------------
| Filter pencarian
|--------------------------------------------------------------------------
*/

if ($search !== '') {

    $search_safe = mysqli_real_escape_string($conn, $search);

    $query .= "
        AND (
            stories.title LIKE '%$search_safe%'
            OR stories.author LIKE '%$search_safe%'
        )
    ";
}


/*
|--------------------------------------------------------------------------
| Filter kategori
|--------------------------------------------------------------------------
*/

if ($category_id > 0) {

    $query .= "
        AND stories.category_id = $category_id
    ";
}


/*
|--------------------------------------------------------------------------
| Urutkan cerita terbaru
|--------------------------------------------------------------------------
*/

$query .= "
    ORDER BY stories.id DESC
";


$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query cerita gagal: " . mysqli_error($conn));
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

    <title>Daftar Cerita - Literaline</title>


    <!-- =====================================================
         FONT LITERALINE
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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    overflow-x: hidden;
    color: #33251F;

    background:
        linear-gradient(
            rgba(40, 20, 10, 0.35),
            rgba(40, 20, 10, 0.55)
        ),
        url('/literaline/LITERALINE/assets/images/jihan/library.jpg');

    background-size: cover;
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

        /* =====================================================
           MAGIC LIBRARY BACKGROUND
        ===================================================== */
.library-scene {
    position: relative;
    height: 100px;
    min-height: 0;
    overflow: hidden;
    isolation: isolate;
}

        /* =====================================================
           MAGIC BOOK
        ===================================================== */

        .magic-book {
            position: fixed;

            width: 215px;

            z-index: 20;

            pointer-events: none;

            opacity: 1;

            mix-blend-mode: normal;

            filter:
                drop-shadow(
                    0 20px 30px
                    rgba(0, 0, 0, 0.34)
                )
                drop-shadow(
                    0 0 18px
                    rgba(
                        176,
                        141,
                        87,
                        0.24
                    )
                );

            animation:
                bookFloat 7s
                ease-in-out
                infinite;
        }


        .magic-book img {
            width: 100%;

            height: auto;

            display: block;
        }


        .book-left {
            left: -55px;

            bottom: 6%;

            transform:
                rotate(-10deg);
        }


        .book-right {
            right: -55px;

            top: 13%;

            transform:
                rotate(10deg);

            animation-delay:
                -3.5s;
        }


        @keyframes bookFloat {

            0%,
            100% {
                transform:
                    translateY(0)
                    rotate(-10deg);
            }

            50% {
                transform:
                    translateY(-18px)
                    rotate(-6deg);
            }

        }


        /* =====================================================
           FLOATING PARCHMENT
        ===================================================== */

        .parchment {
            position: fixed;

            top: -160px;

            width: 88px;

            z-index: 3;

            pointer-events: none;

            opacity: 0.62;

            mix-blend-mode: multiply;

            filter:
                drop-shadow(
                    0 12px 20px
                    rgba(0, 0, 0, 0.30)
                );

            animation:
                parchmentFall 14s
                linear
                infinite;
        }


        .parchment img {
            width: 100%;

            height: auto;

            display: block;
        }


        .parchment-1 {
            left: 7%;

            animation-delay:
                -2s;
        }


        .parchment-2 {
            left: 45%;

            width: 72px;

            animation-delay:
                -8s;
        }


        .parchment-3 {
            right: 7%;

            width: 80px;

            animation-delay:
                -5s;
        }


        @keyframes parchmentFall {

            0% {
                top: -150px;

                opacity: 0;

                transform:
                    translateX(0)
                    rotate(-12deg);
            }

            12% {
                opacity: 0.60;
            }

            50% {
                transform:
                    translateX(55px)
                    rotate(18deg);
            }

            100% {
                top: 115vh;

                opacity: 0;

                transform:
                    translateX(-45px)
                    rotate(-27deg);
            }

        }


        /* =====================================================
           GOLD DUST
        ===================================================== */

        .gold-dust {
            position: fixed;

            width: 5px;

            height: 5px;

            border-radius: 50%;

            z-index: 4;

            pointer-events: none;

            background:
                #B08D57;

            box-shadow:
                0 0 12px
                rgba(
                    176,
                    141,
                    87,
                    0.70
                );

            animation:
                dustFloat 5s
                ease-in-out
                infinite;
        }


        .dust-one {
            top: 18%;

            left: 12%;
        }


        .dust-two {
            top: 34%;

            left: 84%;

            animation-delay:
                -2s;
        }


        .dust-three {
            top: 66%;

            left: 18%;

            animation-delay:
                -3s;
        }


        .dust-four {
            top: 72%;

            right: 10%;

            animation-delay:
                -1s;
        }


        .dust-five {
            top: 15%;

            left: 68%;

            animation-delay:
                -4s;
        }


        @keyframes dustFloat {

            0%,
            100% {
                opacity: 0;

                transform:
                    translateY(10px)
                    scale(0.7);
            }

            50% {
                opacity: 0.80;

                transform:
                    translateY(-18px)
                    scale(1);
            }

        }


        /* =====================================================
           MAIN CONTAINER
        ===================================================== */

        .container {
            position: relative;

            z-index: 10;

            max-width: 1200px;

            width: 90%;

            margin: 0 auto;

            padding:
                75px 0 100px;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        h1 {

            text-align: center;

            margin:
                0 0 42px;

            font-family:
                'Great Vibes',
                cursive;

            font-size:
                clamp(
                    58px,
                    8vw,
                    92px
                );

            font-weight:
                400;

            line-height:
                0.9;

            color:
                #FFF9F0;

            text-shadow:
                0 4px 18px
                rgba(0, 0, 0, 0.58);

            animation:
                titleReveal
                1s
                ease
                both;
        }


        h1::after {

            content:
                "Stories waiting to be discovered";

            display:
                block;

            margin-top:
                16px;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size:
                21px;

            font-weight:
                500;

            letter-spacing:
                1px;

            color:
                #F5EBDD;
        }


        @keyframes titleReveal {

            from {
                opacity: 0;

                transform:
                    translateY(20px)
                    scale(0.97);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }

        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-box {

            background:
                rgba(
                    255,
                    249,
                    240,
                    0.94
                );

            backdrop-filter:
                blur(14px);

            padding:
                18px;

            border:
                1px solid
                rgba(
                    176,
                    141,
                    87,
                    0.68
                );

            border-radius:
                18px;

            margin-bottom:
                48px;

            display:
                flex;

            gap:
                10px;

            flex-wrap:
                wrap;

            box-shadow:
                0 20px 45px
                rgba(
                    0,
                    0,
                    0,
                    0.24
                );

            animation:
                filterReveal
                0.9s
                0.15s
                ease
                both;
        }


        @keyframes filterReveal {

            from {
                opacity: 0;

                transform:
                    translateY(18px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }

        }


        .search-input,
        .category-select {

            padding:
                12px 14px;

            border:
                1px solid
                #D8BFA8;

            border-radius:
                10px;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                13px;

            background:
                #FFF9F0;

            color:
                #33251F;

            transition:
                0.25s ease;
        }


        .search-input {

            flex:
                1;

            min-width:
                220px;
        }


        .category-select {

            min-width:
                180px;
        }


        .search-input::placeholder {

            color:
                #9D8D81;
        }


        .search-input:focus,
        .category-select:focus {

            outline:
                none;

            border-color:
                #B08D57;

            box-shadow:
                0 0 0 4px
                rgba(
                    176,
                    141,
                    87,
                    0.12
                );
        }


        /* =====================================================
           BUTTONS
        ===================================================== */

        .search-button,
        .reset-button {

            position:
                relative;

            overflow:
                hidden;

            padding:
                12px 18px;

            border-radius:
                10px;

            font-family:
                'Poppins',
                sans-serif;

            font-size:
                12px;

            font-weight:
                600;

            text-decoration:
                none;

            transition:
                0.28s ease;
        }


        .search-button {

            border:
                1px solid
                #5A1F2B;

            background:
                #5A1F2B;

            color:
                #FFF9F0;

            cursor:
                pointer;
        }


        .reset-button {

            border:
                1px solid
                #B08D57;

            background:
                transparent;

            color:
                #5A1F2B;
        }


        .search-button:hover {

            background:
                #7A3543;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 20px
                rgba(
                    90,
                    31,
                    43,
                    0.20
                );
        }


        .reset-button:hover {

            background:
                #D8BFA8;

            transform:
                translateY(-2px);
        }


        /* =====================================================
           STORY LIST
        ===================================================== */

        .story-list {

            display:
                grid;

            grid-template-columns:
                repeat(
                    auto-fill,
                    minmax(
                        220px,
                        1fr
                    )
                );

            gap:
                28px;
        }


        /* =====================================================
           STORY CARD
        ===================================================== */

        .story-card {

            position:
                relative;

            overflow:
                hidden;

            background:
                rgba(
                    255,
                    249,
                    240,
                    0.96
                );

            backdrop-filter:
                blur(8px);

            padding:
                15px;

            border:
                1px solid
                rgba(
                    176,
                    141,
                    87,
                    0.50
                );

            border-radius:
                16px;

            box-shadow:
                0 18px 38px
                rgba(
                    0,
                    0,
                    0,
                    0.23
                );

            opacity:
                0;

            animation:
                cardReveal
                0.75s
                ease
                forwards;

            transition:
                transform
                0.4s
                ease,

                box-shadow
                0.4s
                ease,

                border-color
                0.4s
                ease;
        }


        .story-card:nth-child(1) {
            animation-delay:
                0.10s;
        }

        .story-card:nth-child(2) {
            animation-delay:
                0.18s;
        }

        .story-card:nth-child(3) {
            animation-delay:
                0.26s;
        }

        .story-card:nth-child(4) {
            animation-delay:
                0.34s;
        }

        .story-card:nth-child(5) {
            animation-delay:
                0.42s;
        }

        .story-card:nth-child(6) {
            animation-delay:
                0.50s;
        }


        @keyframes cardReveal {

            from {
                opacity:
                    0;

                transform:
                    translateY(30px)
                    scale(0.97);
            }

            to {
                opacity:
                    1;

                transform:
                    translateY(0)
                    scale(1);
            }

        }


        /* Shimmer */

        .story-card::before {

            content:
                "";

            position:
                absolute;

            top:
                -30%;

            left:
                -120%;

            width:
                45%;

            height:
                160%;

            z-index:
                5;

            pointer-events:
                none;

            background:
                linear-gradient(
                    110deg,
                    transparent,
                    rgba(
                        255,
                        255,
                        255,
                        0.28
                    ),
                    rgba(
                        176,
                        141,
                        87,
                        0.08
                    ),
                    transparent
                );

            transform:
                rotate(18deg);

            transition:
                left
                1s
                ease;
        }


        .story-card:hover::before {

            left:
                150%;
        }


        .story-card:hover {

            transform:
                translateY(-9px);

            border-color:
                rgba(
                    176,
                    141,
                    87,
                    0.85
                );

            box-shadow:
                0 26px 48px
                rgba(
                    0,
                    0,
                    0,
                    0.30
                ),
                0 0 22px
                rgba(
                    176,
                    141,
                    87,
                    0.13
                );
        }


        /* =====================================================
           STORY COVER
        ===================================================== */

        .story-card img {

            width:
                100%;

            height:
                250px;

            object-fit:
                cover;

            border-radius:
                10px;

            transition:
                transform
                0.55s
                ease;
        }


        .story-card:hover img {

            transform:
                scale(1.045);
        }


        .no-cover {

            width:
                100%;

            height:
                250px;

            background:
                linear-gradient(
                    145deg,
                    #D8BFA8,
                    #F5EBDD
                );

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                10px;

            color:
                #7A3543;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size:
                23px;
        }


        /* =====================================================
           STORY INFORMATION
        ===================================================== */

        .story-card h2 {

            color:
                #5A1F2B;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size:
                27px;

            font-weight:
                700;

            line-height:
                1.05;

            margin:
                16px 0 7px;
        }


        .author {

            color:
                #7A3543;

            font-size:
                12px;

            margin-bottom:
                8px;
        }


        .category {

            display:
                inline-block;

            padding:
                5px 10px;

            background:
                rgba(
                    216,
                    191,
                    168,
                    0.35
                );

            border:
                1px solid
                rgba(
                    176,
                    141,
                    87,
                    0.65
                );

            border-radius:
                15px;

            color:
                #5A1F2B;

            font-size:
                10px;

            font-weight:
                600;

            text-transform:
                uppercase;

            letter-spacing:
                0.7px;

            margin-bottom:
                10px;
        }


        .description {

            color:
                #6F625C;

            line-height:
                1.7;

            font-size:
                12px;

            display:
                -webkit-box;

            -webkit-box-orient:
                vertical;

            -webkit-line-clamp:
                3;

            overflow:
                hidden;
        }


        /* =====================================================
           DETAIL BUTTON
        ===================================================== */

        .detail-button {

            display:
                inline-block;

            position:
                relative;

            overflow:
                hidden;

            margin-top:
                14px;

            padding:
                10px 16px;

            background:
                #5A1F2B;

            color:
                #FFF9F0;

            text-decoration:
                none;

            border:
                1px solid
                #B08D57;

            border-radius:
                8px;

            font-size:
                11px;

            font-weight:
                600;

            transition:
                0.28s
                ease;
        }


        .detail-button:hover {

            background:
                #7A3543;

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 18px
                rgba(
                    90,
                    31,
                    43,
                    0.18
                );
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-message {

            background:
                rgba(
                    255,
                    249,
                    240,
                    0.95
                );

            padding:
                30px;

            border-radius:
                16px;

            color:
                #7A3543;

            text-align:
                center;

            font-family:
                'Cormorant Garamond',
                serif;

            font-size:
                23px;

            grid-column:
                1 / -1;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 600px) {

            .container {

                width:
                    92%;

                padding:
                    50px 0 70px;
            }

            .filter-box {

                flex-direction:
                    column;
            }

            .search-input,
            .category-select,
            .search-button,
            .reset-button {

                width:
                    100%;
            }

            .magic-book {

                width:
                    120px;

                opacity:
                    0.45;
            }

            .parchment {

                width:
                    60px;
            }

        }


        /* =====================================================
           REDUCE MOTION
        ===================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation-duration:
                    0.01ms !important;

                animation-iteration-count:
                    1 !important;

                transition-duration:
                    0.01ms !important;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         VISUAL BACKGROUND
         Tidak mengubah logic PHP
    ===================================================== -->

    <div
        class="library-scene"
        aria-hidden="true"
    >

        <!-- MAGIC BOOK LEFT -->

        <div
            class="magic-book book-left"
        >

            <img
                src="../../assets/images/jihan/magic-book.png"
                alt=""
            >

        </div>


        <!-- MAGIC BOOK RIGHT -->

        <div
            class="magic-book book-right"
        >

            <img
                src="/literaline/LITERALINE/assets/images/jihan/magic-book.png"
                alt="Magic Book"
            >

        </div>


        <!-- FLOATING PARCHMENT -->

        <div
            class="parchment parchment-1"
        >

            <img
                src="/literaline/LITERALINE/assets/images/jihan/paper.png"
                alt="Parchment"
            >

        </div>


        <div
            class="parchment parchment-2"
        >

            <img
                src="/literaline/LITERALINE/assets/images/jihan/paper.png"
                alt="Parchment"
            >

        </div>


        <div
            class="parchment parchment-3"
        >

            <img
                src="/literaline/LITERALINE/assets/images/jihan/paper.png"
                alt="Parchment"
            >

        </div>


        <!-- GOLD DUST -->

        <div
            class="gold-dust dust-one"
        ></div>

        <div
            class="gold-dust dust-two"
        ></div>

        <div
            class="gold-dust dust-three"
        ></div>

        <div
            class="gold-dust dust-four"
        ></div>

        <div
            class="gold-dust dust-five"
        ></div>

    </div>


    <!-- =====================================================
         ORIGINAL STORY CONTENT
    ===================================================== -->

    <div class="container">


        <!-- =========================
             JUDUL
        ========================== -->

        <h1>Daftar Cerita</h1>


        <!-- =========================
             FILTER & SEARCH
        ========================== -->

        <form
            method="GET"
            action=""
            class="filter-box"
        >

            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari judul atau penulis..."
                value="<?= htmlspecialchars($search); ?>"
            >


            <select
                name="category"
                class="category-select"
            >

                <option value="0">
                    Semua Kategori
                </option>


                <?php while ($category = mysqli_fetch_assoc($category_result)): ?>

                    <option
                        value="<?= $category['id']; ?>"
                        <?= ($category_id == $category['id'])
                            ? 'selected'
                            : ''; ?>
                    >
                        <?= htmlspecialchars($category['name']); ?>
                    </option>

                <?php endwhile; ?>

            </select>


            <button
                type="submit"
                class="search-button"
            >
                Cari
            </button>


            <a
                href="index.php"
                class="reset-button"
            >
                Reset
            </a>

        </form>


        <!-- =========================
             DAFTAR CERITA
        ========================== -->

        <div class="story-list">


            <?php if (mysqli_num_rows($result) > 0): ?>


                <?php while ($story = mysqli_fetch_assoc($result)): ?>


                    <div class="story-card">


                        <?php if (!empty($story['cover'])): ?>

                            <img
                                src="../assets/<?= htmlspecialchars($story['cover']); ?>"
                                alt="<?= htmlspecialchars($story['title']); ?>"
                            >

                        <?php else: ?>

                            <div class="no-cover">
                                Tidak ada cover
                            </div>

                        <?php endif; ?>


                        <h2>
                            <?= htmlspecialchars($story['title']); ?>
                        </h2>


                        <p class="author">
                            Oleh
                            <?= htmlspecialchars($story['author']); ?>
                        </p>


                        <span class="category">

                            <?= htmlspecialchars(
                                $story['category_name']
                                ?? 'Tanpa kategori'
                            ); ?>

                        </span>


                        <p class="description">

                            <?= htmlspecialchars(
                                $story['description']
                            ); ?>

                        </p>


                        <a
                            href="detail.php?id=<?= (int) $story['id']; ?>"
                            class="detail-button"
                        >
                            Lihat Detail
                        </a>


                    </div>


                <?php endwhile; ?>


            <?php else: ?>


                <div class="empty-message">

                    Tidak ada cerita yang ditemukan.

                </div>


            <?php endif; ?>


        </div>


    </div>


</body>

</html>