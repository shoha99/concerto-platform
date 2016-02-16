# USER'S MANUAL #

**We suggest that you start with a [Step-by-Step tutorial](http://code.google.com/p/concerto-platform/wiki/tutorial). Also, please let us know if something sounds unclear to you!**

**This document is relevant to Concerto 2.0.2 and higher. If you have older version installed, upgrade it (recommended).**

# Concept #
The idea behind Concerto is to deliver a simple yet powerful tool for the development of an adaptive on-line test.
The platform relies on three main elements:
  1. **HTML presentation layer**
  1. **R scripting logic**
  1. **SQL database backbone**

We rely as much as possible on popular open source packages in order to maximize the safety and reliability of the system, and to ensure that its elements are kept up-to-date.

# Tips #
You can get help and tips related to particular objects by hovering your mouse pointer over the question mark icon: ![http://cambridgepsychometrics.com/~michal/concerto/question.png](http://cambridgepsychometrics.com/~michal/concerto/question.png)

# Administrator Panel #

Administration Panel can be found here: **Concert\_installation\_path/admin**. For instance:
```
http://dev.myiqtest.org/concerto/admin/
```

Administration Panel allows you to:
  * create or edit tests and HTML templates
  * create user accounts
  * set the access rights
  * Use R studio

### Multi-language support ###
The Administration Panel has multi-language support. You can find the list of currently supported languages at the [project's page](http://code.google.com/p/concerto-platform/). Let us know if you want to contribute and provide us with a translation to another language!

The default language is English. To use another supported language, e.g. Polish, set the  **lng** option in the URL, e.g. **/admin/?lng=pl**. This will (PL stands for Polish here).

## Elements of the administration Panel ##

There are several sections in the Administration Panel.

## Header ##

![http://cambridgepsychometrics.com/~michal/concerto/header.jpg](http://cambridgepsychometrics.com/~michal/concerto/header.jpg)

Buttons on the left allow you to quickly navigate to:
  * **Concerto Platform homepage on code.google.com** where you can find  support, report an issue with the application, download the latest version or just browse through the source code.
  * **Concerto Platform Google Group** where you can subscribe to receive the latest news about **Concerto** development and our future plans.

The central area of the header contains the version of Concerto. Below you can find the link to newer version of the system if available.

On the right side you'll find your login details and a log out button.

## Items tab ##

Items Tab is the heart of Concerto. Here you can create/edit/debug HTML templates and R syntax.

![http://cambridgepsychometrics.com/~michal/concerto/create_item.png](http://cambridgepsychometrics.com/~michal/concerto/create_item.png)

### List of item templates ###

![http://cambridgepsychometrics.com/~michal/concerto/item_list.jpg](http://cambridgepsychometrics.com/~michal/concerto/item_list.jpg)

This list contains your HTML templates (and templates created by others bt shared with you). It has 5 columns:
  1. **ID** - the HTML template's unique system id. This ID is used in the set.next.template(template\_id) function used to switch HTML templates.
  1. **name** - the HTML template's name typed by the user.
  1. **owner** - the person that created the HTML template and has full rights to modify it.
  1. **sharing** - the sharing level of the specific HTML template.
  1. **actions** - drop-down list that contains possible actions related to the HTML template

The list can be sorted by clicking on the column header. Use a search box to search for a specific HTML template. The list is paginated, and you can select how many templates should be displayed per page and which page you want to see.

### Actions ###

![http://cambridgepsychometrics.com/~michal/concerto/choose_action.png](http://cambridgepsychometrics.com/~michal/concerto/choose_action.png)

Clicking on the choose action drop-down button shows a list of possible actions:

![http://cambridgepsychometrics.com/~michal/concerto/actions.png](http://cambridgepsychometrics.com/~michal/concerto/actions.png)

Available actions include:
  * **Run** -  start the test using given HTML template. Note that most of the test will not run if you start in the middle!
  * **Debug**  -  start the test in a **debug** mode using given HTML template
  * **edit** - open the template for editing
  * **delete** - delete template

### HTML layer tab ###

![http://cambridgepsychometrics.com/~michal/concerto/item_editor.jpg](http://cambridgepsychometrics.com/~michal/concerto/item_editor.jpg)

We can divide this section into three parts:
  1. the Duplicate HTML Template panel allows us to import the HTML layer from another template. Simply select the "source" template from the list and click the **import HTML** button.
  1. the HTML WYSIWYG editor (open-source **CKEditor**) in the middle - use it to design the HTML Template's)
  1. HTML Template properties, containing:
    * **name** - choose a name for an template(this field is obligatory)
    * **hash** generated by the platform after template is saved for the first time. It is used to set the starting HTML template when running the test.
    * **sharing**- access level of the current HTML template.
    * **default button** - select the button (actually, the R script behind it) that is going to be executed if the time runs out and user has not clicked any button
      * **timer** sets the maximum time allowed to answer the question in this HTML template. When time runs out, the platform executes the R script assigned to "default button". Note that you can modify this value using R syntax, too.

**The HTML WYSIWYG editor allows you to insert any HTML/CSS/JS code.
Important elements include:**
  1. **HTML buttons and image buttons** - HTML buttons can have assigned **R code to execute**. Whenever the user clicks on the button, the assigned code is executed.
  1. **Other standard HTML controls** including text fields, text areas, radio buttons, check boxes, drop-down lists, etc. can be used to interact with the user. When the item is submitted, all user entered values will be stored as session variables and sent to R. You can then use them to customize any following items and/or in R scripts/calculations.
  1. **session variable inserts** - You can insert any session variable anywhere in the HTML layer by defining a piece to be inserted using  double brackets and the name of the session variable (e.g. **{{variable\_name}}**). This allows you to control the HTML layer from R or any other external application by simply adding an entry to the session variable tables.
  1. **standard HTML/CSS/JS** code: text, videos, sounds, images, etc.

### R Interaction tab ###
![http://cambridgepsychometrics.com/~michal/concerto/r_interaction.png](http://cambridgepsychometrics.com/~michal/concerto/r_interaction.png)

This section contains a list of the HTML buttons that were declared (added) to the HTML presentation layer. You can use **R code to execute** to assign R syntax that will be executed once the button is pressed by the user (or if time runs out in the case of buttons set as default).

There are two "hint" boxes in this section. You can resize/move/close these boxes at any time.
  1. **Concerto built in R functions documentation** - list of Concerto functions that you can use anywhere in the R syntax.
  1. **item's session variables** that contains:
    * **sent session variables** (the list of variables acquired from the current HTML Template after it is submitted),
    * **inserted session variables** (the list of inserted variables for a given template that can be sent from R or another application. Concerto looks for these variables in the Sessions table)

# Custom R functions in Concerto #

There are two custom R functions available in Concerto

## set.var(var\_name,var\_value) ##

This function sets session variable which can be used in HTML presentation by inserting {{var\_name}} string into the HTML Layer. For instance you can set session variable "greeting" to value "hello":
```
set.var("greeting","hello!")
```
and use this variable on the HTML templates by inserting string in the HTML editor:

http://cambridgepsychometrics.com/~michal/concerto/greeting.PNG

Obviously, this function should be used to fill HTML templates with content, e.g. text, pictures, sounds, etc. For instance, click the
http://cambridgepsychometrics.com/~michal/concerto/img.PNG icon in the HTML layer editor, and insert string {{image\_source}} in the "URL" field:

http://cambridgepsychometrics.com/~michal/concerto/image_source.PNG

Later you can use set.var() function to set this image from the R script level, e.g.:

http://cambridgepsychometrics.com/~michal/concerto/r_image.PNG

## set.next.template(next\_HTML\_template\_id) ##

This function sets which HTML template should be load next when the R calculations are finished. You should use the id assigned to a given html template that you can find on the html template list on the right.

For instance, if you want to set next template to demo1 (of id: 7):

![http://cambridgepsychometrics.com/~michal/concerto/id.png](http://cambridgepsychometrics.com/~michal/concerto/id.png)

use this R code:

```
set.next.template(7)
```

# Running tests #

## Standard mode ##

To start the test in standard mode, use the following URL:
```
Concerto_installation_path/index.php?hash=[html_template_hash] 
```

You can get the template's hash from the html template's list. Here is an example of the URL:
```
http://dev.myiqtest.org/concerto2/index.php?hash=ab0334826613005bfcf26d52392b7ced
```

## Debug mode ##
http://cambridgepsychometrics.com/~michal/concerto/debug.PNG

To start the test in **debug mode** select the **Debug** button from the HTML Template's List. Alternatively, if you are an administrator you can enter debug mode by passing the **debug** option through the URL, e.g.
```
Concerto_installation_path/index.php?hash=5da7d117adfd5632b8e8aa661426879f&debug
```
**You must be logged in to the Administration Panel to do so.**

You will see a screen divided into two sections:
  1. LEFT: The log of whatever is happening behind the scenes, including:
    1. R code executed
    1. R errors
  1. RIGHT: HTML template that would be visible during normal test execution

Additionally, you can use the buttons at the top of the page to see the list of:
  1. current **session variables**
  1. variables sent to R (**R variables**)

# Setting Session Variables using URL #

Concerto allows for defining Session Variables using URL. For instance, you can use the following code to preset user\_name parameter to a given value, e.g. "Michal".
```
Concerto_installation_path/index.php?hash=5da7d117adfd5632b8e8aa661426879f&user_name=Michal
```

## "RStudio" tab ##
http://cambridgepsychometrics.com/~michal/concerto/r_studio.PNG

If you have **RStudio** installed on your server you can integrate it with the **Concerto Platform**. It's optional, and you can always switch it on or off using the **setup page** mentioned earlier.

Use your system account (unix/linux) to log-in to R studio.

RStudio can be useful to:
  * develop and test R code.
  * analyse the results/item banks/etc. directly on the server.
  * manage the files on the server (it has a convenient file manager).

## "Users" tab ##
http://cambridgepsychometrics.com/~michal/concerto/users.PNG

This tab is only accessible for **super admin** users. It allows him/her to add/remove/edit users and user groups, and to define access rights.

You can set the user's login, password, first name, last name, email, phone no., and a user group.

### User groups ###

You can use the "sharing" option to assign an HTML template to one of three groups:
  1. public (all administrators can see/edit it)
  1. private (only you can see/edit it)
  1. group (only members of your group can see/edit it)

Super Admins can add/edit groups and assign users to groups in the "Users Tab".



# Interaction MySQL #

Note that you can access MySQL server from the R syntax level using pre-installed RMySQL library or any other library that you have installed on your server. This allows you to create and access custom tables (e.g. user scores table, item bank table).

We also suggest PhPMyAdmin for easy management of the MySQL server.

# mainmethods.r #

Starting parameters of R (including default functions and libraries) are stored in the file: ../R/library/

# Using JavaScript #

It is possible to use JavaScript in the HTML. When editing the HMTL layer, you can insert JavaScript snippets in the HTML code. Here is an example that imitates the built in timer:

```
<p>
	After three seconds the variable &quot;Var1&quot; will be set to &quot;yuppie&quot;. Or if you click the button. Really the button is clicked for you after 3 seconds. Formally there is a HTML form called &quot;yabba&quot; with the button &quot;next&quot;. The JavaScript function &quot;setTimeout&quot; is used. Note that in contrast to the built in timer, the time could now be a variable. <SCRIPT LANGUAGE="JavaScript"><!--
setTimeout('document.yabba.next.click()',3000);
//--></SCRIPT></p>
<form id="form1" method="post" name="yabba">
	<p>
		<input name="next" type="button" value="Change to yuppie" /></p>
</form>
<p>
	<input name="next2" type="button" value="Change to yippie" /></p>
<p>
	{{Var1}}</p>
```


# To be added here soon #

  * saving and loading files
  * list of special variables always available in R:
    * SessionID <- '262'
    * temp\_path
    * hash <- '004d269f4604dbc8058ae8384e6a239c'
    * IP <- '131.111.185.81'
    * browser <- 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1'
    * template\_id <- '20'
    * button\_name <- 'submit'
    * time\_left <- '-9'