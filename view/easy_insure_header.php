<!DOCTYPE html>

<html lang="en">

<head>
    <title>Easy Insure</title>
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <table>
            <tr>
                <td>
                    <img src="img\skull-hands.png" style="max-height: 100px; padding: 0 0 0 10px;">
                </td>
                <td>
                    <h1>Easy Insure</h1><em>Secure the Future</em>
                </td>
                <td>
                    <img src="img\skull-hands.png" style="max-height: 100px; padding: 0 10px 0 0;">
                </td>
            </tr>
        </table>
        <div class="topnav" id="myTopnav">
            <a href="?action=home" id="<?php echo $home; ?>">Home</a>
            <a href="?action=show_add_form" id="<?php echo $new; ?>">New Customer</a>
            <a href="?action=list_all" id="<?php echo $customerL; ?>">Customer List</a>
            <a href="?action=wait_list" id="<?php echo $waitL; ?>">Waiting List</a>
            <a href="?action=password" id="<?php echo $password; ?>">Report</a>
        </div>
    </header>