<!-- <!DOCTYPE html>
  <html>
  <head>
  <title>Class Registration</title>
  <style>
    body{
      background-image: url("https://www.shutterstock.com/image-photo/businesswomans-hand-filing-online-registration-600nw-2009313029.jpg");
      background-size: cover;
    }
  </head>
   <body>
      <h1>Class Registration Form</h1>
      <form action="" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required><br>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required><br>

      <label for="class">Class:</label>
      <input type="text" name="class" id="class" required><br>

      <label for="gender">Gender:</label><br>
      <input type="radio" name="gender" id="male" value="male">
      <label for="male">Male</label>

      <input type="radio" name="gender" id="female" value="female">
      <label for="female">Female</label><br>

      <label for="subject">Select Subject:</label>
       <select name="subject" id="subject">
         <option value="">Select subject</option>
         <option value="math">Mathematics</option>
         <option value="science">Python</option>
         <option value="english">SE</option>
         <option value="history">CNS</option>
       </select><br>

      <label for="agree">
        <input type="checkbox" name="agree" id="agree" required>
             I agree to the terms and conditions which is given.
      </label><br>

      <input type="submit" name="submit" value="Register">
   </form>

 </body>
</html> -->


<!DOCTYPE html>
  <html lang="en">
  <head>
  <title>registration form</title>
  <style>
     * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
     }

    .main {
       width: 100vw;
       height: 100vh;
       background: linear-gradient(to top, rgba(0, 0, 0, 0.2)50%, rgba(0, 0, 0,0.2)50%), url("https://i.pinimg.com/originals/67/18/22/671822c2f63dd5f65d8fd15c9710420b.jpg");
       background-size: cover;
       background-position: center;
      }
/* .navbar {
width: 100%;
height: 70px;
margin: auto;
background: rgba(94, 164, 178, 0.7);
background-size: cover;
} */
     .logo {
         color: rgb(192, 212, 218);
         font-size: 35px;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         float: left;
         padding-left: 30px;
         padding-top: 10px;
         letter-spacing: 10px;
      }

    .form {
       width: 290px;
       top: ;    
       height: 340px;
       background: black;
       margin: 50px auto;
       border-radius: 20px;
       color: #fff;
       padding: 25px;
     }
    .form>h2 {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
      color: white;
      font-size: 22px;
      width: 220px;
      background-color: skyblue;
      padding: 8px;
      margin: auto;
      border-radius: 50px;
     }

    .logbtn {
      width: 240px;
      height: 40px;
      border: 1px solid black;
      margin-top: 30px;
      border-radius: 50px;
      background: skyblue;
      cursor: pointer;
      transition: 0.3 ease-in-out;
      font-size: 20px;
      color: aliceblue;
    }

  .logbtn:hover {
       background-color: white;
      }
   </style>
   </head> 
    <body>
       <div class="main">
<!-- JAY SHREE RAM -->
         <div class="navbar">
<!-- <h2 class="logo">WD (EX-10)</h2> -->
      </div>
        <div class="content">
          <div class="form">
            <h2>Register Here</h2>
              <form method="post">
                <div class="in" style="margin-top:30px ;">
                  Name:&nbsp;<input type="text" placeholder="Enter Your Name"><br>
                  Email :<input type="email" placeholder="Enter Your Email-Id"><br>
                  Class : <input type="text" placeholder="Enter Your Class Here"><br>
                </div>

              <label for="gender">Gender:</label>
              <input type="radio" name="gender" id="male" value="male">
              <label for="male">Male</label>
              <input type="radio" name="gender" id="female" value="female">
              <label for="female">Female</label>
              <select name="Person" id="Person" style="margin-top:20px ;">
              <option value="non">Choose Subject</option>
              <option value="WebDevelopment">WebDevelopment</option>
              <option value="Python">Python</option>
              <option value="RDBMS">RDBMS</option>
            </select>
              <div style="margin-top: 10px;">
              <input type="checkbox">Agree Terms and Conditions
          </div>
          <button class="logbtn" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
 </body>
</html>