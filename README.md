SQLiteErrorLog
===

This is a simple http error logger written in PHP and used to log errors in a text file to be tracked by an administrator to see if he can resolve errors that ocured.

Currently this is in bare beta! And I do not recomend anybody to use this.

Installation
===

Copy the files into your 'error' directory for example /error/*

Create a copy of 'config.example.php' called 'config.php' I guess it is pretty self explanatory.

Now you have to add some lines to the .htaccess file. The simplest is to use the generator included in the script.

Simply go to http://YOURDOMAIN.TLD/error/index.php?htaccess=%ADD_THE_LOCATION% te parameter %ADD_THE_LOCATION% should probably look something like this: /error/ If you visit that site, you will get the lienes to add to your .htaccess manually.

The following folder has to be writable by the http-server running user (probably chmod 755 or 775).

* /data/

Roadmap
===

## Planed
* Admin Interface (Log analyzer)

## v0.1.1-beta 2013-01-06
* Updated the README.md with the roadmap and 

## v0.1-beta 2013-01-06
Basic functionality so far included

* Log calls to text file
* Show error message

Inspired by
===
Mostly inspired by [Dynamic Error Logging by Jeff Starr @ Perishable Press](http://perishablepress.com/ajax-error-log/). I wrote it completely from scratch though. My version is not using MySQl to log the entries but does all the tracking in a text file (a little faster) and SQLiteErrorLog does not only log 404 errors but a varity more.

License
===

Have a look at the 'LICENSE' file you will probably be happy with the chosen license.