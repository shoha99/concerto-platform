# TUTORIAL: Create a simple test step-by-step #

In this tutorial you are going to develop a test that looks more or less like that:
  * **[Simple test](http://dev.myiqtest.org/concerto/index.php?hash=96429388f1901156270cc6b1726c7bbf)**

Remarks:
  * This document is relevant to Concerto 2.0.2 and higher. If you use an older version, upgrade it
  * I experience problems while editing Templates using Mozilla Firefox - you may like to use Internet Explorer or Google Chrome to run administration panel

# Concept #
Here we show you how to create a simple test composed of three HTML Templates:
  * **Introduction** where the user can enter his/her name that will be used later in other HTML templates.
  * **Test questions** - with dichotomous (yes/no) response options for simplicity at this stage.
  * **Feedback** containing the user's score.

This tutorial is based on a very simple item bank declared directly in the R script. However, in a proper test it is advisable to use MySQL to store item banks, user databases, and results. Also, adaptivity is not used in this tutorial, but you will see how and where a bit of adaptive code can be added.

# Login to Concerto #
Go to **concerto\_installation\_path/admin** and login using your credentials. If you haven't installed Concerto on your server, you can use our demo installation. Email [Michal Kosinski](mailto:mk583@cam.ac.uk) to  get demo account.

Demo installation: http://dev.myiqtest.org/concerto/admin/

# Step 1: Create HTML Templates #
## Introduction template ##

  * To create a new HTML template click the **'create new'** button on the top left side of the **'items'** tab.

![http://cambridgepsychometrics.com/~michal/concerto/create_new.jpg](http://cambridgepsychometrics.com/~michal/concerto/create_new.jpg)

  * Enter the name of the template (e.g. **'my first template'**) - **note that you will not be able to save it without giving it a name**

http://cambridgepsychometrics.com/~michal/concerto/item_name.PNG

  * In the **'HTML Layer'** tab, add a text field by clicking on the "**Text Field**" icon.

http://cambridgepsychometrics.com/~michal/concerto/cke_text.PNG

  * Set the name of the Text Field to **user\_name**. The value entered by the user in this Text Field will be stored as a variable under this field's name ("user\_name"). This variable can be later used in other templates or in the R script. In the same window you can also specify a size for the field and choose its default contents (e.g. "Enter your name here"). Click **OK** to accept changes.

http://cambridgepsychometrics.com/~michal/concerto/user_name.PNG

  * Now add a button by clicking the "Button" icon.

http://cambridgepsychometrics.com/~michal/concerto/cke_button.PNG

  * Set the button's name to **btn\_start**, and button text(value) to  **Start**. Later you will assign an R script to this button to be executed once it's clicked. Accept by clicking **OK**.

![http://dev.myiqtest.org/concerto2/wiki_images/ckeditor_btn_properties.png](http://dev.myiqtest.org/concerto2/wiki_images/ckeditor_btn_properties.png)

  * Edit the contents of the template using the HTML editor, e.g. add some introductory test, for example "_Enter your name and press 'Start' button_". Note, that you can fully control the looks of this template by using the whole range of HTML functionalities. Usually, your web designer will prepare a nice HTML template for you!

  * Save the HTML template by clicking the **'save'** button.

http://cambridgepsychometrics.com/~michal/concerto/save.PNG

The resulting HTML Template should look more or less like this:

![http://dev.myiqtest.org/concerto2/wiki_images/demo_start.png](http://dev.myiqtest.org/concerto2/wiki_images/demo_start.png)


## Test HTML Template ##
  * Create a new template by clicking the **'create new'** button in the top left side of the **'items'** tab.
  * Give it a name in the HTML layer tab - **note that you will not be able to save it without giving it a name**
  * Add a radio button in the **'HTML layer'** tab by clicking "Radio Button" icon.

http://cambridgepsychometrics.com/~michal/concerto/cke_radio.PNG

  * Set radio button's name to **radio1** and it's value to **0**. Checking the "Selected" option will select this button by default.

http://cambridgepsychometrics.com/~michal/concerto/radio_properties.PNG

  * Add another radio button and give it the same name as the previous one - "**radio1**", but this time set the value to **1**. The value of the radio button selected by the user is stored as a variable under button's name. Hence, selecting first of the radio buttons sets the "radio1" variable to "0", and selecting the second one sets "radio1" to "1". Note, that radio buttons allow user to select one of the possible responses, for multiple correct response use "check boxes"!. Variable "**radio1**" can be later used in other templates or in the R script, e.g. to check which response was selected by the user. You can use any other input formats in your test: "check boxes", "Text Fields", "drop down lists", or even Flash Games that return a value (or set of values) to the platform. Alternatively, you can declare several buttons with different R scripts assigned to each of them.

http://cambridgepsychometrics.com/~michal/concerto/radio_properties2.PNG

  * Add button with name **btn\_next** and text(value) **Submit**.

  * Edit the template of an item - add:
    * Text **"No"** next to the first radio button and **"Yes"** next to the second one.
    * Text: **"{{user\_name}} please answer the question: {{question}}"** somewhere above the radio buttons.

  * See those double brackets "{{" with text inside them? You can use them to insert any content to your templates. You just need to create a session variable of this name (e.g. question) that will contain text, a piece of HTML code (e.g. a nice set of response options generated by R or stored in an item bank), a link to a picture/video/sound, etc. In this case "{{question}}" will be provided by the R script, while {{user\_name}} will be filled using the input of the user provided on the "Introduction" Template(remember the Text Field called "user\_name"?).

  * Save the HTML template by clicking the **'save'** button

This HTML template should look more or less like this:

http://cambridgepsychometrics.com/~michal/concerto/item_html.PNG


## Feedback HTML Template ##
  * Create a new template by clicking the **'create new'** button, give it a name - **note that you will not be able to save it without giving it a name**
  * in the **'HTML layer'** tab insert text: **{{user\_name}}, your total score is {{total\_score}}.**
  * press the **'save'** button to save the template.

This HTML template should look more or less like this:

http://cambridgepsychometrics.com/~michal/concerto/feedback_html.PNG

# Step 2: Assign R code to buttons #
## Start the test button ##
  * Press the "**Edit**"  button next to the **'demo\_start'** HTML Template
![http://cambridgepsychometrics.com/~michal/concerto/edit_action.png](http://cambridgepsychometrics.com/~michal/concerto/edit_action.png)

  * Go to the **'R Interaction'** tab, where you can assign R code to the buttons present on a given Template.

![http://dev.myiqtest.org/concerto2/wiki_images/r_code.png](http://dev.myiqtest.org/concerto2/wiki_images/r_code.png)

  * Paste this syntax in the **R code to execute** field:

```
## Create a simple item bank
## Note that in a proper test this should rather be stored in 
## the MySQL database and loaded here using the RMySQL package 

## Define a questions' content vector:
x <- c("Is 3-2=6?", "Is 2+3=6?", "Is 3*2=6?")

## and correct answers vector:
y <- c(0,0,1)

## set the starting question
## Note that this can be selected using a CAT algorithm, 
## e.g. this provided by the catR library

current_question <- 1

## create a total score variable
total_score <- 0

## set session variables that will be used to fill the 
## Templates with content. 
## set.var() and set.next.template() are very simple functions 
## defined by Concerto in each session. Press the "Concerto built
## in R functions documentation" button in the R interaction 
## section to read their description.

set.var("question",x[current_question])
set.next.template(TEST_HTML_TEMPLATE_ID)
```


**Modify the last line of the code. In the function**:
```
set.next.template(TEST_HTML_TEMPLATE_ID)
```

**Replace the "TEST\_HTML\_TEMPLATE\_ID" with the test's HTML Template ID that you can find on the item templates' list:**

http://cambridgepsychometrics.com/~michal/concerto/id_demo_item.PNG

In my case, ID of the appropriate template is 10, and thus set.next.template()  function looks like that:
```
set.next.template(10)
```


  * Click the **'save'** button to save the changes

## Test HTML Template ##
  * Choose "**edit**" from the drop down list next to the test HTML template on the item template's list and go to **'R Interaction'**.
  * Use this code for **'btn\_next'**:

```
## If the answer is correct add to the total score value
## Note that you may like to use a fancy IRT based scoring here!

if(y[current_question] == as.numeric(radio1)) total_score <- total_score + 1
  
## Check the stopping rule (here, max 3 questions). 
## If the test is to be terminated, activate the Feedback HTML Template
## and set the "total_score" session variable. Alternatively, 
## choose the next question (here literally the next one, but you may
## prefer to use some CAT here!)

if(current_question < 3) {
  current_question <- current_question + 1
  question <- x[current_question]
  set.var("question",question)
} else {
  set.var("total_score",total_score)
  set.next.template(FEEDBACK_TEMPLATE_ID) 	
}
```


**Again, replace the "FEEDBACK\_TEMPLATE\_ID" with the ID of the feedback HTML template .**

  * save the template by clicking the **'save'** button

# You are done! #

Obviously, this is the simplest test ever, but it nicely shows the idea behind Concerto.

To begin with, try to run your test in the **debug** mode to see what's going on behind the scenes. Choose the **'debug'** option from the drop-down list next to the Introduction template and play with it!

You can also run it in the regular mode - choose "run" from the drop down list. You can copy the URL and give it to others.

The test can be run as a separate website or embedded in the other websites or applications. Check this out (Concerto v1.0): [MyIQ demo](http://apps.facebook.com/myiq-dev/)
