<?php include 'view/easy_insure_header.php'; ?>

<main>
    <br>
    <form method="post" action="index.php" style="width: 50%; display:block; margin:auto;">
        <input type="hidden" name="action" value="search_customer">
        <input type="submit" value="Search" style="width:20%;float:right"><input type="text" name="search" style="width: 40%;float:right"><label style="float:right">Search:</label>
    </form>
    <br>
    <h1>Customer List</h1>
    <aside>
        <nav>
        <h2>Plans:</h2>
            <ul>
                <?php
                foreach ($plans as $p) {
                ?>
                    <li><a href="index.php?plan_id=<?php echo $p['planID']; ?>"><?php echo $p['planName']; ?></a></li><br>
                <?php
                }
                ?>
                <li><a href="?action=list_all">All Customers</a></li>
            </ul>
        </nav>
    </aside>
    <section>
        <h2><?php echo $plan_name; ?></h2>
        <table class="customerTable">
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Smoker</th>
                <th>Value</th>
                <th>Monthly Premium</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            foreach ($customers as $c) {
            ?>
                <tr>
                    <td class="id"><?php echo $c['customerID']; ?></td>
                    <td class="name"><?php echo $c['firstName']; ?></td>
                    <td class="email"><?php echo $c['lastName']; ?></td>
                    <td class="id"><?php if ($c['gender'] == 5)
                                        echo "Male";
                                    else echo "Female"; ?></td>
                    <td class="id"><?php if ($c['smoker'] == 3)
                                        echo 'Yes';
                                    else echo 'No'; ?></td>
                    <td><?php if ($c['val'] == 33)
                            echo '$250k';
                        else if ($c['val'] == 50)
                            echo '$500k';
                        else echo '$1M'; ?></td>
                    <td class="id"><?php print('$');
                                    echo number_format($c['monthlyPremium'], 2); ?></td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="action" value="delete_customer">
                            <input type="hidden" name="customer_id" value="<?php echo $c['customerID']; ?>">
                            <input type="hidden" name="plan_id" value="<?php echo $c['planID']; ?>">
                            <input type="submit" value="Delete" class="delete">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="action" value="customer_view">
                            <input type="hidden" name="customer_id" value="<?php echo $c['customerID']; ?>">
                            <input type="submit" value="View" class="delete">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
    </section>
</main>

<?php include 'view/easy_insure_footer.php'; ?>