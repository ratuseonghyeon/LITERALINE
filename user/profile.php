<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - Litera Line</title>

    <link rel="stylesheet" href="css/profile.css">
</head>

<body>

    <!-- HEADER -->
    <header>

        <div class="logo">
            LITERA<span>LINE</span>
        </div>

        <!-- NAVBAR -->
        <nav>
            <a href="index.php">Home</a>
            <a href="explore.php">Explore</a>
            <a href="profile.php" class="active">Profile</a>
        </nav>

    </header>


    <!-- PROFILE -->
    <main class="profile-container">

        <section class="profile-card">

            <!-- FOTO PROFILE -->
            <div class="profile-photo">

                <img
                    src="images/profile/ echo $user['foto']; ?"
                    alt="Foto Profile"
                >

            </div>


            <!-- DATA USER -->
            <div class="profile-info">

                <h1>
                    <echo $user['nama']; >
                </h1>

                <p class="username">
                    <echo $user['username']; >
                </p>

                <p class="bio">
                    <echo $user['bio']; >
                </p>

                <button class="edit-btn">
                    Edit Profile
                </button>

            </div>

        </section>


        <!-- STATISTIK -->
        <section class="stats">

            <div>
                <h3>24</h3>
                <p>Stories Read</p>
            </div>

            <div>
                <h3>12</h3>
                <p>Liked</p>
            </div>

            <div>
                <h3>8</h3>
                <p>Saved</p>
            </div>

        </section>


        <!-- TAB -->
        <div class="tabs">

            <button class="tab active">
                Liked Stories
            </button>

            <button class="tab">
                Saved Stories
            </button>

            <button class="tab">
                Continue Reading
            </button>

        </div>


        <!-- STORY -->
        <section class="stories">

            <div class="story-card">

                <img
                    src="images/book1.jpg"
                    alt="Book Cover"
                >

                <div class="story-info">

                    <h3>
                        Letters From The Past
                    </h3>

                    <p>
                        Romance • Teen Fiction
                    </p>

                </div>

            </div>


            <div class="story-card">

                <img
                    src="images/book2.jpg"
                    alt="Book Cover"
                >

                <div class="story-info">

                    <h3>
                        When The Stars Speak
                    </h3>

                    <p>
                        Fantasy • Romance
                    </p>

                </div>

            </div>


            <div class="story-card">

                <img
                    src="images/book3.jpg"
                    alt="Book Cover"
                >

                <div class="story-info">

                    <h3>
                        Our Last Summer
                    </h3>

                    <p>
                        Drama • Teen Fiction
                    </p>

                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer>

        <p>
            © 2026 Litera Line. All Rights Reserved.
        </p>

    </footer>

</body>

</html>