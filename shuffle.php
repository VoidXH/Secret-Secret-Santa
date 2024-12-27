<?php
require '_config.php';
$names = file('names.txt', FILE_IGNORE_NEW_LINES);

if (isset($_POST['word'])) {
  $input_word = $_POST['word'];
  if (in_array($input_word, $words)) {
    require '_shuffle.php';
    $shuffled_names = shuffleNames($names, date('Y'));
    $word_index = array_search($input_word, $words);
    $corresponding_name = $shuffled_names[$word_index];
    $message = "<div class='alert alert-success'>Who you have to gift: $corresponding_name</div>";
  } else {
    $message = "<div class='alert alert-danger'>You might have mistyped something, secret words are case-sensitive. If you lost your secret word, contact the host!</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Secret Santa drawing</title>
    <link rel="stylesheet" href="<?=$bootstrapPath ?>">
</head>
<body>
<div class="container">
    <?php if (isset($message)) echo $message; ?>
    <h3 class="mt-5">Enter your secret word to see who you've drawn.</h3>
    <form method="POST" class="mt-3">
        <div class="form-group">
            <label for="word">Secret word:</label>
            <input type="text" class="form-control" id="word" name="word" required>
        </div>
        <button type="submit" class="btn btn-primary">Show me</button>
    </form>
</div>
</body>
</html>
