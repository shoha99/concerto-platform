# 'tests' tab #

## general description ##

On this tab you can create new tests and edit or delete existing ones. This is the centre of the entire panel. After creating a test, users will come back here to monitor error logs of the specific test.


---


## main form ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_form.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_form.png)

You can set the following test properties on the test tab main form:

  * **name** - name of the test
  * **type** (visible in **advanced view**) - test type, can be set to: **subtest** (can only be run from inside of another test), **regular** (can be run directly by URL address), **featured** (can be run directly and it can also be chosen to run from the entry page of your Concerto instance)


---


## test logs ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_logs.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_logs.png)

After creating the test and sharing it with test participants, you can monitor any problems that may be encountered. Any problems related to the test logic (**R**) or test templates (**javascript**) will be recorded here so you can eliminate it later.

Each error log will contain the following information:

  * **date** - date when the error occured
  * **type** - type of error, either **R** or **javascript**
  * **message** - error message describing the problem encountered
  * **browser** - test participant browser header
  * **IP** - test participant IP address


---


## test input and output variables ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_variables.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_variables.png)

Declare test input parameters and return variables here.

#### Input parameters ####

Input parameters are used to declare available URL parameters to pass to a test. If no input parameters are declared then no URL parameters are allowed to be passed. When declared on a nested test (test that is run inside another test by using **`concerto.test.run`** function from Concerto package), they are the only available variables that can be passed in **`params`** named list argument.

#### Output variables ####

Variables declared here will form a return value of **`concerto.test.run`** (used to run test inside another test) function from Concerto package. The return type will be named list formed from variables declared as output variables. Return variables are also saved for all completed sessions and can be used later by **Concerto remote client** or any other external application.


---


## test logic ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_logic.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_logic.png)

The test logic is written in R code. You can use any R code you wish. Whatever R package you have installed on your system can be used in Concerto test logic code. Concerto comes with its own R package named **`concerto`** whose functions can also be used here. This section is the most important part of the whole Concerto panel as this is where you declare how the test should work.

When you start test debugging, your test logic R code will be interpreted line by line and any output produced by R will be inserted below the line of code that produced it.

To simplify the process of writing R code, every function available in your R can be written using the Concerto function wizard. To start the function wizard for a specific function you have to start the auto-completion tool, select the function of your choice and press **Ctrl+Enter** or use **function toolbar** at the bottom left corner of your screen.

You can use the following key commands when the test logic R code has focus:

  * **Ctrl+Space** - code auto-completion, shows all available functions starting with the characters you entered before pressing Ctrl+Space
  * **F2** - auto-format selected code
  * **F11** - full screen code editor mode


---


## test session state ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_session_state.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_session_state.png)

Used for test debugging. At the top it contains current debug session state information and two buttons for starting and stopping the debug session. During an ongoing debug session, test logic code will go into read only mode. After stopping the debug session it will be editable again.

Test session state shows R logic session state. It will show any variable which is currently declared in your test session and it's value.


---


## test session output ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_session_output.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_session_output.png)

Used for test debugging. It will show you your test logic output.


---


## function toolbar ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_test_function_toolbar.png](http://concerto.e-psychometrics.com/demo/wiki/panel_test_function_toolbar.png)

It contains all Concerto functions from **`concerto`** R package in one place, ready to be inserted into your test logic code as a function wizard. It also contains all functions you added to your **favourite functions**. You can remove any function previously added to favourites from here. You can get full R documentation of any function listed here by clicking the question mark icon next to the selected function.