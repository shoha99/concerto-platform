Building up on the test created in the previous tutorial, this section aims at furthering the understanding of R/Concerto by modifying two aspects of the test: the number of questions/items displayed on the question page, and how the results are explained to the participant. It is assumed that the reader has completed the [previous tutorial](https://code.google.com/p/concerto-platform/wiki/Concerto4PersonalityTest) as this section heavily builds upon it.
In order to determine what needs to be changed to achieve the goals described above, a similar structure as in the previous tutorial is used.
# Preparation #
## Pages ##
  1. Introductory page: no change
  1. Question page: needs to provide placeholders and answer buttons for 5 questions instead of only 1
  1. Result/Goodbye page: remains in the same format, only the text provided to it changes. The explanation written in the editor will be removed, and replaced with placeholders, that are then fed explanations from the database depending on a score.
## Data/Tables ##
An additional input table, providing the explanations for all the scores is required
No additional data is going to be stored.
Therefore, the only changes to tables are:
  1. a table containing the explanations of all the sub scores.
## Test administration ##
The flow of test administration changes very slightly. Changes to the original flow are written in **bold**
  1. show the introductory page to the participant
    1. participant fills in demographic data and presses OK: continue
    1. participant does not fill in demographic data and presses OK: do nothing
  1. show the question page and ask the ‘next’ **5 questions** (if available)
    1. participant **answers all items** and presses OK: continue
    1. participant does **not answer all items** and presses OK: repeat question
  1. once the participant answered all questions, calculate the scores
  1. show the result page along with the **score-dependent explanations**
This list should help in terms of how to write the actual R code to administer the test exactly as is required. Together with the previous points, it is now possible to set up the tables, the pages, and start to structure the test-logic file. The next section explains step by step how to do these things, which are summarized in the list below:
  * create tables holding
    * the questions
    * result & demographic data
    * question responses
  * create pages
    * introduction/demographic page
    * question page
    * result page
  * structure test logic file
# Modifying the pages (HTML templates) #
## Question page ##
It is possible to either modify the page that already exists, or simply create a new one. By creating a new page, the old is saved and could be used later on. However, as the old page only needs to be expanded, it is sensible to expand on it, despite creating a new page. Therefore, a new page is created, as a copy of the already existing page.
In order to do so,
  * go to **HTML template** tab
  * Make sure you are on **list of available objects** section
  * Click the **edit object** button in the row of your _question_ template
  * Mark all the elements in the editor and copy it (CTRL+C)
  * Click on **list of available objects**
  * Click **add new object** and enter _question5_ as the name and click **save**.
  * Paste the previously copied source code into the editor and click **save**.
To accommodate five questions simultaneously on the question page, one could manually add the radio buttons, button descriptions, and question placeholder four additional times. As this would be very time consuming, a faster method is proposed.
By copying the existing structure four times, the visual aspect can be created in almost an instant. To do so,
  * Copy the placeholder as well as the radio buttons
  * Paste it four times below the first set of question/buttons, but above the **Continue** button
The editor should now look similar to this:

![http://cambridgepsychometrics.com/~mike/27.png](http://cambridgepsychometrics.com/~mike/27.png)

However, while it certainly looks correct, thinking about what happened in the background, reveals that we just copied everything four times. If this page would be used with the current test-logic, the same question would be asked five times, and it would not matter which of the buttons was clicked, as long as at least one was selected.

In order to ask five different questions, the obvious and simple change is to change the name of the placeholders to allow for different parameters, like _question1_, _question2_, and so on.

However, the radio buttons still correspond to the same variable _answer_ as specified in the first tutorial. In order to change this, instead of double-clicking each button and changing the value manually, one can achieve the same by manipulating the source code. Click the **Source** button on the top left of the editor.

The editor view switches the source code view. It contains code of five copies of question placeholders and answer elements, as well as the button element at the bottom. In order to explain how to change the radio buttons to accommodate for the change, only one such answer element is going to be looked at in detail for the remainder of this section.

As was established, and can be looked up in the previous tutorial, the name of the radio-buttons value was _answer_. When checking for the answer value, the R-code referred to this _answer_ value. Therefore, in order to be able to get five different answers out of one page, the name of this variable needs to change. If you are not confident with code, this can also be achieved manually in the normal editor view by double-clicking each button and changing the value there (one row of buttons needs to have the same name). This tutorial will used the faster version of modifying the source code however. The code snippet below highlights the variable names that need to be changed:
```
<p style="text-align: center;">
disagree<input name="answer" type="radio" value="1" />&nbsp; 
slightly disagree<input name="answer" type="radio" value="2" />&nbsp; 
neutral<input name="answer" type="radio" value="3" />&nbsp; 
slightly agree<input name="answer" type="radio" value="4" />&nbsp; 
agree<input name="answer" type="radio" 
```
Similarly to assigning different names to the placeholders, assigning different names to the names of the radio buttons achieves the goal of having five different sets of questions with five different sets of answers. Systematically replace the name of the buttons with _answer1_, _answer2_, and so on. Please make sure that one set of radio buttons grouped together needs to have the same name (_answer1_, _answer2_, …), as they need to stay related to a question. Once completed, the source code should look like:
```
<p style="text-align: center;">{{question1}}</p>
<p style="text-align: center;">sdisagree<input name="answer1" type="radio" value="1" />&nbsp; slightly disagree<input name="answer1" type="radio" value="2" />&nbsp; neutral<input name="answer1" type="radio" value="3" />&nbsp; slightly agree<input name="answer1" type="radio" value="4" />&nbsp; agree<input name="answer1" type="radio" value="5" /></p>
<p style="text-align: center;">{{question2}}</p>
<p style="text-align: center;">disagree<input name="answer2" type="radio" value="1" />&nbsp; slightly disagree<input name="answer2" type="radio" value="2" />&nbsp; neutral<input name="answer2" type="radio" value="3" />&nbsp; slightly agree<input name="answer2" type="radio" value="4" />&nbsp; agree<input name="answer2" type="radio" value="5" /></p>
<p style="text-align: center;">{{question3}}</p>
<p style="text-align: center;">disagree<input name="answer3" type="radio" value="1" />&nbsp; slightly disagree<input name="answer3" type="radio" value="2" />&nbsp; neutral<input name="answer3" type="radio" value="3" />&nbsp; slightly agree<input name="answer3" type="radio" value="4" />&nbsp; agree<input name="answer3" type="radio" value="5" /></p>
<p style="text-align: center;">{{question4}}</p>
<p style="text-align: center;">disagree<input name="answer4" type="radio" value="1" />&nbsp; slightly disagree<input name="answer4" type="radio" value="2" />&nbsp; neutral<input name="answer4" type="radio" value="3" />&nbsp; slightly agree<input name="answer4" type="radio" value="4" />&nbsp; agree<input name="answer4" type="radio" value="5" /></p>
<p style="text-align: center;">{{question5}}</p>
<p style="text-align: center;">disagree<input name="answer5" type="radio" value="1" />&nbsp; slightly disagree<input name="answer5" type="radio" value="2" />&nbsp; neutral<input name="answer5" type="radio" value="3" />&nbsp; slightly agree<input name="answer5" type="radio" value="4" />&nbsp; agree<input name="answer5" type="radio" value="5" /></p>
<p style="text-align: center;"><input name="continue" type="button" value="{{buttonText}}" /></p>
```

Again, the reader is reminded that there is an alternative version of accomplishing this, by manually clicking each button in the normal editor view and changing the name there.
After changing the variable name either way, make sure to save the page.
## Result page ##
In a similar fashion, the current result page will be kept and a new one named resultsDynamic will be created by copying the contents of the old page.
  * Click on **list of available objects** section
  * Click the **edit object** button in the row of your results template
  * Mark all the elements in the editor and copy it (CTRL+C)
  * Click on **list of available objects**
  * Click **add new object** and enter _resultsDynamic_ as the **name** and click **save**.
  * Paste (CTRL+V) the previously copied source code into the editor and click **save**.
As the interpretations of the scores are going to be put dynamically on the page, the text written in the editor can largely be deleted. What should remain is the general explanation of the subscore. Then, new placeholders (e.g. _{{exExt}}_, _{{exAgr}}_, …) need to be created, maybe below each raw score. Put the explanation of the score (not the interpretation) in front of the placeholders.
Your editor should now look similar to this:
> ![http://cambridgepsychometrics.com/~mike/28.png](http://cambridgepsychometrics.com/~mike/28.png)
Once done, click **save** to save the changes. This concludes the changes made to the pages.
# Modifying the database (tables) #
As established above, a new table is going to be added, containing the interpretations of the scores. Similar to the table of questions, this table is provided as well, you can download [here](http://cambridgepsychometrics.com/~mike/bigfiveinterpretation.csv).
To create the table out of the file:
    * Go to **tables** tab
    * Make sure you are on **list of available objects** section
    * Click the **add new object** button
    * Enter _interpretations_ as a new table name and click the **save** button
    * Click the **import table from CSV file** button
    * Confirm the warning message by clicking **yes**
    * Make sure **add ‘id’ column** is checked (the data file provided already has no id column)
    * Check **header row** (the data file provided contains descriptions of the columns in the topmost row)
    * Make sure that field delimiter is set to _,_
    * Make sure that field enclosure is set to _"_
    * Click the **Choose File** button and select the file you downloaded previously
As _subscore_ and level (high/low) are determined by a numerical value, change the type of the both fields to numerical. In order to change that, click on the **pencil** in the row of the entry in the **table structure definition** area. Change the **type** to _numeric_ and click **save**. The **table structure definition** area should look like:
> ![http://cambridgepsychometrics.com/~mike/29.png](http://cambridgepsychometrics.com/~mike/29.png)
This concludes the changes made to the tables/database.

# Creating the test logic (tests) #
The test-logic code is going to be changed at two key-points. First, the presentation of five question at the same time (and therefore, storing five answers in the database). Then, the result section will be changed in order to present the participant only with the relevant interpretations of his or her scores.
Similarly to before, a new test logic file will be created, where the code from the existing test logic will be copied over.
## Creating a new test logic file ##
  * Go to the tests tab
  * Make sure you are in the **list of available objects** section
  * Click the **add new object** button
  * Enter _personality\_test_ as the name of the new test and click the **save** button
This created an empty test logic file that is ready to be filled with R code.
  * go to **tests** tab
  * Make sure you are on **list of available objects** section
  * Click the **edit object** button in the row of your _personality_ test
  * Mark all the code and copy it (CTRL+C)
  * Click on **list of available objects**
  * Click **add new object** and enter _personality2_ as the **name** and click **save**.
  * Paste the previously copied source code into the editor and click **save**.

## Question section ##
First, it is required to identify the code that is controlling the presentation of the question page and handling the responses given. This section is presented below

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
   if(!is.null(response$answer))
     responseProvided == TRUE
  }
}
responses <- (responses, response$answer)  
concerto.table.query(sql=paste("INSERT INTO `concerto4_23`.`responses` SET 
   `sessionID`='",dbEscapeStrings(concerto$db$connection,toString(concerto$sessionID)),"’,
   `questionNr`='",dbEscapeStrings(concerto$db$connection,toString(i)),"',
   `response`='",dbEscapeStrings(concerto$db$connection,toString(response)),"’          
   ",sep=""),params=list()
  )
}
```

First of all, the loop presenting the page, needs to be restricted to not rune as often as many questions there are, rather than only running the total number of questions/5 times:
`for(i in 1:length(questions$question)/5)`
This also applies to the condition within the while loop that checks for being at the last question. As it now needs to switch the button label when it arrives at the last five questions, the statement needs to be changed to:
`if(i < length(questions$question)/5)`
Also, the button label referring to “Next Question” seems to be erroneous in the new context of the test. It should be changed to something like “Next Questions” or “Next Block of Questions”.
The next line requiring change is the one that actually displays the page to the user:
```
response <- concerto.template.show(19, params = list(question = questions$question[i], buttonText = btnTxt))
```
It needs to be adapted to provide information to all the new placeholders like this:
```
response <- concerto.template.show(19, params = list(
question1 = questions$question[i],
question2 = questions$question[1+i],
question3 = questions$question[2+i],
question4 = questions$question[3+i],
question5 = questions$question[4+i],
buttonText = btnTxt))
```

However, this will only work for the first set of questions. If the code is implemented like this, when `i` is equal to _1_, questions 1-5 will be presented. When `i` takes the value of _2_, questions 2-6 will be presented, and so on. Therefore, there needs to be an extra change towards the way of indexing:

```
response <- concerto.template.show(21, params = list(
question1 = questions$question[1+(i-1)*5],
question2 = questions$question[2+(i-1)*5],
question3 = questions$question[3+(i-1)*5],
question4 = questions$question[4+(i-1)*5],
question5 = questions$question[5+(i-1)*5],
buttonText = btnTxt))
```

This way, when `i` equals _1_, _question1_ will receive the “1+0\*5“th question (i.e. 1st), _question2_ “2+0\*5” (i.e. 2nd), and so on. For `i` equals _2_, _question1_ will receive the “1+1\*5”th question (i.e. 6th), _question2_ “2+1\*5 (i.e. 7th), and so on.
Also keep in mind that a new page was created, therefore, change the number in the show-statement to the one of your new question page!
The next statement checks whether a response was provided.
```
if(!is.null(response$answer))
```
It now, however, needs to check if responses to all five questions were given.
```
if(!is.null(response$answer1) && !is.null(response$answer2) && !is.null(response$answer3) && !is.null(response$answer4) && !is.null(response$answer5))
```
The next step is to change the line of code that previously stored the one response into a variable
```
responses <- (responses, response$answer)
```
in such a way that it stores all the responses given on one page.
```
responses <- (responses, response$answer1)
responses <- (responses, response$answer2)
responses <- (responses, response$answer3)
responses <- (responses, response$answer4)
responses <- (responses, response$answer5)

```
Finally, these values need to be stored in the database. While this could be done by simply copy/pasting the statement 5 times, it can be solved more elegant by employing yet another loop and changing the values of _questionNr_ and changing the variable that is going to be stored in the _response_ field.
```
for(j in 1:5) {
   concerto.table.query(sql=paste("INSERT INTO `concerto4_23`.`responses` SET `sessionID`='",dbEscapeStrings(concerto$db$connection,toString(concerto$sessionID)),"’,
   `questionNr`='",dbEscapeStrings(concerto$db$connection,toString(j+(i-  #*5)),"',
   `response`='",dbEscapeStrings(concerto$db$connection,toString(responses[j+(i-  #*5])),"’          
   ",sep=""),params=list()
  )
}
```
This concludes the question section.

Result section
The changes required for the new result sections involve analyzing a participant’s sub score, and choosing the message to be put on the results page accordingly. This will involve changing the statement that includes the parameters handed to the page to display (adding the explanation is required), as well as adding the code to analyze a person’s score.

```
response <- concerto.template.show(20, params = list(
 ext = finScores[1], 
 agr = finScores[2], 
 con = finScores[3], 
 neu = finScores[4], 
 ope = finScores[5])
)
```

This statement needs to be expanded to something like this

```
response <- concerto.template.show(20, params = list(
 ext = finScores[1], 
 exExt = explanations[1],
 agr = finScores[2], 
 exAgr = explanations[2],
 con = finScores[3], 
 exCon = explanations[3],
 neu = finScores[4], 
 exNeu = explanations[4],
 ope = finScores[5],
 exOpe = explanations[5])
)
```

in order to allow for explanations to be shown on the results page. The next step involves in defining what the content of these variables is. Make sure to place the following code, BEFORE the one just described.

As this tutorial is aiming at teaching how to create tests and not to develop an accurate psychological test, a very simplified algorithm is used to determine the score-interpretation. If a given value is less or equal to 20 (a sub score ranges from 0 to 40), the score is considered ‘low’, otherwise ‘high’.

Again, this task is prone to be done in a for loop, as there are five sub scores, and the process of determining for which score to load is the same for each. The loop has to decide whether a score is high or low, and then has to query the database for the appropriate value for the respective dimension.

```
explanations <- c()
for(i in 1:5) {
  if(finScores[i] <= 20) 
    score = 1
  else 
    score = 2
  
  text <- 
  explanations <- c(explanations,text)
}
```

This loop first identifies the value of a subscore, and assigns a value to the score variable. This variable is going to be used later on in the query, that selects the appropriate value depending on the counter i (identifying the dimension) and the value of the score variable. To do so, place the cursor after the <- symbol and use the function toolbar:
  * Click the **function toolbar**
  * Click the **arrow** next to **concerto.table.query**
  * In the **table** dropdown menu, select the _interpretations_ table
  * For **query type**, select **SELECT**
  * In the **columns** section select _text_
  * Click on the **+** in the **where** section
  * Select _subscore_, **equal**, and write _i_ in the text field
  * Click on the **+** in the where section
  * Select _level_, **equal**, and write _score_ in the text field
  * Uncheck the **insert comments** and the **autoformat code** checkbox and click **apply**

Finally, do not forget to change the numerical value of the show statement to the number of the new results page.

This concludes the results section and thus the entire additional tutorial. The full code including commentary can be accessed [here](http://cambridgepsychometrics.com/~mike/personality_new.R)