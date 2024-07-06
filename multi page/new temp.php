<?php
//intiialize variables

$errors = [];

// Check if form is submitted
if (isset($_POST['submit'])) {
  // Sanitize and validate form data (avoid using $_REQUEST)
  $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
  $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
  $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
  $confirmPassword = trim(filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING));

  $errors = []; // Array to store error messages

  // Validate name
  if (empty($name)) {
    $errors['name'] = "Please enter your name.";
  } else if (strlen($name) < 3 || strlen($name) > 50) {
    $errors['name'] = "Name must be between 3 and 50 characters.";
  }

  // Validate email
  if (empty($email)) {
    $errors['email'] = "Please enter your email.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
  }

  // Validate phone (basic check for 10 digits)
  if (empty($phone)) {
    $errors['phone'] = "Please enter your phone number.";
  } else if (!preg_match("/^\d{10}$/", $phone)) {
    $errors['phone'] = "Invalid phone number format (must be 10 digits).";
  }

  // Validate password
  if (empty($password)) {
    $errors['password'] = "Please enter a password.";
  } else if (strlen($password) < 8) {
    $errors['password'] = "Password must be at least 8 characters long.";
  } else if ($password !== $confirmPassword) {
    $errors['confirmPassword'] = "Passwords do not match.";
  }

  // If no errors, process registration (replace with your actual registration logic)

  $conn = mysqli_connect( "localhost", "root", "", "new temp");
$sql = "INSERT INTO `regis`(`name`, `email`, `mobile`, `address`, `gender`, `password`, `confirm_password`) VALUES ('Aditya','aj2072726@gmail.com','8849615511','291/244,Nr. Agrawall hall, Sagwadi, kalvibid, bhavanagar-364002, Gujarat. ','Male','123456','123456')";
$result = mysqli_query($conn ,$sql);
  if ($conn){

    echo "Registration successful!";

  }
  else{
    die("Registration failed: " . mysqli_connect_error());
  }

}
  //if (empty($errors)) {
    // Hash the password for secure storage (using bcrypt recommended)
    //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    //$conn = mysqli_connect('localhost', 'your_username', 'your_password', 'your_database_name');
    // Insert data into database or perform other registration steps
    // (connect to database, prepare and execute SQL statement)

    // Display success message or redirect to a confirmation page
    //echo "Registration successful!";
  //} else {
    // Display error messages
    //echo "Errors occurred:";
    //foreach ($errors as $error) {
      //echo "<p style='color: red;'>* $error</p>";
    //}
  //}
//}
?>
