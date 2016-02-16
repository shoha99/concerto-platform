# writing and debugging Concerto test logic code #

## general description ##

Most of your time in developing tests will be spent on the "test" tab in Concerto panel, writing your test logic R code. Concerto comes with few built in tools that should simplify the process of writing R code for you.


---


## code auto-complete ##

![http://concerto.e-psychometrics.com/demo/wiki/debug_autocomplete.png](http://concerto.e-psychometrics.com/demo/wiki/debug_autocomplete.png)

When the test logic R code has focus (is active), you can use code auto-complete feature. To activate it you need to write at least one letter and press **Ctrl+Space**. You can write more characters and then press **Ctrl+Space** which will result in auto-complete tool showing you all functions that start with the entered characters.

From within the auto-complete tool you can add selected functions to the list of your favourite functions or use function wizard to insert the function into your test logic code.


---


## function wizard ##

![http://concerto.e-psychometrics.com/demo/wiki/debug_function_wizard.png](http://concerto.e-psychometrics.com/demo/wiki/debug_function_wizard.png)

Function wizards simplify the process of inserting function call code by presenting to you a window with function description, possible parameters with their explanation and let's you enter argument values (with default values already entered).


---


## debug ##

Differences between regular session and debug session:

  * there is no serialization process in debug session, when debug session times out, it will be deleted
  * in debug session the code is sent to R session line by line and after each line the results are printed to the user
  * in debug session there are two browser windows/tabs open: one for the test output (test participant perspective) and one for the debugging the test (Concerto panel window)

![http://concerto.e-psychometrics.com/demo/wiki/debug_starting.png](http://concerto.e-psychometrics.com/demo/wiki/debug_starting.png)

To start debugging test logic R code, click **begin** button located in the test session state. Next to the button you will see current debug session state. You can stop the session anytime by pressing the **stop** button. Test logic code will be in read-only mode while debugging is started. Any output inserted in debug session to your R logic will be removed after stopping the debug session.

This is the example how your R logic code might look like when the test output is inserted into it:

![http://concerto.e-psychometrics.com/demo/wiki/debug_output.png](http://concerto.e-psychometrics.com/demo/wiki/debug_output.png)

After each line it's output will be inserted below the line that produced it. Yellow colour highlights regular output and red colour highlights error output. As you can see at the end of the test logic there was an error.

Please take a look at the **test session state** now:

![http://concerto.e-psychometrics.com/demo/wiki/debug_state_finished.png](http://concerto.e-psychometrics.com/demo/wiki/debug_state_finished.png)

it shows that there was an error and tells us what is the session state (current variables and their values) at this moment.