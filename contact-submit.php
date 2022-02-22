<?php

include('include/bootstrap.php');

ini_set('display_errors', 'on');

$fname = $lname = $email = $subject = $message = "";

function checkValidEntries($formValidation) {
    foreach ($formValidation as $formInput => $validityCriteria) {

        //Retrieve validity test results from each input's validity criteria as unassociated array
        $validityResults = array_values($validityCriteria);

        //Computes if all validation passes
        $allTestsPass = array_unique($validityResults) === array(true);

        //Alternate computation for single validation tests
        $singleTestPass = $validityResults === [true];

        if (count($validityCriteria) > 1 && !($allTestsPass)) {
            return false;
        } else if (count($validityCriteria) == 1 && !($singleTestPass)) {
            return false;
        }
    }
    return true;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isValidEmail($email) {
    return preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i", $email) == 1;
}

try {
    $dsn = "mysql:host=localhost;dbname=test;";
    $username = $_ENV['USERNAME'];
    $password = $_ENV['PASSWORD'];
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $e;
    exit();
}

try {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $formValidation = array_fill_keys(array_keys($_POST), array());
    if (isValidEmail($_POST['email'])) {
        $email = test_input($_POST['email']);
        $formValidation['email']['valid'] = true;
    } else {
        $formValidation['email']['valid'] = false;
    }
    foreach ($_POST as $entry => $input) {
        if(empty($input)) {
            $formValidation[$entry]['filled'] = false;
        }
        else if (!empty($input)) {
            $formValidation[$entry]['filled'] = true;
        }
    }
    $validForm = checkValidEntries($formValidation);
    echo json_encode(
        array(
                'formValidation' => $formValidation,
                'validForm' => $validForm
            )
        );
} catch(Exception $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}