yo-php
======

Send Yos from your PHP app with 2 lines of code.

## New in Version 0.2

Send links with your Yos.

When you send a link along with your Yo and the user taps on it, it'll open a browser to your link instead of opening the Yo app.

## Examples

```php
<?php

// Add file
require('yo.php');

// Get an API Key at dev.justyo.co
$apiKey = 'YOUR_API_KEY';

// Instanciate
$yo = new Yo($apiKey);

// Send a Yo to all your subscribers
$yo->all();

// Send a Yo with a link to all your subscribers
$link = 'http://www.mysuperawesomewebpage.com/';
$yo->all($link);

// Send a Yo to one user
$yo->user('USERNAME');

// Send a Yo with a link to one user
$link = 'http://www.mysuperawesomewebpage.com/user/USERNAME/';
$yo->user('USERNAME', $link);

// Get number of subscribers
$count = $yo->subscribers(); // returns an int or false
?>
```
