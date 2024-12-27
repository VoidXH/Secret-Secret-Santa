<?php
if (time() >= strtotime($switchDate)) {
  header("Location: shuffle.php");
  exit();
}

$filename = 'names.txt';
require '_config.php';

function addNameToFile($filename, $name) {
  $file = fopen($filename, "a");
  fwrite($file, $name . PHP_EOL);
  fclose($file);
}

$message = "";
$names = file($filename, FILE_IGNORE_NEW_LINES);

if (isset($_POST['name'])) {
  $name = htmlspecialchars(trim($_POST['name']));
  if (in_array($name, $names)) {
    $message = "You are already in the hat, $name. In case you've forgotten your secret word, contact the host!";
  } else {
    addNameToFile($filename, $name);
    $index = count($names);
    array_push($names, $name);
    if ($index > count($words)) {
        $message = "There's so many of you there aren't enough secret words! Ask the host to add more!";
    } else {
        $word = $words[$index];
        $message = "Thank you, $name, for registering, <b>BUT!</b> Remember this secret word, because when the drawing happens, this will tell you who you've drawn: <b>$word</b>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Secret Santa registration</title>
    <link rel="stylesheet" href="<?=$bootstrapPath ?>">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php if (!empty($message)): ?>
                <div class="alert alert-info"><?=$message ?></div>
            <?php else: ?>
                <h2 class="text-center">Register for a Secret Secret Santa drawing</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="name">Your name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            <?php endif; ?>

            <?php if ($hiddenNames): ?>
                <h4 class="mt-4">Currently in the hat: <?=count($names) ?> people</h4>
            <?php elseif (!empty($names)): ?>
                <h4 class="mt-4">Currently in the hat:</h4>
                <ul class="list-group">
                    <?php foreach ($names as $index => $name): ?>
                        <li class="list-group-item">
                            <?=$name ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
