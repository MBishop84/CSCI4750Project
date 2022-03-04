<?php

function get_customers_by_plan($plan_id) {
    global $db;
    $query = "SELECT * FROM customer WHERE planID = :plan_id ORDER BY customerID";
    $statement = $db->prepare($query);
    $statement->bindValue(':plan_id', $plan_id);
    $statement->execute();
    $customer = $statement->fetchAll();
    $statement->closeCursor();
    return $customer;
}

function get_all_customers(){
    global $db;
    $query = 'SELECT * FROM customer ORDER BY planID';
    $statement = $db->prepare($query);
    $statement->execute();
    $customer = $statement->fetchAll();
    $statement->closeCursor();
    return $customer;
}

function search_all_customers($search){
    global $db;
    $query = "SELECT * FROM customer WHERE firstName = :firstName OR lastName = :lastName";
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $search);
    $statement->bindValue(':lastName', $search);
    $statement->execute();
    $customer = $statement->fetchAll();
    $statement->closeCursor();
    return $customer;
}

function view_customer($customer_id){
    global $db;
    $query = "SELECT * FROM customer WHERE customerID = :customer_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $c = $statement->fetch();
    $statement->closeCursor();
    return $c;
}

function delete_plan($plan_id) {
    global $db;
    $query = 'DELETE FROM plan WHERE planID = :plan_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':plan_id', $plan_id);
    $statement->execute();
    $statement->closeCursor();;
}


function add_customer($plan_id, $firstName, $lastName, $age, $gender, $smoker, $val, $monthly_premium,
$email, $phone, $address, $city, $state, $zip, $dependant, $contact, $rel, $date){
    global $db;
    $customer_id = 'NEXT VALUE FOR customer.CountBy1';
    $query = 'INSERT INTO customer
                 (customerID, planID, firstName, lastName, age, gender, smoker, val, monthlyPremium,
        email, phone, address, city, state, zip, dependant, contactN, relation, policyStart)
              VALUES
                 (:customer_id, :plan_id, :first_name, :last_name, :age, 
                 :gender, :smoker, :val, :monthly_premium,
        :email, :phone, :address, :city, :state, :zip, :dependant, :contactN, :rel, :policyStart)';
	
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':plan_id', $plan_id);
    $statement->bindValue(':first_name', $firstName);
    $statement->bindValue(':last_name', $lastName);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':smoker', $smoker);
    $statement->bindValue(':val', $val);
    $statement->bindValue(':monthly_premium', $monthly_premium);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':dependant', $dependant);
    $statement->bindValue(':contactN', $contact);
    $statement->bindValue(':rel', $rel);
    $statement->bindValue(':policyStart', $date);
    $statement->execute();
    $statement->closeCursor();
}

function get_plan_name($plan_id) {
    global $db;
    $query = 'SELECT * FROM plan WHERE planID = :plan_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':plan_id', $plan_id);
    $statement->execute();
    $plan = $statement->fetch();
    $plan_name = $plan['planName'];
    $statement->closeCursor();
    return $plan_name;
}

function get_plans() {
    global $db;
    $query = 'SELECT * FROM plan ORDER BY planID';
    $statement = $db->prepare($query);
    $statement->execute();
    $plans = $statement->fetchAll();
    $statement->closeCursor();
    return $plans;    
}

function delete_customer($customer_id) {
    global $db;
    $query = 'DELETE FROM customer WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();;
}

function add_plan($planName, $mod) {
    global $db;
    $plan_id = 'NEXT VALUE FOR plan.CountBy1';
    $query = 'INSERT INTO plan
                 (planID, planName, mod)
              VALUES
                 (:plan_id, :planName, :mod)';
	$statement = $db->prepare($query);
    $statement->bindValue(':plan_id', $plan_id);
    $statement->bindValue(':planName', $planName);
    $statement->bindValue(':mod', $mod);
    $statement->execute();
    $statement->closeCursor();
}

function add_wait($firstName, $lastName, $phone, $email, $date, $time) {
    global $db;
    $wait_id = 'NEXT VALUE FOR waitList.CountBy1';
    $query = 'INSERT INTO waitList
                 (waitID, firstName, lastName, phone, email, date, time)
              VALUES
                 (:wait_id, :firstName, :lastName, :phone, :email, :date, :time)';
	$statement = $db->prepare($query);
    $statement->bindValue(':wait_id', $wait_id);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':time', $time);
    $statement->execute();
    $statement->closeCursor();
}

function get_wait() {
    global $db;
    $query = 'SELECT * FROM waitList ORDER BY waitID';
    $statement = $db->prepare($query);
    $statement->execute();
    $wait = $statement->fetchAll();
    $statement->closeCursor();
    return $wait;    
}

function delete_wait($wait_id) {
    global $db;
    $query = 'DELETE FROM waitList WHERE waitID = :wait_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':wait_id', $wait_id);
    $statement->execute();
    $statement->closeCursor();;
}

function get_plan_count($plan_id) {
    global $db;
    $query = 'SELECT COUNT(*) FROM customer WHERE planID = :plan_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':plan_id', $plan_id);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return intval($count);
}

function get_value_count($val) {
    global $db;
    $query = 'SELECT COUNT(*) FROM customer WHERE val = :val';
    $statement = $db->prepare($query);
    $statement->bindValue(':val', $val);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return intval($count);
}

function get_customer_count() {
    global $db;
    $query = 'SELECT COUNT(*) FROM customer';
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return intval($count);
}

function get_wait_count() {
    global $db;
    $query = 'SELECT COUNT(*) FROM waitList';
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return intval($count);
}

function get_premium_total() {
    global $db;
    $query = 'SELECT SUM(monthlyPremium) FROM customer';
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return floatval($count);
}
?>