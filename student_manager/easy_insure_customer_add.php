<?php include 'view/easy_insure_header.php'; ?>
<script>
    function calculate() {
        let agex = parseInt(document.getElementById("age").value);
        let base = parseInt(document.getElementById("planID").value);
        let gender = parseInt(document.getElementById("gender").value);
        let smoker = parseInt(document.getElementById("smoker").value);
        let val = parseInt(document.getElementById("val").value);
        var total = 0;

        if (base == 1) {
            total = 44;
        } else if (base == 2) {
            total = 56;
        } else {
            total = 75;
        }

        if (agex < 30) {
            total = (33 + total) / 2;
        } else if (agex >= 30 && agex <= 50) {
            total = (50 + total) / 2;
        } else {
            total = (118 + total) / 2;
        }

        total += gender;
        total *= smoker;
        document.getElementById("monthly").value = ((total + val) / 2).toFixed(2);
        document.getElementById("submit").type = "submit";
    }
</script>
<main>
    <h1>Add Customer</h1>
    <form action="index.php" method="post" id="add_customer_form">
        <input type="hidden" name="action" value="add_customer">
        <table style="width:50%;">
            <tr>
                <td>
                    <label>First Name:</label><br>
                    <input type="text" name="firstName">
                </td>
                <td></td>
                <td>
                    <label>Last Name:</label><br>
                    <input type="text" name="lastName">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Age:</label><br>
                    <input type="number" name="age" id="age">
                </td>
                <td>
                    <label>Gender:</label><br>
                    <select name="gender" id="gender">
                        <option value=5>Male</option>
                        <option value=0>Female</option>
                    </select>
                </td>
                <td>
                    <label>Smoker:</label><br>
                    <select name="smoker" id="smoker">
                        <option value=3>Yes</option>
                        <option value=1>No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Value:</label><br>
                    <select name="val" id="val">
                        <option value=33>$250k</option>
                        <option value=50>$500k</option>
                        <option value=100>$1M</option>
                    </select>
                </td>
                <td>
                    <label>Plan:</label>
                    <select name="plan_id" id="planID">
                        <?php
                        foreach ($plans as $p) :
                        ?>
                            <option value='<?php echo $p['planID']; ?>'><?php echo $p['planName']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="date" value="<?php echo date("yyyy-mm-dd");?>"> 
                </td>
            <tr>
                <td>
                    <label>Email:</label>
                    <input type="text" name="email">
                </td>
                <td>
                    <label>Phone Number:</label>
                    <input type="text" name="phone">
                </td>
                <td>
                    <label>Address:</label>
                    <input type="text" name="address">
                </td>
            </tr>
            <tr>
                <td>
                    <label>City:</label>
                    <input type="text" name="city">
                </td>
                <td>
                    <label>State:</label>
                    <input type="text" name="state">
                </td>
                <td>
                    <label>Zip:</label>
                    <input type="number" name="zip">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Dependant:</label>
                    <input type="text" name="dependant">
                </td>
                <td>
                    <label>Contact#:</label>
                    <input type="text" name="contact">
                </td>
                <td>
                    <label>Relationship:</label>
                    <input type="text" name="rel">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label3">Monthly Premium:</label><br>
                    <input type="currency" id="monthly" name="monthlyPremium" value="">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input id="submit" type="hidden" value="Add Customer" class="button"></td>
                <td></td>
            </tr>
        </table>
    </form>
    <br>
    <br>
    <button id="calcbutton" onclick="calculate()">Calculate</button>
</main>
<?php include 'view/easy_insure_footer.php'; ?>