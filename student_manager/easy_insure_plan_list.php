<?php include 'view/easy_insure_header.php'; ?>

<main>

    <h1>Plans</h1>
    <table>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        <?php
        foreach ($plans as $p) {
        ?>
            <tr>
                <td><?php echo $p['planName']; ?></td>
                <td class="button">
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="delete_plan">
                        <input type="hidden" name="plan_id" value="<?php echo $p['planID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <h1>Add Plan</h1>
    <form method="post" action="index.php">
        <label>Plan Name:</label>
        <input type="hidden" name="action" value="add_plan">
        <input type="text" name="PlanName"><br>
        <input type="submit" value="Add" class="button">
    </form>

</main>

<?php include 'view/easy_insure_footer.php'; ?>