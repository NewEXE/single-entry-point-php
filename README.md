# Single Entry Point (Front controller realization)
PHP app carcase with all requests redirection to one single `index.php`.

Implemented with Apache and PHP. Will free to send PR's for support other servers (nginx, IIS).

## Requirements
* PHP version >= 5.6
* Apache 2.4

## Installation
Clone repository and run
```
composer install
```
## How it works
### Web requests
All user's requests to application was redirected to `public` directory.

All other folders are inaccessible. So user can get access to all files in `public` folder (except `.htaccess`), but no others.

If filename was specified (like `robots.txt`, `favicon.ico`), request was gone to this file. Otherwise, to `index.php`.

`index.php` is very simple "[Front controller pattern](https://en.wikipedia.org/wiki/Front_controller)" realization.

Depends on typed URI, front controller decide which PHP file need to include.

### Console requests
Execute any script from `src/console/scripts` directory via running it from front controller file `public/index.php`.

Request was redirected to `src/console/index-console.php` file, then needed script was required.

Example: for execute file `src/console/scripts/example.php`:
```
php public/index.php example.php
```
First param (`example.php`) is path to script file.