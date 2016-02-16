# item bank and charts #

**THIS TUTORIAL ASSUMES THAT YOU UNDERSTAND AND HAVE COMPLETED [LESSON 1](Concerto4TutorialSimpleSurvey.md). IT WILL USE THE ELEMENTS CREATED IN THE PREVIOUS LESSON.**

## general description ##

In this lesson we will build on what we created in the previous lesson. The survey will be extended by adding the following:

  * **item bank** - a table that will contain all questions presented in the survey
  * **charts** - we will dynamically generate a chart that will represent the distribution of user responses for each of the questions

What we will learn in this tutorial:

  * **how to create item bank and how to use the items in the test logic**
  * **how to dynamically generate charts using response data and show it in the HTML template**


---


## Step 1: create item bank table ##

  * Create a table and name it **item bank**
  * Add column named **`question`** of type **text - HTML**
  * Item bank table structure should now look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_1.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_1.png)

  * Add items to the table data by clicking the **add** button. Add at least three items to start with.
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_3.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_3.png)

  * Set the question content by clicking the **edit HTML** icon button. Choose a question. Be sure to edit the question in **source** mode which will prevent inserting any unnecessary HTML tags into item question.
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_4.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_4.png)
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_12.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_12.png)

  * Save the table


---


## Step 2: modify previously created response tables ##

  * Open the previously created table named **responses**
  * Add column named **question\_id** of type **numeric**
  * The table structure should now look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_5.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_5.png)

  * Clear any previously inserted data by clicking **clear table** button
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_6.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_6.png)

  * Save the table


---


## Step 3: modify previously created HTML template ##

  * Open previously created HTML template named **survey**
  * Currently the survey should look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey1_14.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey1_14.png)

  * Replace **"Do you like travelling?"** question in HTML template with **{{question}}**

  * HTML template should now look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_2.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_2.png)

  * Below the question line please insert the chart image by clicking **image** icon button
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_13.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_13.png)

  * Now set the image **URL** to **` {{chart_url}} `** and click **OK**
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_14.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_14.png)

  * Don't worry about incorrect image path for now - it will be filled at run time. The template should now look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_15.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_15.png)

  * Save the template


---


## Step 4: Implement item bank and charts in test logic ##

  * Open the previously created test named **survey**. The test logic should look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey1_34.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey1_34.png)

  * Remove previously created table insert query. The test logic should now look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_7.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_7.png)

  * At the beginning of the test logic insert **`concerto.table.query`** function wizard to read the whole item bank. The configured function wizard should look like this (ids can be different):
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_8.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_8.png)

  * Apply the function wizard by clicking **apply** button
  * The code should now look like this (exact query string can differ):
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_9.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_9.png)

  * Now assign the output of the table query (data frame with every item in item bank) to the variable named **`ibank`**:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_10.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_10.png)

  * Now add a loop to iterate through every item in item bank and show the **survey** template for each of the question. We will also show items **question** column value in a template:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_11.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_11.png)

  * At the top of the looped block add **`concerto.table.query`** function wizard and set it so that you can retrieve all "**no**" answers for current question. Assign the output of the applied function wizard to variable named **`no_responses`**
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_16.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_16.png)

  * The code should now look like this:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_17.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_17.png)

  * Below that do the same for **yes** answers and assign the output to variable: **`yes_responses`** (**yes** responses are represented in the response table by **1**):
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_18.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_18.png)

  * Now we need to declare variables for chart path and full URL. We will use three variables for that: **`file_name`** - chart file name, **`chart_path`** - chart path used to save the chart, **`chart_url`** - chart URL used by HTML template to show the chart image. Two additionals variables are used here: **`concerto$mediaPath`** - test owner media directory path (used for media saving and internal file operations), **`concerto$mediaURL`** - URL of the previous directory used (used on HTML templates)
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_19.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_19.png)

  * Here is the code responsible for creating chart and showing it on HTML template. Please not that we pass one more variable to HTML template: **chart\_url**
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_20.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_20.png)

  * Now all that is left is to insert the response to the response table. Insert **`concerto.table.query`** function wizard right after the code to show the template in looped block and set it like that:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_21.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_21.png)

  * There is one more thing that we can add. To prevent chart image caching in browser we could append unique string (taken from current system time) to the chart URL:
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_23.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey2_23.png)

  * Save the test