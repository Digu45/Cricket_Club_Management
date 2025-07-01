<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  </head>
    <style>
      .st {
        width: 150px;
        height: 30px;
        border-radius: 20px;
        font-size: 15px;
        color: white;
        background-color: skyblue;
      }

     .cp {
        font-size: 17px;
        color:gray;
        font-family: Georgia, 'Times New Roman', Times, serif;
       }

   </style>
    <body align="center">
      <h1>Capital Selector</h1>
        <form action="#" method="post">
          <select name="select" class="st">
            <option value="None">Select Country</option>
            <option value="India">India</option>
            <option value="Italy">Italy</option>
            <option value="China">China</option>
            <option value="America">America</option>
            <option value="Nepal">Nepal</option>
            <option value="France">France</option>
            
          </select> <br>

         <input type="submit" name="sub">
       </form>

   <?php
      if (isset($_POST['sub'])) {
      $countries = array(
      "India" => "New Delhi",
      "Italy" => "Rome",
      "China"=> "Beijing",
      "America"=> "Washington D.C",
      "Nepal"=> "Kathmandu",
      "France" => "Paris");
      $Country = $_POST['select'];
      $Capital = $countries[$Country];
      echo "<div class='cp'>";
      echo "<br>Capital of $Country: $Capital";
      echo "</div>";
    }
   ?>
 </body>
</html>
