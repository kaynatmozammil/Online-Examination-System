<?php
include("register.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>University Entrance Exam Registration</title>
  <link rel="stylesheet" href="examform.css" />
</head>

<body>
<header >
      <nav>
        <div class="logo-container">
          <div class="logo">
            <a href="index.html">
              <img src="images/logo.jpg" alt="OES Logo" />
            </a>
          </div>
          <div class="site-title">
            <a href="index.html">Online Examination System</a>
          </div>
        </div>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="signin.html">Sign In</a></li>
          <li><a href="signup.html">Sign Up</a></li>
          <li><a href="about.html">About</a></li>
        </ul>
      </nav>
    </header>

  <div class="container">
    <h1>University Entrance Exam Registration</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
      <!-- Personal Information -->
      <fieldset>
        <legend>Personal Information</legend>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="Your name" required />

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required />

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required />

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required />

        <!-- <label for="photo">Upload Your Photo:</label>
          <input type="file" id="photo" name="photo" accept="image/*" required /> -->
      </fieldset>

      <!-- Address Information -->
      <fieldset>
        <legend>Address Information</legend>
        <label for="permanent-address">Permanent Address:</label>
        <textarea id="permanent-address" name="permanent-address" rows="3" required></textarea>

        <label for="correspondence-address">Correspondence Address:</label>
        <textarea id="correspondence-address" name="correspondence-address" rows="3" required></textarea>
      </fieldset>

      <!-- Academic Information -->
      <fieldset>
        <legend>Academic Information</legend>
        <label for="school">School/College Name:</label>
        <input type="text" id="school" name="school" required />

        <label for="qualification">Qualification:</label>
        <select id="qualification" name="qualification" required>
          <option value="Not Selected">Select Qualification</option>
          <option value="highschool">High School</option>
          <option value="intermediate">Intermediate</option>
          <option value="bachelor">Bachelor's Degree</option>
          <option value="master">Master's Degree</option>
        </select>

        <label for="marks">Marks (%):</label>
        <input type="number" id="marks" name="marks" step="1" required />

        <label for="exam-center">Preferred Exam Center:</label>
        <select id="exam-center" name="exam-center" required>
          <option value="Not Selected">Select Exam Center</option>
          <option value="newyork">New York</option>
          <option value="losangeles">Los Angeles</option>
          <option value="chicago">Chicago</option>
          <option value="houston">Houston</option>
        </select>
      </fieldset>

      <!-- Document Uploads -->
      <!-- <fieldset>
          <legend>Document Uploads</legend>
          <label for="marksheet">Upload Marksheet:</label>
          <input type="file" id="marksheet" name="marksheet" accept=".pdf,.doc,.docx" required />

          <label for="id-proof">Upload ID Proof:</label>
          <input type="file" id="id-proof" name="id-proof" accept=".pdf,.jpg,.jpeg,.png" required />
        </fieldset> -->

      <!-- Additional Information -->
      <fieldset>
        <legend>Additional Information</legend>
        <label for="special-req">Special Requirements (if any):</label>
        <textarea id="special-req" name="special-req" rows="4"></textarea>

        <label for="agree">
          <input type="checkbox" id="agree" name="agree" required />
          I agree to the terms and conditions.
        </label>
      </fieldset>

      <button type="submit" name="register">Submit Registration</button>
    </form>
  </div>
</body>

</html>

<?php
if (isset($_POST['register'])) {
  // Get input data directly from POST
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Retain email sanitization
  $phone = $_POST['phone'];
  $permanent_address = $_POST['permanent-address'];
  $correspondence_address = $_POST['correspondence-address'];
  $school = $_POST['school'];
  $qualification = $_POST['qualification'];
  $marks = (float)$_POST['marks']; // Ensure it's a number
  $exam_center = $_POST['exam-center'];
  $special_req = $_POST['special-req'];

  // Prepare the SQL statement
  $query = "INSERT INTO form VALUES ('$name', '$dob', '$gender', '$email', '$phone', '$permanent_address', '$correspondence_address', '$school', '$qualification', '$marks', '$exam_center', '$special_req')";

  // Execute the query
  $data = mysqli_query($conn, $query);

  // Check for successful insertion
  if ($data) {
    // echo "Data inserted into database";
  } else {
    echo "Data insertion failed: " . mysqli_error($conn); // Provide detailed error
  }
}
?>