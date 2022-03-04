<?php
require('model\easy_insure_database.php');
require('model\easy_insure_db_functions.php');

$userM = 'admin';
$passM = 'admin';
$home = '';
$new = '';
$customerL = '';
$waitL = '';
$report = '';
$password = '';

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}
$plan_id = filter_input(INPUT_GET, 'plan_id');
if ($plan_id > 0) {
    $action = 'list_plans';
}
if ($action == 'home') {
    $home = 'active';
    include('easy_insure_home.php');
} else if ($action == 'list_plans') {
    $customerL = 'active';
    $plan_id = filter_input(INPUT_GET, 'plan_id', FILTER_VALIDATE_INT);
    if ($plan_id == NULL || $plan_id == FALSE) {
        $plan_id = 1;
    }

    $plan_name = get_plan_name($plan_id);
    $plans = get_plans();
    $customers = get_customers_by_plan($plan_id);
    include('easy_insure_customer_list.php');
} else if ($action == 'list_all') {
    $customerL = 'active';
    $plan_id = filter_input(INPUT_GET, 'plan_id', FILTER_VALIDATE_INT);
    $plan_name = "All Customers";
    $plans = get_plans();
    $customers = get_all_customers();
    include('easy_insure_customer_list.php');
} else if ($action == 'search_customer') {
    $customerL = 'active';
    $search = filter_input(INPUT_POST, 'search');
    $plan_name = strval($search);
    $plans = get_plans();
    $customers = search_all_customers($search);

    include('easy_insure_customer_list.php');
} else if ($action == 'delete_customer') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $plan_id = filter_input(INPUT_POST, 'plan_id', FILTER_VALIDATE_INT);

    delete_customer($customer_id);
    header("Location: .?customer_id=$plan_id");
} else if ($action == 'customer_view') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $c = view_customer($customer_id);

    include('easy_insure_customer_view.php');
} else if ($action == 'show_add_form') {
    $new = 'active';
    $plans = get_plans();
    include('easy_insure_customer_add.php');
} else if ($action == 'add_customer') {
    $plan_id = intval(filter_input(INPUT_POST, 'plan_id'));
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $age = intval(filter_input(INPUT_POST, 'age'));
    $gender = intval(filter_input(INPUT_POST, 'gender'));
    $smoker = intval(filter_input(INPUT_POST, 'smoker'));
    $val = intval(filter_input(INPUT_POST, 'val'));
    $monthly_premium = floatval(filter_input(INPUT_POST, 'monthlyPremium'));
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $dependant = filter_input(INPUT_POST, 'dependant');
    $contact = filter_input(INPUT_POST, 'contact');
    $rel = filter_input(INPUT_POST, 'rel');
    $date = filter_input(INPUT_POST, 'date');
    if ($lastName == '') {
        $error = "Invalid last name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($firstName == '') {
        $error = "Invalid first name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($age == 0) {
        $error = "Invalid age name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($gender == 0) {
        $error = "Invalid gender. Check all fields and try again.";
        include('errors/error.php');
    } else if ($val == 0) {
        $error = "Invalid value name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($monthly_premium == 0.0) {
        $error = "Invalid premium name. Calculate first.";
        include('errors/error.php');
    } else if ($email == '') {
        $error = "Invalid email. Check all fields and try again.";
        include('errors/error.php');
    } else if ($phone == 0) {
        $error = "Invalid phone. Check all fields and try again.";
        include('errors/error.php');
    } else if ($address == 0) {
        $error = "Invalid address. Check all fields and try again.";
        include('errors/error.php');
    } else if ($city == 0) {
        $error = "Invalid city name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($state == 0.0) {
        $error = "Invalid state name. Calculate first.";
        include('errors/error.php');
    } else if ($zip == '') {
        $error = "Invalid zip. Check all fields and try again.";
        include('errors/error.php');
    } else if ($dependant == 0) {
        $error = "Invalid dependant name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($contact == 0) {
        $error = "Invalid contact number. Check all fields and try again.";
        include('errors/error.php');
    } else if ($rel == 0) {
        $error = "Invalid relationship. Check all fields and try again.";
        include('errors/error.php');
    } else if ($date == 0.0) {
        $error = "Invalid date. Calculate first.";
        include('errors/error.php');
    } else {
        add_customer(
            $plan_id,
            $firstName,
            $lastName,
            $age,
            $gender,
            $smoker,
            $val,
            $monthly_premium,
            $email,
            $phone,
            $address,
            $city,
            $state,
            $zip,
            $dependant,
            $contact,
            $rel,
            $date
        );
        $confirm = sprintf("$firstName $lastName has been added.");
        include("add_confirm.php");
    }
} else if ($action == 'show_plan_list') {
    $plans = get_plans();
    include('easy_insure_plan_list.php');
} else if ($action == 'delete_plan') {
    $plan_id = filter_input(INPUT_POST, 'plan_id', FILTER_VALIDATE_INT);
    delete_plan($plan_id);
    header("Location: .?action=show_plan_list");
} else if ($action == 'add_plan') {
    $planName = filter_input(INPUT_POST, 'planName');
    $mod = filter_input(INPUT_POST, 'mod');
    if ($planName == '') {
        $error = "Invalid (empty) plan data. Check all feilds and try again.";
        include('../errors/error.php');
    } else {
        add_plan($planName, $mod);
        header("Location: .?action=show_plan_list");
    }
} else if ($action == 'wait_list') {
    $waitL = 'active';
    $waiting = get_wait();
    include('easy_insure_wait_list.php');
} else if ($action == 'add_wait') {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');

    if ($lastName == '') {
        $error = "Invalid last name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($firstName == '') {
        $error = "Invalid first name. Check all fields and try again.";
        include('errors/error.php');
    } else if ($phone == "") {
        $error = "Invalid phone number. Check all fields and try again.";
        include('errors/error.php');
    } else if ($email == "") {
        $error = "Invalid email. Check all fields and try again.";
        include('errors/error.php');
    } else if ($date == null) {
        $error = "Invalid date. Check all fields and try again.";
        include('errors/error.php');
    } else if ($time == null) {
        $error = "Invalid time. Check all fields and try again.";
        include('errors/error.php');
    } else {
        add_wait($firstName, $lastName, $phone, $email, $date, $time);
        header("Location: .?action=wait_list");
    }
} else if ($action == 'delete_wait') {
    $wait_id = filter_input(INPUT_POST, 'wait_id', FILTER_VALIDATE_INT);

    delete_wait($wait_id);
    header("Location: .?action=wait_list");
} else if ($action == 'report') {

    $user = filter_input(INPUT_POST,'user');
    $pass = filter_input(INPUT_POST,'pass');

    if ( $user == $userM && $pass == $passM ) {
        $report = 'active';
        $universal = get_plan_count(1);
        $whole = get_plan_count(2);
        $term = get_plan_count(3);
        $low = get_value_count(33);
        $med = get_value_count(50);
        $high = get_value_count(100);
        $cust = get_customer_count();
        $wait = get_wait_count();
        $total = get_premium_total();

        $dataPoints = array(
            array("label" => "Universal", "y" => $universal),
            array("label" => "Whole", "y" => $whole),
            array("label" => "Term", "y" => $term),
        );
        $dataPoints2 = array(
            array("label" => "$250k", "y" => $low),
            array("label" => "$500k", "y" => $med),
            array("label" => "$1M", "y" => $high),
        );
        include('easy_insure_report.php');
    } else {
        $error = "Invalid Username or Password. Check all fields and try again.";
        include('errors/error.php');
    }
} else if ($action == 'password'){
    include('errors/passwords.php');
}
?>