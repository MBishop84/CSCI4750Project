<?php include 'view/easy_insure_header.php'; ?>
<main>
    <br>
    <h1 style="text-align:center">New Customer Added</h1>
    <p style="text-align:center"><?php echo $confirm; ?></p>
    <br>
    <form action="index.php" method="post">
        <input type="hidden" name="search" value="<?php echo $lastName?>"/>
        <button id="calcbutton" name="action" value='search_customer'>Continue</button>
    </form>
</main>
<?php include 'view/easy_insure_footer.php'; ?>