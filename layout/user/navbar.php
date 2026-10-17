
<nav class="user-navbar">

    <div class="navbar-brand">
        <a href="/literaline/index.php">
            Literaline
        </a>
    </div>

    <div class="navbar-menu">

        <a href="/literaline/index.php">
            Landing Page
        </a>

        <a href="/literaline/user/home.php">
            Home
        </a>

        <a href="/literaline/user/profile.php">
            Profile
        </a>

    </div>

    <div class="navbar-account">

        <a
            href="/literaline/auth/logout.php"
            class="logout-btn"
        >
            Logout
        </a>

    </div>

</nav>

<style>

    .user-navbar {
        width: 100%;
        box-sizing: border-box;

        position: sticky;
        top: 0;
        z-index: 1000;

        min-height: 76px;
        padding: 0 50px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;

        background-color: #5A1F2B;
        border-bottom: 1px solid #B08D57;
        box-shadow: 0 4px 18px rgba(51, 37, 31, 0.12);
    }

    .navbar-brand a {
        display: inline-block;

        font-family: 'Great Vibes', cursive;
        font-size: 38px;
        font-weight: 400;

        color: #F5EBDD;
        text-decoration: none;

        transition: color 0.3s ease;
    }

    .navbar-brand a:hover {
        color: #B08D57;
    }

    .navbar-menu {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 35px;
    }

    .navbar-menu a {
        position: relative;

        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        font-weight: 500;

        color: #F5EBDD;
        text-decoration: none;

        transition: color 0.3s ease;
    }

    .navbar-menu a::after {
        content: "";
        position: absolute;

        left: 50%;
        bottom: -8px;

        width: 0;
        height: 1px;

        background-color: #B08D57;
        transform: translateX(-50%);

        transition: width 0.3s ease;
    }

    .navbar-menu a:hover {
        color: #D8BFA8;
    }

    .navbar-menu a:hover::after {
        width: 100%;
    }

    .navbar-account {
        display: flex;
        align-items: center;
    }

    .logout-btn {
        padding: 8px 17px;

        border: 1px solid #B08D57;
        border-radius: 8px;

        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 500;

        color: #F5EBDD;
        text-decoration: none;

        transition:
            background-color 0.3s ease,
            color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #B08D57;
        color: #33251F;
    }

    @media (max-width: 800px) {

        .user-navbar {
            padding: 15px 24px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .navbar-menu {
            order: 3;
            width: 100%;
            justify-content: center;
            gap: 22px;
            flex-wrap: wrap;
        }

    }

</style>
