Twitter Stats tracker
=====================

Tracks twitter handles for basic statistics (follower count etc.)

DEPLOY
------

1. Clone

2. Install composer (example for global install)
```
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer
$ sudo chmod a+x /usr/local/bin/composer
```

3. Run composer
```
$ composer install
```

4. Create settings file
```
$ cp settings.php.dist settings.php
```

5. Configure *settings.php* file

USE
---

Run with
```
$ php console.php
```

This writes CSV data in the *data/* folder.
