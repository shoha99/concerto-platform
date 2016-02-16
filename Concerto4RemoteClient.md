# Concerto remote test run environment #

## general idea ##

The general idea of **Concerto remote test run environment** is to make it possible to insert Concerto tests hosted on remote servers into external websites.

It means that in practice there can be a Concerto server located somewhere in the world and though your website is located on a remote host you can still run the tests from that server as if the Concerto instance was installed on the same host as your website.


---


## the package ##

Concerto has a dedicated package just for that. Here is the structure of the package:

  * **/css** - directory with images and css files
  * **/nusoap** - directory with PHP class for creating and consuming web services ( http://sourceforge.net/projects/nusoap/ )
  * **/Compatibility.js** - javascript compatibility file for IE
  * **/Concerto.js** - javascript Concerto class
  * **/concerto.jquery.js** - jQuery Concerto plugin
  * **/concerto\_client.php** - Concerto web service consumer
  * **/jquery-1.9.1.min.js** - jQuery library
  * **/jquery-ui-1.10.1.custom.min.js** - jQuery UI library
  * **/jquery.json-2.3.min.js** - jQuery JSON plugin
  * **/moment.js** - javascript time formatter plugin
  * **/QTI.js** - Concerto javascript QTI class
  * **/SETTINGS.php** - setting file for Concerto remote test run environment


---


## installation ##

  1. download the package
  1. extract it's contents to the directory located inside your website root folder
  1. link following CSS files in your HTML **head tag**:
    * **`<link rel="stylesheet" href="css/QTI.css" />`**
    * **`<link rel="stylesheet" href="css/jQueryUI/cupertino/jquery-ui-1.10.1.custom.min.css" />`** - you can ignore this if you have full jQuery UI CSS linked with this version or higher
  1. include following JS file in your HTML **head tag**:
    * **`<script type="text/javascript" src="jquery-1.9.1.min.js"></script>`** - you can ignore this if you already have jQuery with this version or higher included
    * **`<script type="text/javascript" src="jquery.json-2.3.min.js"></script>`**
    * **`<script type="text/javascript" src="jquery-ui-1.10.1.custom.min.js"></script>`** - you can ignore this if you already have full jQuery UI with this version or higher included
    * **`<script type="text/javascript" src="Compatibility.js"></script>`**
    * **`<script type="text/javascript" src="moment.js"></script>`**
    * **`<script type="text/javascript" src="Concerto.js"></script>`**
    * **`<script type="text/javascript" src="QTI.js"></script>`**
    * **`<script type="text/javascript" src="concerto.jquery.js"></script>`**
  1. edit **/SETTINGS.php** file and set two variables:
    * **$ws\_url** - URL to Concerto server test run environment (must and with slash)
    * **$ws\_password** - password for remote access to Concerto server


---


## usage ##

Now you can just use this javascript code somewhere on your website:

**`$(selector).concerto(options);`**

... where **`selector`** is jQuery selector, for the test container, e.g.:

**`$("#divTest").concerto(options);`**

... means that we want to place the contents of the test inside container with id **divTest** on your HTML. The second variable **`options`** is required options object you want to pass to Concerto object. It contains the following fields:

| **name** | **description** | **default** | **example** |
|:---------|:----------------|:------------|:------------|
| workspaceID | specifies id of the workspace you want to run the test from | null        | 1           |
| testID   | specifies id of the test you want to run | null        | 1           |
| sessionID | specifies id of the session you want to resume | null        | 1           |
| sessionHash | specifies hash of the session you want to resume | null        | 1af3577e1445c4c35ff3cabd0a36255a |
| params   | object containing additional parameters you want to pass to the test, it's the same as adding additional URL parameters when running the test through regular test run environment | { }         | { var1: 128, var2:'concerto' } |
| WSPath   | path to **/concerto\_client.php** file from the package | "client/concerto\_client.php" | "client/concerto\_client.php" |
| loadingImageSource | source of the default loading image used in transitions between test HTML templates | null        | "image/loading.png" |
| callback | to be called whenever there is response received from Concerto server | function(response) { } | function(response) { alert('response received'); } |
| resumeFromLastTemplate | used only when resuming session, if set to true it will just show the last template shown in the session and will wait for user input | false       | false       |

One option from the table needs some more explanation. It's the **`callback`** option. You should set it's value to a function accepting **`response`** object as a argument. The argument object will contain data returned from the Concerto server.

Here are couple of fields from **`response.data`** object with it's possible usage:

| **name** | **description** | **usage** |
|:---------|:----------------|:----------|
| TEST\_SESSION\_ID | unique test session id | can be stored by remote website to implement session resuming mechanism |
| HASH     | test session hash | can be stored by remote website to implement session resuming mechanism |
| FINISHED | is 1 if session is finished or 0 if session is ongoing | can be used in custom session resuming mechanism to mark session as not resumable |

### full example ###

```

$(function(){
$("#divTest").concerto({
workspaceID:1,
testID:1,
callback:function(response){
if(response.data.FINISHED==1) alert("test is finished");
}
});
});
```


---


## limitations ##

There is no built in session resuming mechanism. You have to implement your own. It can be achieved by using **`workspaceID`**, **`testID`**, **`response.data.TEST_SESSION_ID`**, **`response.data.HASH`** and **`response.data.FINISHED`** variables.