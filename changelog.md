# CHANGELOG #

## v4.0.0.beta8 ##

**Fixes**

  * minor fixes (prevents some PHP warnings)


---


## v4.0.0.beta7 ##

**Fixes**

  * fixed test type field in test form
  * fixed table imports with no data
  * fixed multiple URL paramaters


---


## v4.0.0.beta6 ##

**Fixes**

  * fixed the format of variables passed through URL (they are now properly decoded)
  * variable value length limit in debug mode added
  * test with ongoing sessions removal fix
  * updated to jQuery v1.10.2 and jQuery UI v1.10.3
  * favourite functions adding fix


---


## v4.0.0.beta5 ##

**Fixes**

  * fixed **`concerto.test.run`** function when no params specified
  * fixed accessing **`test`** global javascript variable in debug mode
  * default template transition effects are now properly used when no transition specified in **`concerto.template.show`** function
  * added japanese language


---


## v4.0.0.beta4 ##

**Features**

  * Updated to Kendo UI Q1 2013 SP
  * from now on, in the panel, if the table contains more than 20 columns then it will only show the first 20 columns and hide the rest (user can show them manually)
  * added option to set **`TIME_LEFT`** format by setting javascript **`test.timeFormat`** variable, default is: **`HH:mm:ss`**
  * changed current tests **`open`** property to **`type`** (subtest, regular, featured) property

**Fixes**

  * fixed no test output situations
  * replaced Ubuntu specific commands with general Linux commands
  * minor fixes

**Performance**

  * wide tables performance in panel improved
  * password hashing speeds improved when logging in


---


## v4.0.0.beta3 ##

**Compatibility notes**

  * **`www-data ALL=(%concerto) NOPASSWD: /bin/kill`** needs to be added to **`visudo`**, please check installation guide for complete guide of visudo configuration

**Fixes**

  * fixed data column type select display in advanced and simple view in IE
  * fixed problem with debugging session with objects which can't be converted to string
  * **`concerto.test.run`** now accepts properly test name as **`testID`** argument
  * improved R process termination mechanism
  * improved finished R session leftovers cleaning
  * fixed exporting table to CSV
  * improved socket server launching and instance detection mechanism
  * **`session timed out`** message will appear when test session idle timeout reached and **`onUnserialize`** function is not overriden
  * fixed not recognised error sessions in some rare cases
  * user is no longer redirected to **`users`** tab when changing workspace
  * other minor fixes


---


## v4.0.0.beta2 ##

**Features**

  * **`concerto$mediaURL`** variable is now available in test logic
  * object names needs to be unique in every workspace
  * most of the functions in **`concerto`** R package now accepts object name as argument
  * template transition effects can now be set dynamically from test logic
  * template loader and it's transition effects can now be set dynamically from test logic
  * it is now possible to directly enter template HTML and head tag for HTML templates and template loaders

**Fixes**

  * increased R documentation columns size
  * fixed **media** directory permissions
  * setting table cell value of any of HTML types in source mode
  * added **`config.autoParagraph = false;`** to CKEditor configuration - this will prevent from adding **`<p>`** tag when entering simple text
  * turned off code mirror auto-formating


---


## v4.0.0.beta1 ##

**Compatibility notes**

  * This version is not compatible with any other previous version.

**The new version includes, but is not limited to, the changes below:**

**Features**

  * completely new test tab
  * completely new debug mode
  * line by line debugging (highlights line that is currently being debugged)
  * debug session state updated after each line
  * debug output updated after each line
  * additional code in-line widgets for output printing
  * code auto-completion
  * function documentation built into auto-completion suggestions
  * R function insertion wizard
  * code selection auto-format option
  * full screen code editor mode
  * it's now possible to write the entire test logic using only R code
  * new built-in Concerto R functions and variables structure
  * CKEditor updated to v4
  * it's now possible to insert R session variables into HTML template HEAD tag code
  * rewritten table manipulations (INSERT, UPDATE, DELETE) which are now done incrementally
  * every table is exact representation of what's in MySQL database (any changes made directly through MySQL will be represented correctly by Concerto)
  * introduced user workspaces (separate MySQL DB for Concerto objects)
  * workspaces can be shared by users
  * updated jQuery to v1.9.1 and jQuery UI to v1.10.1
  * new test session serialization and unserialization mechanism where user can, and is encouraged to, handle onSerialize and onUnserialize events
  * Concerto built in R functions are now in R package with full documentation
  * introduced function toolbar with favourite functions and internal Concerto functions
  * added extended function wizard for concerto.table.query ( MySQL database query function )
  * every test has it's own error logging mechanism ( javascript errors and R errors ) with logs available from inside the panel

**Security**

  * every Concerto user has corresponding Linux user which defines his privileges in R session
  * every Concerto user can operate only on his own workspaces (MySQL DBs) and workspaces to which he has access granted by the owner
  * every Concerto user has corresponding MySQL user which defines his privileges in R session

**Fixes**

  * numerous test server fixes and improvements
  * numerous table manipulation fixes and improvements

**Performance**

  * Concerto panel is overall more lightweight now
  * table manipulation performance greatly improved


---


## v3 changelog can be found in SVN repository source changes history ##


---


## v2.0.5 ##
  * added missing language definition
  * minor fixes

## v2.0.4 ##
  * added chinese translation
  * added bulgarian translation
  * fixed text area in item template
  * added language 'selectmenu'
  * added new users greeting functionality
  * UI tweaks
  * language/naming corrections

## v2.0.3 ##
  * minor bug fixes
  * Administrator Panel design changed
  * it is now possible to have multiple item templates with the same name

## v2.0.2 ##
  * changed built-in R function **set.next.item(item\_name)** to **set.next.template(template\_id)**
  * session variables are now inserted into HTML recurrently
  * Administrator Panel design changed
  * Added unique fields in forms in the administrator panel
  * from now on, future updates (including this one) will be handled by patches (no need to download the whole source again)
  * minor bug fixes
  * improved performance
  * location of the setup page is now **/setup** -  delete this directory after the installation
  * added **run** button to the administration panel

## v2.0.1 ##
  * new version check fix