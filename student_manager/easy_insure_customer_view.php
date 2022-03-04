<?php include 'view/easy_insure_header.php'; ?>
<br>
<main>
    <h1><?php $firstName = $c['firstName'];
        $lastName = $c['lastName'];
        echo sprintf("$firstName $lastName"); ?></h1>
    <table style="width:50%;">
        <tr>
            <td>
                <label>First Name:</label><br>
                <input type="text" name="firstName" value="<?php echo $c['firstName']; ?>">
            </td>
            <td></td>
            <td>
                <label>Last Name:</label><br>
                <input type="text" name="lastName" value="<?php echo $lastName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>Age:</label><br>
                <input type="number" name="age" id="age" value="<?php echo $c['age']; ?>">
            </td>
            <td>
                <label>Gender:</label><br>
                <input type="text" name="gender" value="<?php if ($c['gender'] == 5)
                                                            echo "Male";
                                                        else echo "Female"; ?>">
            </td>
            <td>
                <label>Smoker:</label><br>
                <input type="text" name="smoker" value="<?php if ($c['smoker'] == 3)
                                                            echo 'Yes';
                                                        else echo 'No'; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>Value:</label><br>
                <input type="text" name="smoker" value="<?php if ($c['val'] == 33)
                                                            echo '$250k';
                                                        else if ($c['val'] == 50)
                                                            echo '$500k';
                                                        else echo '$1M'; ?>">
            </td>
            <td>
                <label>Plan:</label>
                <input type="text" name="smoker" value="<?php if ($c['planID'] == 1)
                                                            echo 'Universal';
                                                        else if ($c['planID'] == 2)
                                                            echo 'Whole';
                                                        else echo 'Term'; ?>">
            </td>
            <td>
                <label>Policy Start Date:</label>
                <input type="text" name="date" value="<?php echo $c['policyStart']; ?>">
            </td>
        <tr>
            <td>
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo $c['email']; ?>">
            </td>
            <td>
                <label>Phone Number:</label>
                <input type="text" name="phone" value="<?php echo $c['phone']; ?>">
            </td>
            <td>
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo $c['address']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>City:</label>
                <input type="text" name="city" value="<?php echo $c['city']; ?>">
            </td>
            <td>
                <label>State:</label>
                <input type="text" name="state" value="<?php echo $c['state']; ?>">
            </td>
            <td>
                <label>Zip:</label>
                <input type="number" name="zip" value="<?php echo $c['zip']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>Dependant:</label>
                <input type="text" name="dependant" value="<?php echo $c['dependant']; ?>">
            </td>
            <td>
                <label>Contact#:</label>
                <input type="text" name="contact" value="<?php echo $c['contactN']; ?>">
            </td>
            <td>
                <label>Relationship:</label>
                <input type="text" name="rel" value="<?php echo $c['relation']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label class="label3">Monthly Premium:</label><br>
                <input type="currency" id="monthly" name="monthlyPremium" value="<?php echo $c['monthlyPremium']; ?>">
            </td>
        </tr>
    </table>
</main>
<br>
<?php include 'view/easy_insure_footer.php'; ?>