# Running a Concerto test #

There are four mechanisms in Concerto that allows users to run a test.

The URL for test run environment is exactly the same as your Concerto installation path.


---


## running the test directly using the URL paramaters ##

Lets assume that **`http://domain.com/`** is the URL for your test environment and you have a test with id #1 created in the workspace with id #2. You can use:

**`http://domain.com/?wid=2&tid=1`**

as the direct link to your test. You can give it to anyone and he or she will be able to run your test.

**`?`** - question mark means we are starting declaration of URL parametes

**`wid=2`** - means that the first variable we declare is named **`wid`** and we set its value to **`2`**, **`wid`** stands for **workspace id**

**`&`** - the ampersand means that we want to declare additional parameters

**`tid=1`** - and it is a variable named **`tid`** with it's value set to **`1`**, **`tid`** stands for **test id**

If your test supports any additional parameters passed by the URL you can declare them after **`wid`** and **`tid`** parameters. If for example you would like to add an additional variable named **`var1`** and set it's value to **"example"** you would use the following URL:

**`http://domain.com/?wid=2&tid=1&var1=example`**


---


## selecting a test from the tests declared as open to public ##

![http://concerto.e-psychometrics.com/demo/wiki/test_run_env_test_selection.png](http://concerto.e-psychometrics.com/demo/wiki/test_run_env_test_selection.png)

Lets assume that **`http://domain.com/`** is the URL for your test environment. If you enter this address directly without any URL parameters, you will see the test selection box. Only tests declared as **open to public** will be available here. After selecting the test you wish to run it will automatically start.


---


## resuming ongoing test session ##

![http://concerto.e-psychometrics.com/demo/wiki/test_run_env_session_resuming.png](http://concerto.e-psychometrics.com/demo/wiki/test_run_env_session_resuming.png)

If you have any ongoing test sessions (sessions where you didn't finish the test) and you choose to run the same test again, you will be prompted with the above dialogue box. You can choose to either resume the previous session or start a new one. Only the last session of each test you participate in will be remembered. When you choose to start new session it will overwrite the previous session for that specific test.


---


## manual session resuming ##

You can also manually resume an ongoing session by passing following URL parameters: **`wid, sid, hash`** , where:

  * **`wid`** stands for workspace id
  * **`sid`** stands for session id
  * **`hash`** stands for session hash

**YOU SHOULD PROBABLY NEVER USE THIS METHOD IF YOU DON'T KNOW WHAT YOU'RE DOING. YOU SHOULD USE ONE OF THE ABOVE METHODS INSTEAD.**