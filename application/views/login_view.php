<section class="section">
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-mobile">
                <h1 class="title">Login</h1>
                <form action="<?= base_url() ?>index.php/login/auth" method="POST">
                    <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Username" name="username">
                        <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                        </span>
                    </p>
                    </div>
                    <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" placeholder="Password" name="password">
                        <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                        </span>
                    </p>
                    </div>
                    <div class="field">
                    <p class="control">
                        <button class="button is-success">
                        Login
                        </button>
                    </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>