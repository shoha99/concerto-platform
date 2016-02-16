# TUTORIAL: Create you first ADAPTIVE test. #

The test you are going to create here will look like that:
  * **[Concerto v2.0 Simple Adaptive Test demo](http://dev.myiqtest.org/concerto/index.php?hash=004d269f4604dbc8058ae8384e6a239c)** (without the fancy graph at the bottom)


It is assumed that before you start this tutorial you've SUCCESSFULLY finished this one:
[Step-by-Step tutorial to make a simple test](http://code.google.com/p/concerto-platform/wiki/tutorial?ts=1318172928&updated=tutorial).

**This document is relevant to Concerto 2.0.2 and higher. If you use an older version, upgrade it.**

## Concept ##
Here we show how to create a simple 2PL adaptive test based. It is composed of three templates:
  * **Introduction**
  * **Test item** - with a simple mathematical task.
  * **Feedback** containing the user's score.

Item bank and item parameters are to be generated at the beginning of the test. To fully understand what is going on, you need to know basics of R. I've used few functions from [catR library](http://cran.r-project.org/web/packages/catR/index.html) but they should be pretty self-explainable. Note, that you have complete freedom while using Concerto: you can use any other R library or simply write your own equations.

# Login to Concerto #
**I personally experience problems while editing Templates using Mozilla Firefox - try using Internet Explorer or Google Chrome to run administration panel**

Go to **concerto\_installation\_path/admin** and login using your credentials. If you haven't installed Concerto on your server, you can use our demo installation. Email [Michal Kosinski](mailto:mk583@cam.ac.uk) to  get demo account.

Demo installation: http://dev.myiqtest.org/concerto/admin/

# Step 1: Create HTML Templates #

First, you need to create 3 HTML templates using an HTML Layer tab. If you don't know how to do it, take the [Step-by-Step tutorial to make a simple test](http://code.google.com/p/concerto-platform/wiki/tutorial?ts=1318172928&updated=tutorial).

### First HTML template should contain: ###
  * a friendly title
  * a button with a meaningful name, e.g. "Start"
and look like that:

http://cambridgepsychometrics.com/~michal/concerto/item1.PNG

### Second HTML template should contain: ###
  * a friendly title and a short instruction
  * an equation: **{{a}} + {{b}} =** to be solved by the testee
    * note that **a** and **b** values will be set up by R syntax
  * a **text field** called "**response**" where user will write his response
    * IMPORTANT: make sure you have called this **text field** "**response**" as that's how we refer to it in R code. You can give it a different name, but you will have to change R code accordingly.
    * If you don't know how to add a text field, take the  [Step-by-Step tutorial to make a simple test](http://code.google.com/p/concerto-platform/wiki/tutorial?ts=1318172928&updated=tutorial).
  * A button
  * And, for presentation purposes, fields {{theta}}, {{sem}}, {{difficulty}}, {{discrimination}}. We will use R syntax to fill those fields with the current values of those parameters.

This template should look like that:
http://cambridgepsychometrics.com/~michal/concerto/item2.PNG

### Third template should contain: ###
  * a friendly title
  * few words of a warm feedback
  * fields {{theta}} and {{sem}} to be filled by the R syntax

It should look like that:
http://cambridgepsychometrics.com/~michal/concerto/item3.PNG

# Step 2: Add R code to the templates #

Well done, you've dealt with the graphical layout of your test. It is quite ugly, I know, but I assure you that your marketing staff, web designer, or son, could add a lot of style to it!

Below you will find the R code that you need to add to the buttons on the first and second templates. Edit your first template(the one with the introduction), go to the **R interaction** tab and enter the in the **R code to execute** field. (You already know how to do it, right? [Step-by-Step tutorial to make a simple test](http://code.google.com/p/concerto-platform/wiki/tutorial?ts=1318172928&updated=tutorial).)

You can just copy paste the code from this window but try to **READ IT AND UNDERSTAND** what is going on. You **need to change one thing only:** set the proper template id in the **set.next.template()** function. For instance, in the code assigned to the first template (Introduction) you should use this function to switch to the second template (Test Item). Feel free to modify the R code as you wish, just don't overdo it.

**Don't forget to save the template after each modification**

## R Code for the first template ##
```
### Define the stopping rules - they will be used later
max_items <- 15
min_sem <- 0.2

### Simulate the item parameters
ibsize <- 100 # size of the item bank to generate

### make up parameters
discrimination  <- sample(100:200, ibsize)/100   ## random values from 1.00 to 2.00
difficulty      <- sample(-200:200, ibsize)/100  ## random values from -2.00 to 2.00
guessing        <- sample(0,ibsize, replace=T) ## we use 2pl model so the guessing is always 0 
inattention     <- sample(1,ibsize, replace=T) ## 2pl model: inattention always 1

### simulate item contents(a + b =  response)
a <- sample(1:10, ibsize, replace = T)
b <- sample(1:10, ibsize, replace = T)
### compute correct responses
correct.response <- a+b

# merge parameters into itemBank
itemBank <- cbind(discrimination, difficulty, guessing, inattention)

# catR function: make an ItemBankObject needed in the nextItem() function
catBank<-createItemBank(itemBank, model="2pl")   

### CHOOSE THE STARTING ITEM
current_item <- order(abs(difficulty))[1]  ## choose the item with difficulty closest to 0

### Once you've chosen an item to show, you have to let HTML layer 
### know what it has to show. Set a and b variables to appropriate 
### content to be shown in the {{a}} and {{b}} fields
set.var("a", a[current_item])
set.var("b", b[current_item])

### DEFINE SOME VARIABLES FOR LATER
items<-current_item  #item history
responses<-NULL      #responses history

### Now, let's fill the fields you've added to the second template 
set.var("difficulty", difficulty[current_item])
set.var("discrimination", discrimination[current_item])
set.var("theta", "not available")
set.var("sem", "not available")

### Concerto function: Now select the second template 
### PUT SECOND TEMPLATE'S ID IN THE BRACKETS (you can find
### the ID on the template's list on the left)
set.next.template(ENTER ID OF THE NEXT TEMPLATE HERE)  
```

## R Code for the second template ##
```
### "response" variable is provided to R by HTML Layer
### (Remember the text field called "response"?)
### However, it comes as a string, better change it to number
response <- as.numeric(response)

### If user gave no response, set it to -99 
if (is.na(response)){response <- -99}

### add current response to the response history
responses<-c(responses, response)

### Make a vector of correct/incorrect responses (with 1 or 0 values) ### using response history and vector of correct responses
correct<-as.numeric(correct.response[items]==responses)

#### catR magic ####
# (1) select from the item bank only the items administered so far
it<-matrix(itemBank[items, ], nrow=length(items))

# estimate theta using thetaEst (catR) function
# it is the matrix of parameters of items that were administered so far
# correct is the vector with 0/1 values computed before 
# catBank is the ItemBankObject generated on the previous item
# other parameters are just defaults, check catR manual for details
theta<-thetaEst(it, correct, D=1, method="BM", priorDist="norm", priorPar=c(0,1), range=c(-4,4), parInt=c(-4,4,33)) 

# estimate sem using semTheta (catR) function
sem<- semTheta(theta, it, correct, D=1, method="BM", priorDist="norm", priorPar=c(0,1), parInt=c(-4,4,33))

# select next item using nextItem (catR) function
# note the [[1]] at the end of the function - it returns the whole list
# of parameters, and we just need one here
current_item <- nextItem(catBank, theta, out=as.numeric(items), x=NULL, criterion="MFI", method="BM", priorDist="norm", priorPar=c(0,1), D=1, range=c(-4,4), parInt=c(-4,4,33), infoType="observed")[[1]]

# and the newly selected item to the item history
items<-c(items, current_item)

#### send item content to the HTML layer
set.var("a", a[current_item])
set.var("b", b[current_item])

### Now, let's fill the fields you've added to the second template 
### format(x, digits=3) is used to make it look prettier
set.var("difficulty", difficulty[current_item])
set.var("discrimination", discrimination[current_item])
set.var("theta", format(theta, digits=3))
set.var("sem", format(sem, digits=3))

### STOPPING CONDITIONS 
### Simple: if length is higher than limit of items or sem is lower
### than a border value, set next template to the third 
###(feedback) template 
### note that max_items and min_sem were set in the code assigned
### to the button on the previous template 

if (length(items) > max_items || sem < min_sem) {
  set.next.template(---FEEDBACK TEMPLATE ID HERE----)
  }

```



# STEP 3: CHECK IT OUT! #

Double-check-list:
  * Are you sure that you saved both items after adding R code?
  * Have you modified set.next.template() function in both R code windows (for the first and second template?) and set a proper item id there?
  * Sitting comfortably?

Run the test - choose DEBUG (or RUN if you are 100% sure) from the drop down list next to your first item. Note that it won't work if you start from the second one!

