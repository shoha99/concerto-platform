# We strongly encourage you to test Concerto using our FREE Concerto hosting before you attempt to install it on your own machine #

To get your FREE account go to: http://www.psychometrics.cam.ac.uk/page/386/options.htm


# Installation of Concerto v3.x #

## Requirements ##

  * **PHP** >= v5.3 (http://php.net/)
  * **MySQL** >= v5 (http://www.mysql.com/)
  * **R** >= v2.12 (http://cran.r-project.org/)
  * **PHP** 'short open tags' must be turned **ON**
  * **PHP** 'safe mode' must be turned **OFF**
  * R packages: **session**, **RMySQL**, **catR** must be installed as a root user in the main R library directory ( by default it's located in the **<R installation directory>/library** )


## Open Source Elements ##

  * jQuery (js) (http://jquery.com/)
  * jQuery UI (js) (http://jqueryui.com/)
  * CodeMirror (js) (http://codemirror.net/)
  * jQuery.loadmask (js) (http://code.google.com/p/jquery-loadmask/)
  * Kendo UI (js) (http://www.kendoui.com/)
  * jQuery.JSON (js) (http://code.google.com/p/jquery-json/)
  * CKEditor (js,php) (http://ckeditor.com/)
  * jQuery.fileupload (js,php) (http://blueimp.github.com/jQuery-File-Upload/)
  * jQuery.jfeed (js) (http://blueimp.github.com/jQuery-File-Upload/)
  * simple\_html\_dom (php) (http://simplehtmldom.sourceforge.net/)

## step by step installation process ##

### Step 1 ###
Check if you meet all the requirements above

### Step 2 ###
Download source package of Concerto

### Step 3 ###
Extract source somewhere in your server web documents directory

### Step 4 ###
Edit **/SETTINGS.php** and enter all your server settings ( MySQL host, MySQL port, MySQL database name, MySQL user login, MySQL user password, full URL of your Concerto installation, Rscript executable path ( **Windows users** must also enter MySQL home directory path ), and timezone

### Step 5 ###
Save **/SETTINGS.php** file

### Step 6 ###
Run **/setup** - if this is the first time you run the application it will create the whole database structure

### Step 7 ###
Follow the instruction on **/setup** page, if no problems are encountered you can click on the link at the bottom of the page to start using your Concerto installation, if you encounter some problems use the recommendation on screen to fix them.