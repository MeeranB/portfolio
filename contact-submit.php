<?php

include('include/bootstrap.php');

ini_set('display_errors', 'on');

$submitted = false;

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
    http_response_code(503);
    echo $e;
    exit();
}

try {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $formValidation = array_fill_keys(array_keys($_POST), array());
    if (isValidEmail($_POST['email'])) {
        // $email = test_input($_POST['email']);
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

    if ($validForm) {
        $trimmedInput = array_map('test_input', $_POST);
        $stmt = $db->prepare('INSERT INTO messages VALUES (id, :fname, :lname, :email, :subject, :message)');
        $fname = filter_var($trimmedInput['fname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_var($trimmedInput['lname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $subject = filter_var($trimmedInput['subject'], FILTER_SANITIZE_SPECIAL_CHARS);
        $message = filter_var($trimmedInput['message'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($trimmedInput['email'], FILTER_SANITIZE_EMAIL);

        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR); 
        $stmt->bindParam(':email', $email, PDO::PARAM_STR); 
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR); 
        $stmt->bindParam(':message', $message, PDO::PARAM_STR); 
        $stmt->execute();

        $submitted = true;
    }


    echo json_encode(
        array( 
                'formValidation' => $formValidation,
                'validForm' => $validForm,
                'submitted' => $submitted
            )
        );

} catch(Exception $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}