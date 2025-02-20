<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="/users">Users</a>
                <a class="nav-link" href="/users/logout">Logout</a>
            </div>
        </div>
        <?php if (isset($_SESSION['user_name'])): ?>
        <span class="navbar-text text-white ms-3">Hello, <?= $_SESSION['user_name']; ?></span>
        <?php endif; ?>
    </div>
</nav>