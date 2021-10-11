## Single Entry Point (Front controller realization)
PHP app carcase with all requests redirection to one single `index.php`.

Implemented with Apache and PHP. Will free to send PR's for support other servers (nginx, IIS).

### Requirements
* PHP version >= 7.4
* Apache 2.4

### How it works
All user's requests to application was redirected to `public` directory.

All other folders are inaccessible. So user can get access to all files in `public` folder (except `.htaccess`), but no others.

If filename was specified (like `robots.txt`, `favicon.ico`), request was gone to this file. Otherwise, to `index.php`.

`index.php` is very simple "[Front controller pattern](https://en.wikipedia.org/wiki/Front_controller)" realization.

Depends on typed URI, front controller decide which PHP file need to include.
