<?php include 'view/easy_insure_header.php'; ?>
<main>
    <h1>Waiting List</h1>
    <form action="index.php" method="post" id="add_wait">
        <input type="hidden" name="action" value="add_wait">
        <table style="width:50%">
            <tr>
                <td>
                <label>First Name:</label>
                <input type="text" name="firstName">
                </td>
                <td>
                <label>Last Name:</label>
                <input type="text" name="lastName">
                </td>
                <td>
                <label>Phone Number:</label>
                <input type="text" name="phone" id="number">
                </td>
            </tr>
            <tr>
                <td>
                <label>Date:</label>
                <input type="date" name="date" id="date">
                </td>
                <td>
                <label>Time:</label>
                <input type="time" name="time" id="time">
                </td>
                <td>
                <label>Email:</label>
                <input type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="ADD" class="button" style="padding:5px; font-size:larger; margin:auto; text-align:center;"></td>
                <td></td>
            </tr>
        </table>
    </form>
    <br>
    <br>
    <br>
    <table class="waitlist">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th></th>
        </tr>
        <?php
        foreach ($waiting as $w) {
        ?>
            <tr>
                <td><?php echo $w['firstName']; ?></td>
                <td><?php echo $w['lastName']; ?></td>
                <td><?php echo $w['phone']; ?></td>
                <td><?php echo $w['email']; ?></td>
                <td><?php echo $w['date']; ?></td>
                <td><?php echo $w['time']; ?></td>
                <td>
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="delete_wait">
                        <input type="hidden" name="wait_id" value="<?php echo $w['waitID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
</main>
<?php include 'view/easy_insure_footer.php'; ?>