<!DOCTYPE html>
  <html >
  <head>
    <title>Experiment No 8</title>
  </head>
  <body align="center">
    <h1>Text Counter</h1>
      <form action="#" method="POST">
        <label for="field">Enter Text</label>
          <div>
            <textarea id="field" name="txt" rows="5" cols="40" placeholder="Press Enter For Next Line"></textarea>
          </div>

          <div>
            <input type="submit" name="sub">
          </div>
      </form>

   <?php
      if (isset($_POST["sub"])) {
      $text = $_POST["txt"];
      $words = str_word_count($text);
      $line = explode("\n", $text);
      $char = strlen($text);
      $count = count($line);
      $output = "Number Of Lines: {$count} \n Number Of Words:{$words}\n
      Number Of Chars:{$char}";
    }
   ?>
   <script>
     let output = <?php echo json_encode($output); ?>;
     alert(output);
   </script>
  </body>
</html>