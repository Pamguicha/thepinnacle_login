<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Here</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nunito:wght@300;600;800;1000&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Homepage</title>
</head>

<body>

  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>
  <h1 class="title-order"> Order Your Beers Here</h1>

  <form>
    <label class="orderInputLabel" for="name">Name
      <input class="orderInputClass" type="text" name="name">
    </label>
    <br>
    <label class="orderInputLabel" for="surname">Surname
      <input class="orderInputClass" type="text" name="surname">
    </label>
    <br>
    <label class="orderInputLabel" for="beerstype">Beers type
      <input class="orderInputClass" type="text" name="beerstype">
    </label>

  </form>


  <?php
  include 'footer.php';
  ?>
</body>

</html>