<?php include 'view/easy_insure_header.php'; ?>
<main>
    <br>
    <h1 style="text-align:center">Enter Username and Password</h1>
    <form method="POST" action="index.php" style="display:block;margin:200 auto; width: 300px; text-align:center">
        <input type="hidden" name="action" value="report" />
        User <input type="text" name="user"></input><br />
        Password <input type="password" name="pass"></input><br />
        <input type="submit" name="submit" value="Go"></input>
    </form>
    <br>
</main>
<?php include 'view/easy_insure_footer.php'; ?>