# Introduction #
This tutorial intends to help you create a psychological test (non-adaptive) with Concerto. By taking the reader through the entire process of implementing a test – from analyzing the test and determining what type of pages and data tables are required, over creating both templates and tables, to writing the test logic in R – his or her understanding of R and the Concerto platform should be furthered. It is assumed that the reader already familiarized him- or herself with the Concerto platform (i.e. took one of the simple tutorials) and has a basic understanding of R or any other experience in programming/scripting languages.

The test implemented in this tutorial is the Big Five Personality Test. It consists of 50 Questions that can be answered on a five point Likert scale, with options ranging from “disagree” to “agree”. A sample can be accessed at http://personality-testing.info/print/big-five-personality-test.pdf

In addition to the test itself, three demographical variables are going to be assessed: age, gender, and occupation. At the end of the test, the participant will be informed of his or her result, along with an explanation of these results.
# Preparation #
## Pages ##
In order to create this test on Concerto, it needs to be considered what type of pages needs to be shown to a participant to fulfill the requirements above.
  1. Introductory page: upon starting the test, the participant should see some introductory words about the test. At the same page he or she can enter the demographic information
  1. Question page: the test itself consists of 50 questions that need to be asked. Therefore there needs to be a page where the questions are asked
  1. Result/Goodbye page:  once a participant answered all questions, his or her results are going to be shown to him, along with an explanation
Therefore, we already know that three pages are required.  The next step is to determine, what kind of data is going to be used in the test.

## Data/Tables ##

The only input that comes from the database, are
  * the questions
  * their scoring information

Data that is going to be stored in the tables are
  * the demographical data
  * the responses to each question
  * the final scores
Data that is going to be stored in the tables are
  * the demographical data
  * the responses to each question
  * the final scores
It is sensible to store the final scores as well as the demographical data together, and the single response to each question separately. Summarizing, there will be the following tables:
  * a table containing the questions and their scoring information
  * a table containing the demographical data and the final scores
  * a table containing item-level data (i.e. response to each question)
After determining how many tables and pages are required to administer the test, it is advisable to think of the rough structure of the test in terms of administration.
Test administration
It is assumed, for this tutorial, that all questions have to be answered and all demographic information has to be filled in.
  1. show the introductory page to the participant
    1. participant fills in demographic data and presses OK: continue
    1. participant does not fill in demographic data and presses OK: do nothing
  1. show the question page and ask the ‘next’ question (if available)
    1. participant chooses an answer and presses OK: continue
    1. participant does not choose an answer and presses OK: repeat question
  1. once the participant answered all questions, calculate the scores
  1. show the result page along with the explanations
This list should help in terms of how to write the actual R code to administer the test exactly as is required. Together with the previous points, it is now possible to set up the tables, the pages, and start to structure the test-logic file. The next section explains step by step how to do these things, which are summarized in the list below:
  * reate pages
    * introduction/demographic page
    * question page
    * result page
  * reate tables holding
    * the questions
    * result & demographic data
    * question responses
  * tructure test logic file
# Creating the pages (HTML templates) #
## Welcome/demographics page ##
  * go to **HTML template** tab
> ![http://cambridgepsychometrics.com/mike/1.png](http://cambridgepsychometrics.com/mike/1.png)
    * Make sure you are on **list of available objects** section
> ![http://cambridgepsychometrics.com/mike/2.png](http://cambridgepsychometrics.com/mike/2.png)
    * Click the **add new object** button
> ![http://cambridgepsychometrics.com/mike/3.png](http://cambridgepsychometrics.com/mike/3.png)
    * Enter _introduction_ as the name for your welcome/demographics page and click the **save** button.
> ![http://cambridgepsychometrics.com/mike/4.png](http://cambridgepsychometrics.com/mike/4.png)
You now created a new and empty template. As established above, it should contain an introduction, as well as the possibility for the participant to enter his or her demographical information.
In order to display the introduction, just type into the editor on screen and format the text as necessary.
> ![http://cambridgepsychometrics.com/mike/5.png](http://cambridgepsychometrics.com/mike/5.png)
After doing so, the next steps will explain how to add the objects that will be used to ask the participant the demographic information.
    * Gender will be indicated by pressing one of two radio buttons (male/female)
    * Age will be indicated by a number entered by the participant in a text field
    * Occupation will be indicated by pressing one of four radio buttons (student (school)/student(university)/worker/no occupation)
    * The participant can indicate that he or she understood the instructions and the correctness of his or her demographic information by pressing a checkbox.
    * A button will be used to advance to the next section of the test
First, the radio buttons to indicate gender are created:
    * Click the button that shows a selected radio button (marked below)
> > ![http://cambridgepsychometrics.com/mike/6.png](http://cambridgepsychometrics.com/mike/6.png)

  * Enter _gender_ for the **Name**, and enter _m_ as **Value**, and click **OK**

> ![http://cambridgepsychometrics.com/mike/7.png](http://cambridgepsychometrics.com/mike/7.png)

  * Enter _Male_ in the text editor right next to the radio button that appeared in the template
  * Create another radio button that has also _gender_ as its **Name**, but _f_ for the **Value** and enter _Female_ in the text editor next to the second button
  * Add a text prompting a response in front of the radio buttons (e.g. “_Gender:_”)
Next, a text field is created to allow the participant to enter his or her age. Make sure to start a new line.
  * Click the button that shows an empty text field with a cursor in it (marked below)
> ![http://cambridgepsychometrics.com/mike/8.png](http://cambridgepsychometrics.com/mike/8.png)

  * Enter _age_ for the **Name** and make sure the dropdown menu **type** has **Text** selected and click **OK**
> ![http://cambridgepsychometrics.com/mike/9.png](http://cambridgepsychometrics.com/mike/9.png)

  * Enter _Age:_ next to the text field that appeared in the template
Then, the radio buttons to indicate _occupation_ are created. Make sure to start a new line.
  * Create four radio buttons with occupation as their **Name\*s, and the**Value\*s _1_, _2_, _3_, and _4_. Don’t forget to name these buttons in the editor by writing _Student (School)_, _Student (University)_, _Working_, and _Unoccupied_, next to the respective buttons.
The next item added is the checkbox for confirming of having understood the instruction and the correctness of the data provided:
  * Click the button that shows a checked checkbox (marked below)
> ![http://cambridgepsychometrics.com/mike/10.png](http://cambridgepsychometrics.com/mike/10.png)

  * Enter _confirm_ for the **Name** and _1_ for the **Value**
  * Make sure that the **Selected** option is not selected and press **OK**
> ![http://cambridgepsychometrics.com/mike/11.png](http://cambridgepsychometrics.com/mike/11.png)

  * Enter a text prompting the user to click the checkbox to confirm the correctness of his or her demographic data and that he or she understood the instructions of the test next to the checkbox that appeared in the template.
Finally, a button is added that allows the participant to proceed to the next page. Make sure to start a new line.
  * Click the button that shows a button (marked below)
> ![http://cambridgepsychometrics.com/mike/12.png](http://cambridgepsychometrics.com/mike/12.png)

  * Enter _continue_ for the **Name**, _Start the Test_ for the **Text/Value**
  * Make sure the dropdown menu for **Type** has “Button” selected and click **OK**
> ![http://cambridgepsychometrics.com/mike/13.png](http://cambridgepsychometrics.com/mike/13.png)

You are done designing the welcome template. Click save on the bottom of the page.
> ![http://cambridgepsychometrics.com/mike/14.png](http://cambridgepsychometrics.com/mike/14.png)


For reference, your template should look similar to this:

> ![http://cambridgepsychometrics.com/mike/15.png](http://cambridgepsychometrics.com/mike/15.png)

## Question page ##
  * Make sure you saved the current template!
  * Click on **list of available objects**
  * Click the **add new object** button
  * Enter _question_ as the name for your question page and click the **save** button
The template for your question page was created. There are going to be two principal elements on this page: the question, and the answer option.
Since the question is going to be taken from the database (the table), a placeholder needs to be put into the template that is later automatically replaced with the question text.
  * Enter _{{question}}_ into the editor
In order to create the answering options for this test, which are the mutually exclusive options of “disagree”, “slightly disagree”, “neutral”, “slightly agree” and “agree”, radio buttons are going to be used to allow the participant to answer a question.
  * Create five radio buttons with _answer_ as their **Name\*s, and the**Value\*s _1_, _2_, _3_, _4_, and _5_. Don’t forget to name these radio buttons in the editor by writing _disagree_, _slightly disagree_, _neutral_, _slightly agree_, and _agree_ next to the respective buttons. Make sure that the radio button of _disagree_ has the **Value** _1_, the radio button of _slightly disagree_ has _2_, and so on.
Finally, a button to proceed to the next question (or page) is added:
  * Create a button with _continue_ for the **Name** and _{{buttonText}}_ for the **Text**. This is to demonstrate how a button’s label can be dynamically changed.
The question template is now finished and should look similar to this:
> ![http://cambridgepsychometrics.com/mike/16.png](http://cambridgepsychometrics.com/mike/16.png)

Click save to save the question template and then continue to create the results template.



## Results page ##
  * go to **HTML template** tab
  * Make sure you are on **list of available objects** section
  * Click the **add new object** button
  * Enter _result_ as the name for your welcome/demographics page and click the **save** button.
The template for your result page was created. It will contain four elements: a text that sees the participant off, the participant’s actual results, the interpretation of these results, as well as the button to end the test.
In order to write the outro, simply type it into the editor. Then create placeholder for the participant’s scores. Since the score actually consists of five sub scores (extroversion, agreeableness, conscientiousness, neuroticism, and openness to experience), create  five placeholders, one for each sub score by typing _{{ext}}_, _{{agr}}_, _{{con}}_, _{{neu}}_, and _{{ope}}_ into the editor. You should spell out the full term before each placeholder, like _Extroversion: {{ext}}_ for a better understanding.
Since the interpretation is not entirely dependent on the score, just type the interpretation of each individual score into the editor.
Finally, the submit button that ends the test needs to be added.
Finally, a button is added that allows the participant to proceed to the next page:
  * Click the button that shows a button (marked below)
  * Enter _submit_ for the **Name**
  * Enter _Submit_ for the **Text/Value**
  * Select Submit in the **Type** dropdown menu
  * Click **OK**
Click **save** to save the results template. Your template should look similar to this:
> ![http://cambridgepsychometrics.com/mike/17.png](http://cambridgepsychometrics.com/mike/17.png)
You are now finished creating all the templates and continue to create the tables.
# Creating the database (tables) #
## Results table ##
    * Go to **tables** tab
    * Make sure you are on **list of available objects** section
    * Click the **add new object** button
    * Enter _results_ as a new table name and click the **save** button
This just created an empty table. It is now necessary to structure the table, i.e. to determine what type of data this table is going to contain. As established before, the results should contain the scores of the personality test, and the demographic data. In addition, there needs to be a way to uniquely identify a participant, which is accomplished by storing the unique session ID assigned to each participant taking the test. Not as important, but maybe important for later reference, is storing the test ID, referring to the test-logic file that was used in this specific instance.
Keep in mind that some fields are going to store numerical data, while others will store text data. Therefore there need to be the following fields:
    * Session ID (numerical)
    * Gender (text)
    * Age (numerical)
    * Occupation (numerical)
    * Extroversion score (numerical)
    * Agreeableness score (numerical)
    * Conscientiousness score (numerical)
    * Neuroticism score (numerical)
    * Openness to Experience score (numerical)
    * Test ID (numerical)
In order to add these fields to the table
    * Click the **add** button in the **table structure definition** section
> ![http://cambridgepsychometrics.com/mike/18.png](http://cambridgepsychometrics.com/mike/18.png)
    * Enter a descriptive name (e.g. _sessionID_, _gender_, …) , select the appropriate **type**, and click **add**.
![http://cambridgepsychometrics.com/mike/19.png](http://cambridgepsychometrics.com/mike/19.png)
    * After adding all fields, click **save** to save this table.
Your **table structure definition** should look similar to this:
> ![http://cambridgepsychometrics.com/mike/20.png](http://cambridgepsychometrics.com/mike/20.png)
## Responses table ##
    * Go to **tables** tab
    * Make sure you are on **list of available objects** section
    * Click the **add new object** button
    * Enter _responses_ as a new table name and click the **save** button
This created an empty table. It is now necessary to structure the table, i.e. to determine what type of data this table is going to contain. As established before, the question table should record the responses of a user to each question individually. This requires uniquely identifying the user, the question itself, and the response.
Therefore, there need to be the following fields:
    * Session ID
    * Question (it will suffice to store the question’s item number, since the text of the question will be stored in the questions table)
    * Response
All fields will be of numerical data type. In order to add these fields to the table, click the **add** button in the **table structure definition** section, enter a descriptive name, select the appropriate **type**, and click **add**. After adding all fields, click **save** to save this table. It should look like this:
> ![http://cambridgepsychometrics.com/mike/21.png](http://cambridgepsychometrics.com/mike/21.png)

## Questions table ##
Since the questions table is supposed to provide the questions, as well as scoring information to the test, the table would not only be required to be created and structured, but also filled with data. It is easier in most occasions however, to create this type of information beforehand, and import the information into Concerto. Therefore, a .csv file was created and is available [here](http://cambridgepsychometrics.com/mike/bigfivequestions.csv). (For purposes of testing the test after completing writing the test-logic, a shortened version with only 15 questions is available [here](http://cambridgepsychometrics.com/mike/bigfivequestions_short.csv)) Then proceed as described below:
  * Go to **tables** tab
  * Make sure you are on **list of available objects** section
  * Click the **add new object** button
  * Enter _questions_ as a new table name and click the **save** button
  * Click the import table from CSV file button
> ![http://cambridgepsychometrics.com/mike/22.png](http://cambridgepsychometrics.com/mike/22.png)

  * Confirm the warning message by clicking **yes**
> ![http://cambridgepsychometrics.com/mike/23.png](http://cambridgepsychometrics.com/mike/23.png)

  * Make sure **add ‘id’ column is not checked** (the data file provided already has an id column)
  * Check **header row** (the data file provided contains descriptions of the columns in the topmost row)
  * Make sure that **field delimiter** is set to _,_
  * Make sure that **field enclosure** is set to _"_
  * Click the **Choose File** button and select the file you downloaded previously
> ![http://cambridgepsychometrics.com/mike/24.png](http://cambridgepsychometrics.com/mike/24.png)

  * Confirm the warning message by clicking **yes**
> ![http://cambridgepsychometrics.com/mike/25.png](http://cambridgepsychometrics.com/mike/25.png)

  * Click **OK** to confirm the confirming message
Both the table structures as well as the data are now ready to use. It is important however to ensure that each field has the appropriate data type. While _question_ and _dimension_ are text fields, the _inverted_ field should be of numerical type. In order to change that, click on the pencil in the row of the _inverted_ entry in the **table structure definition** section. Change the type to numeric and click **save**. The **table structure definition** section should look like:
> ![http://cambridgepsychometrics.com/mike/26.png](http://cambridgepsychometrics.com/mike/26.png)

click **save** to save this table.
As both the pages and the database are set up, it is time to start writing the test logic that connects all these bits and pieces.

# Creating the test logic (tests) #
The test itself is going to be controlled by the test logic, written in R code. It determines what pages are shown at what time, get question data from the database, and write the results into the database. It is the core of each test.
## Creating a new test logic file ##
  * Go to the tests tab
  * Make sure you are in the **list of available objects** section
  * Click the **add new object** button
  * Enter _personality\_test_ as the name of the new test and click the **save** button
This created an empty test logic file that is ready to be filled with R code.
## Structuring the test logic ##
While this might not be necessary, structuring the file before writing the actual code helps in visualizing the required steps, and makes the test logic file easily maintainable. To illustrate how the test logic file should be structured, the flowchart shown above is used as a reference:
  1. show the introductory page to the participant
    1. participant fills in demographic data and presses OK: continue
    1. participant does not fill in demographic data and presses OK: do nothing
  1. show the question page and ask the ‘next’ question (if available)
    1. participant chooses an answer and presses OK: continue
    1. participant does not choose an answer and presses OK: repeat question
  1. once the participant answered all questions, calculate the scores
  1. show the result page along with the explanations
In very simplified terms, this flowchart can be expanded to four basic sections:
```
### introductory section ###
### question section ###
### score calculation section ###
### result section ###
```
In terms of displaying pages, storing and loading data in/from the database, each section has different actions to perform. These actions could be expanded as follows:
```
### introductory section ###
 #display introduction page
 #wait until participant filled in the data and confirms by checking the check box
 #save the demographic data in a variable
 #save demographic data to the database
 #continue to question section
### question section ###
 #load the question data
 #for all questions that were loaded
   #display the question page with the current question
    #wait until the participant answers
    #store the response in a variable
    #save the response in the database
### score calculation section ###
 #calculate the scores stored in the variable of the question section
 #write the scores to the database
### result section ###
 #display the result page with the previously calculated results
```
Each section is going to be looked at separately in the remainder of this tutorial.

## Introductory section ##
```
### introductory section ###
 #display introduction page
 #wait until participant filled in the data and confirms by checking the check box
 #save the demographic data in a variable
 #save demographic data to the database
 #continue to question section
```
The first two statements can be expanded to a while loop. As long as a certain condition is not met (i.e. the completed variable, also called a flag, is not set to true), display the introduction page. It could look like this:
```
completed <- FALSE
while(completed == FALSE) {
  #display the introductory page
}
```
In order to display a page in Concerto, you can use the function toolbar, or simply type the following in front of the comment:
```
concerto.template.show(18)
```
It is important that the number enclosed in the brackets refers to the number of the introductory page template. If you do not know this number, you can look it up by navigating to the **HTML Templates** tab and look at the **id** of your _introduction page_. Also note that in this case it is not required to pass any variable to the page, because there is no dynamically created content.
In order to access the demographic data, and to see whether it was completely filled in, we need to store these values in a variable. This is achieved by simply assigning the value of the template to a variable, like:
```
demographicData <- concerto.template.show(18)
```
The code should now look something like this:
```
completed <- FALSE
while(completed == FALSE) {
 demographicaData <- concerto.template.show(18)
}
```
The next step is to save the demographic data to the database and continue to the question section. Therefore, in order to continue to the question section, it is important to ensure that all information was provided and the participant confirmed he or she understood the instructions. Only then it makes sense to store the information in the database and continue.
To determine whether the information was given, or not, it is required to access the data stored in the demographicsData variable. This can be done by referring to the elements of the introduction page by using the `$` sign, like for example with age:
```
demographicData$age
```
As established above, the test can only start when the participant has filled in all demographical data, as well as confirmed the correctness of it and that he or she understood the instructions. Therefore it is necessary to check whether the `demographicData` variable and its sub-variables contain values or not. Unless all of the sub-variables contain appropriate values, the completed flag is not going to be set to TRUE (enabling the test to continue).
This can be achieved by using a conditional statement like the one shown in the code below:
```
completed <- FALSE
while(completed == FALSE) {
 demographicaData <- concerto.template.show(18)
 if(!is.null(demographicData$gender) && demographicData$age != “” &&
    !is.null(demographicData$occupation) && !is.null(demographicData$confirm))
    
    completed = TRUE
}
```
The statement checks whether a radio button was clicked at all (if not, it returns NULL), if something was entered into the text field (if not, an empty string is returned), and whether the checkbox was checked or not (if not, it returns NULL).
Now, if a user provided all information and checked the checkbox, the flag will change and allow the code to continue outside the loop. Before going on to the question section, the variables should be stored in the database. The **function toolbar** provides an easy way of generating the code necessary for doing so. Please ensure that your cursor is outside the loop before you execute the following steps:
  * Click the **function toolbar**
  * Click the **arrow** next to **concerto.table.query**
  * In the **table** dropdown menu, select the _results_ table
  * For **query type**, select **INSERT**
  * Click the **+** sign and select _sessionID_ from the dropdown menu. In the text field write _concerto$sessionID_
  * Click the **+** sign and select _gender_ from the dropdown menu. In the text field write _demographicData$gender_
  * Click the **+** sign and select _age_ from the dropdown menu. In the text field write _demographicData$age_
  * Click the **+** sign and select _occupation_ from the dropdown menu. In the text field write _demographicData$occupation_
  * Uncheck the **insert comments** and the **autoformat code** checkbox and click **apply**
This concludes the creation of the introductory section. Your code should now look something like this (it might look different because of formatting, but the content should be the same, apart from some numbers):
```
completed <- FALSE
while(completed == FALSE) {
 demographicaData <- concerto.template.show(18)
 if(!is.null(demographicData$gender) && demographicData$age != “” &&
    !is.null(demographicData$occupation) && !is.null(demographicData$confirm)) 
    completed = TRUE
}
concerto.table.query(sql=paste("INSERT INTO `concerto4_23`.`results` SET 
 `sessionID`='",dbEscapeStrings(concerto$db$connection,toString(concerto$sessionID)),"',
 `gender`='",dbEscapeStrings(concerto$db$connection,toString(demographicData$gender)),"',
 `age`='",dbEscapeStrings(concerto$db$connection,toString(demographicData$age)),"',
 `occupation`='",dbEscapeStrings(concerto$db$connection,toString(demographicData$occupation)),"'
 ",sep=""),params=list()
)
```
## Question section ##
```
### question section ###
 #load the question data
 #for all questions that were loaded
   #display the question page with the current question
    #wait until the participant answers
    #store the response in a variable
    #save the response in the database
```
Before it is possible to ask the first question, or any other question, it is necessary to load the question data from the data base. Again, the **function toolbar** provides an easy way of doing so. Please ensure that your cursor is below the ‘load question data’ comment before following this list of steps:
  * Click the **function toolbar**
  * Click the **arrow** next to **concerto.table.query**
  * In the **table** dropdown menu, select the questions table
  * For **query type**, select **SELECT**
  * Ensure that **all** is selected in the **columns** section
  * Uncheck the **insert comments** and the **autoformat code** checkbox and click **apply**
Again, in order to access the values provided by the database query, it needs to be assigned to a variable. Place your cursor just in front of the code that was just created and type a meaningful name (e.g. _questions_) followed by the assign arrow _<-_.
Apart from formatting, your code should in the question section should look like
```
questions <- concerto.table.query(sql=paste("SELECT * FROM `concerto4_23`.`questions`",sep=""),params=list())
```
The next step is setting up the loop that loops through all questions available. Within that loop, a question page should be displayed, using the question text provided from the database. Once a response is given, the next question is to be selected and displayed, until there are no more questions left. In between these steps, the values are to be stored in a variable, as well as in the database.
In order to get started, a variable is created to contain all the responses of the participant. Thereafter, a for loop is set up. It should include the display of the page and saving the response in a variable:
```
responses <- c()
for(i in 1:length(questions$question)) {
  response <- concerto.template.show(19)
}
```
Again, replace the number in the bracket with the number of your question page template.
In order to display the actual question on the question page, the question text needs to be provided to the page so it can replace the placeholder text with the actual question. Moreover, the button on the question page that allows the participant to submit his or her answers contains a placeholder text as well. While there are questions left, it should read “Next Question”, whereas when the participant is about to answer the last question, it should read “Finish Test”. This can be achieved by creating a conditional that assigns different texts to a variable that is later supplied to the page, like this:
```
if(i < length(questions$question))
 btnTxt = "Next Question"
else
 btnTxt = "Finish Test"
```
In order to supply both the question and the button text to the page, they need to be supplied to the template as a parameter, like this:
```
response <- concerto.template.show(19, params = list(question = questions$question[i],
 buttonText = btnTxt))
```
The statement in the list states that the placeholder called question, shall take the value of the i-th question of the questions variable that was created before, and the placeholder called _buttonText_ takes the value of the variable _btnTxt_.
Similarly to the previous situation of not continuing the test if the participant did not fill in all demographical data, it is now required to prevent the test from continuing when no response is given. Therefore, a structure similar to the one used in the introduction section can be set up, like the following:
```
responses <- c()
for(i in 1:length(questions$question)) {

  responseProvided <- FALSE
while(responseProvided == FALSE) {
   if(i < length(questions$question))
    btnTxt = "Next Question"
   else
    btnTxt = "Finish Test"
    response <- concerto.template.show(19, params = list(question = questions$question[i], buttonText = btnTxt))
    if(is.null(response$answer))
      responseProvided == TRUE
  }
}
```
After it is ensured that the response variable will contain a valid response, it can be stored in a variable storing all of the participant’s responses, as well as saving the value in the database. The code should be written AFTER the while loop, but before the end of the FOR loop.
In order to store the response of a question into a variable that contains all responses, an empty vector should be created before the for loop (e.g. `responses <- c()` ). Within the for loop, that vector is going to be updated with new responses, like this: `responses <- c(responses, response)`
Afterwards, the response should be stored in the database. For this, the function toolbar is going to be used again (please ensure to set your cursor below statement described above but within the for-loop):
  * Click the **function toolbar**
  * Click the **arrow** next to **concerto.table.query**
  * In the **table** dropdown menu, select the _responses table_
  * For **query type**, select **INSERT**
  * Click the **+** sign and select _sessionID_ from the dropdown menu. In the text field write _concerto$sessionID_
  * Click the **+** sign and select _questionNr_ from the dropdown menu. In the text field write _i_
  * Click the **+** sign and select _response_ from the dropdown menu. In the text field write _response_
  * Uncheck the **insert comments** and the **autoformat code** checkbox and click **apply**
This concludes the creation of the question section. Your code of this section should look, apart from formatting, like this:
```
responses <- c()
for(i in 1:length(questions$question)) {

  responseProvided <- FALSE
while(responseProvided == FALSE) {
   if(i < length(questions$question))
    btnTxt = "Next Question"
   else
    btnTxt = "Finish Test"
    response <- concerto.template.show(19, params = list(question = questions$question[i], buttonText = btnTxt))
    if(is.null(response$answer))
      responseProvided == TRUE
  }
}
responses <- (responses, response)  
concerto.table.query(sql=paste("INSERT INTO `concerto4_23`.`responses` SET 
   `sessionID`='",dbEscapeStrings(concerto$db$connection,toString(concerto$sessionID)),"’,
   `questionNr`='",dbEscapeStrings(concerto$db$connection,toString(i)),"',
   `response`='",dbEscapeStrings(concerto$db$connection,toString(response)),"’          
   ",sep=""),params=list()
  )
}
```
## Score calculation section ##
```
### score calculation section ###
 #calculate the scores stored in the variable of the question section
 #write the scores to the database
```
Although this section only contains two statements, the actual code to carry out the score calculation is more complicated than it might seem. Looking at the scoring sheet of the paper test reveals the following information: certain items belong to certain sub scores, and certain items, across all sub scores, need to be subtracted rather than added to its sub score.
As is with the whole of the implementation of this test, there are multiple ways of accomplishing the calculation, the presented option is only one of many possibilities to carry out the calculation.
Because we can assume that a valid response was given to all questions, the first step should be to multiply all responses by -1 that are flagged as that – there is a field in the table called inverted, that contains a 0 for responses that are to be added, and a 1 for values that need to be subtracted. After determining which values need to be changed, a loop is set up that actually multiplies all values by -1 that are flagged for doing so.
Looking for specific values in a vector of numbers (or any type of data in a given array of data) can be done using the `which()` function. The code should identify all indices, where the _inverted_ value is set to 1.
Only the responses with these indices should be multiplied by -1. In order to do this automatically, each of these previously found indices is going to serve as an index of the responses variable (storing all responses). This way, only the responses to the marked questions are going to be subject to the change. An example is shown below:
```
invertedQuestionIndices <- which(questions$inverted == 1)
for(i in 1:length(invertedQuestionIndices))
  responses[invertedQuestionIndices[i]] = as.numeric(responses[invertedQuestionIndices[i]]) * -1
```
After ‘inverting’ all responses, it is an easy task to calculate the sub scores. In lay terms, for each dimension, all responses to a question of a certain dimension should be added (as the questions that require its response to be subtracted have already been multiplied by -1, a simple addition suffices). Once the sub scores of a certain dimension were added up, the sum should be stored in a variable that, in the end, contains all five dimension scores. To simplify looping through all dimension, setting up a vector that marks each of these dimensions is recommended. It does not only serve as a counter, but also as a comparison value for the _dimension_ field in the question table.
In order to find all values for a certain dimension, the `which()` function can be used again. Then, again, the resulting vector serves as a provider for the indices of the sub scores for a particular dimension. After all scores of one dimension were added, the result is stored in the final vector. The example is shown below:
```
dimensions <- c('e','a','c','n','o')
finScores <- c()
for(i in 1:length(dimensions)) {
  score <- 0
  dimensionQuestions <- which(questions$dimension == dimensions[i])
  for(j in 1:length(dimensionQuestions)) {
    score = score + as.numeric(responses[dimensionQuestions[j]])
  }
  finScores <- c(finScores,score)
}
```
Scoring is not done yet, as there are constants that need to be added to each dimension to arrive at the final score. This is done by simply adding the values as shown below:
```
finScores[1] = finScores[1] + 20
finScores[2] = finScores[2] + 14
finScores[3] = finScores[3] + 14
finScores[4] = finScores[4] + 38
finScores[5] = finScores[5] +  8
```
Now, that scoring is complete, the values can be written into the database:
  * Click the **function toolbar**
  * Click the **arrow** next to **concerto.table.query**
  * In the **table** dropdown menu, select the results table
  * For **query type**, select **UPDATE**
  * In the **set** section
    * Click the **+** sign and select _ext_ from the dropdown menu. In the text field write `finScores[1]`
    * Click the **+** sign and select _agr_ from the dropdown menu. In the text field write `finScores[2]`
    * Click the **+** sign and select _con_ from the dropdown menu. In the text field write `finScores[3]`
    * Click the **+** sign and select _neu_ from the dropdown menu. In the text field write `finScores[4]`
    * Click the **+** sign and select _ope_ from the dropdown menu. In the text field write `finScores[5]`
  * In the **where** section
    * Click the **+** sign and select _sessionID_ from the dropdown menu. In the text field write _concerto$sessionID_
  * Uncheck the **insert comments** and the **autoformat code** checkbox and click **apply**
This concludes the creation of the score calculation section. Your code of this section should look, apart from formatting, like this:
```
invertedQuestionIndices <- which(questions$inverted == 1)
for(i in 1:length(invertedQuestionIndices))
  responses[invertedQuestionIndices[i]] = as.numeric(responses[invertedQuestionIndices[i]]) * -1
dimensions <- c('e','a','c','n','o')
finScores <- c() #variables to store the final scores
for(i in 1:length(dimensions)) {
  score <- 0
  dimensionQuestions <- which(questions$dimension == dimensions[i])
  for(j in 1:length(dimensionQuestions)) {
    score = score + as.numeric(responses[dimensionQuestions[j]])
  }
  finScores <- c(finScores,score)
}
finScores[1] = finScores[1] + 20
finScores[2] = finScores[2] + 14
finScores[3] = finScores[3] + 14
finScores[4] = finScores[4] + 38
finScores[5] = finScores[5] +  8
concerto.table.query(sql=paste("UPDATE `concerto4_23`.`results` SET 
 `ext`='",dbEscapeStrings(concerto$db$connection,toString(finScores[1])),"',
 `agr`='",dbEscapeStrings(concerto$db$connection,toString(finScores[2])),"',
 `con`='",dbEscapeStrings(concerto$db$connection,toString(finScores[3])),"',
 `neu`='",dbEscapeStrings(concerto$db$connection,toString(finScores[4])),"',
 `ope`='",dbEscapeStrings(concerto$db$connection,toString(finScores[5])),"'
 WHERE `sessionID` = '",    bEscapeStrings(concerto$db$connection,toString(concerto$sessionID)),"'
 ",sep=""), params=list()
)
```
## Result section ##
```
### result section ###
 #display the result page with the previously calculated results
```
This is by far the shortest section of the test-logic, as it will contain only a single statement, namely the one showing the result page, using the previously calculated scores as a parameter for the specified placeholders. Again, make sure to replace the number from the example with the actual template number of your result page.
```
response <- concerto.template.show(20, params = list(
 ext = finScores[1], 
 agr = finScores[2], 
 con = finScores[3], 
 neu = finScores[4], 
 ope = finScores[5])
)
```
As this is the only code relevant, this concludes the result section.
# Conclusion/Summary #
A full version of the test-logic file, including comments to every single instruction, can be found [here](http://cambridgepsychometrics.com/mike/personality.R)