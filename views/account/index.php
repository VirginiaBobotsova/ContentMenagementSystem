
<div id="container">
    <h1 class="blue">Enter the system</h1>
    <p class="gray">It is necessary to login in your account in order to sign in for a course</p>
    <section>
        <div class="register_form">
            <form method="post" action="/account/register">
                <legend><span class="gray">ARE YOU NEW?</span><span class="blue"> REGISTER</span></legend>
                <input type="text" class="info" placeholder="User name">
                <input type="email" class="info" placeholder="Email">
                <input type="password" class="info" placeholder="Password">
                <input type="password" class="info" placeholder="Password">
                <input type="submit" value="Register" class="blue">
            </form>
        </div>
    </section>
    <section>
        <div class="login_form">
            <form method="post" action="/account/login">
                <legend><span class="white">ALREADY A STUDENT? LOGIN</span></legend>
                <input type="text" class="info" placeholder="User name">
                <input type="password" class="info" placeholder="Password">
                <input type="checkbox" name="remember">
                <label class="rem" for="remember">Remember me?</label>
                <input type="submit" value="Login"><br><br>
                <a href="#">Forgot Password</a>
            </form>
        </div>
    </section>
</div>
