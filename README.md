# Secret Secret Santa
Most online Secret Santa software only works locally or with e-mail addresses.
This one **allows everyone to add their names from their own device** for a long
period, after which everyone can individually check who they've drawn by **using
a secret word** which the program gives for every registration.

## Installation
Open `_config.txt` in any text editor, and edit the values of the configuration
variables to your liking:

* **$hiddenNames**: `true` if you want to hide the names of people in the hat,
  `false` otherwise
* **$switchDate**: the date when the names of who people have drawn becomes
  available, in YYYY-MM-DD format
* **$bootstrapPath**: for the page to look good (not mandatory), download
  Bootstrap and place its CSS somewhere on the server, and enter its relative
  path here
* **$words**: secret words the players can get when they register

After you saved the configuration, just copy all files to any webserver that
supports PHP. Many free PHP hosts are present on the internet.

## When someone forgot their secret word
You have to open two things: your configuration file, and `names.txt` on the web
server. For each name, the secret word is at the same place, in the same order.
For example, if the name of the person who forgot their word is at the third
line in `names.txt`, they will need the third secret word. You don't have to
download `names.txt`, just simply go to `<your website>/names.txt` in a browser.
