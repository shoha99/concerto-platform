# Concerto test session resuming #

## problem ##

Every Concerto platform instance has a set time length that a test session can be idle. It is 300 seconds (5 minutes) by default. When the test session is idle longer than that it will be closed. This action is required as every test session launches it's own R session process which takes some system resources. However before the session is closed, it saves the R session state to the file (this process will be later referenced as a **serialization**) and it can be later restored (**unserialized**). Test creators who want to implement session resuming (after the maximum idle time has been reached) need to write some additional code for it in the test logic.

**PLEASE KEEP IN MIND THAT IT IS NOT REQUIRED TO IMPLEMENT SESSION RESUMING AFTER MAXIMUM IDLE TIME!**

## serialization process ##

  1. max idle time for test session is reached
  1. if **`onSerialize`** function exists it will be called
  1. R session state is saved (functions, variables, etc)
  1. R session is closed

## unserialization process ##

  1. user continues the test after the maximum idle time has been reached
  1. R session is opened
  1. R session state is restored
  1. if **`onUnserialize`** function exists it will be called
  1. test logic code starts from the beginning

## solution ##

Users that want to make session resuming possible after the maximum idle time is reached need to implement some additional code in their test logic.

The simplest solution would be to implement some kind of additional variable (let's call it **`session_position`**) and **`onUnserialize`** event handler function. Take a look at the example below:

```r

# onUnserialize function will be called automatically whenever test session will get unserialized.
# It accepts "lastReturn" argument which is named list with the variables
# submitted from HTML template on which test session has been serialized.
onUnserialize <- function(lastReturn){
response <<- lastReturn
}

if(!exists("session_position")){
# insert ini code
session_position <- 1
response <- concerto.template.show(1)
}
if(session_position==1){
# insert template #1 response processing code here
session_position <- 2
response <- concerto.template.show(2)
}
if(session_position==2){
# insert template #2 response processing code here
session_position <- 3
response <- concerto.template.show(3)
}
```