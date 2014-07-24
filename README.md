yo-php
======

Send Yos from your PHP app with 2 lines of code.

## Example

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

// Send a Yo to one user
$yo->user('USERNAME');

?>
```
