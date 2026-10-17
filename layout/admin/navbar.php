<nav class="admin-navbar">

    <div class="navbar-brand">
        <a href="/literaline/admin/dashboard.php">
            Literaline
        </a>
        <span>ADMIN</span>
    </div>

    <div class="navbar-menu">
        <a href="/literaline/admin/dashboard.php">Dashboard</a>
        <a href="/literaline/admin/categories/">Categories</a>
        <a href="/literaline/admin/chapters/">Chapters</a>
        <a href="/literaline/admin/stories/">Stories</a>
        <a href="/literaline/admin/users/">Users</a>
    </div>

    <div class="navbar-account">
        <span class="admin-name">Admin</span>
        <a href="/literaline/auth/logout.php" class="logout-btn">
            Logout
        </a>
    </div>

</nav>

<style>
    .admin-navbar {
        width: 100%;
        box-sizing: border-box;

        position: sticky;
        top: 0;
        z-index: 1000;

        min-height: 72px;
        padding: 12px 45px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;

        background-color: #5A1F2B;
        border-bottom: 1px solid #B08D57;
        box-shadow: 0 4px 15px rgba(51, 37, 31, 0.12);
    }

    /* BRAND */
    .admin-navbar .navbar-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        white-space: nowrap;
    }

    .admin-navbar .navbar-brand a {
        font-family: 'Great Vibes', cursive;
        font-size: 34px;
        font-weight: 400;
        color: #F5EBDD;
        text-decoration: none;
    }

    .admin-navbar .navbar-brand span {
        padding: 3px 8px;
        border: 1px solid #B08D57;
        border-radius: 6px;

        font-family: 'Poppins', sans-serif;
        font-size: 9px;
        font-weight: 600;
        letter-spacing: 1px;
        color: #B08D57;
    }

    /* MENU */
    .admin-navbar .navbar-menu {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 25px;
    }

    .admin-navbar .navbar-menu a {
        position: relative;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        font-weight: 500;
        color: #F5EBDD;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .admin-navbar .navbar-menu a::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -7px;

        width: 0;
        height: 1px;
        background-color: #B08D57;

        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .admin-navbar .navbar-menu a:hover {
        color: #D8BFA8;
    }

    .admin-navbar .navbar-menu a:hover::after {
        width: 100%;
    }

    /* ACCOUNT */
    .admin-navbar .navbar-account {
        display: flex;
        align-items: center;
        gap: 15px;
        white-space: nowrap;
    }

    .admin-navbar .admin-name {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #D8BFA8;
    }

    .admin-navbar .logout-btn {
        padding: 8px 15px;
        border: 1px solid #B08D57;
        border-radius: 8px;

        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 500;
        color: #F5EBDD;
        text-decoration: none;

        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .admin-navbar .logout-btn:hover {
        background-color: #B08D57;
        color: #33251F;
    }

    /* RESPONSIVE */
    @media (max-width: 1000px) {
        .admin-navbar {
            padding: 15px 25px;
            flex-wrap: wrap;
            gap: 18px;
        }

        .admin-navbar .navbar-menu {
            order: 3;
            width: 100%;
            flex-wrap: wrap;
            justify-content: center;
            gap: 18px;
        }
    }

    @media (max-width: 500px) {
        .admin-navbar {
            justify-content: center;
            padding: 15px;
        }

        .admin-navbar .navbar-account {
            gap: 10px;
        }
    }
</style>
