# MiData Address-Reporter

### Pre-Requirements
PHP mindestens in der Version 7.1.3 
https://www.php.net/downloads.php

composer
https://getcomposer.org/

Apache / Nginx
http://httpd.apache.org/download.cgi
https://www.nginx.com/

SQLite 3
https://www.sqlite.org/download.html

### Setup-Guide

```
git clone https://github.com/Vento-Nuenenen/address-tool
```

```
composer install
```

```
cp .env.example .env
```

```
php artisan migrate
```

```
php artisan key:generate
```

```
nano .env
```

```
APP_NAME=Address-Tool
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://address.vento.beer

LOG_CHANNEL=stack

DB_CONNECTION=sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.eu.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=lulu@pbs.ch
MAIL_PASSWORD=dfkanflknvngoifdhnbvasnd
MAIL_ENCRYPTION=

GROUP_URL_START='https://pbs.puzzle.ch/de/groups/'
GROUP_URL_END='.json?token=ödgjdfijgkfglkndfdlkgvn'
PERSON_URL='https://pbs.puzzle.ch/de/people/'

HITOBITO_BASE_URL='https://pbs.puzzle.ch'
HITOBITO_CLIENT_UID=adnvlkndblknadfdlbnalkfdn
HITOBITO_CLIENT_SECRET=vvkösdnblknafdlkbnalkfnlkanf
HITOBITO_CALLBACK_URI='https://address.vento.beer/login/hitobito/callback'
```

Nur wenn etwas am JS oder SCSS geändert wurde:
```
yarn && yarn production
```
