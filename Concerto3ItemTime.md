.
# Concerto v3.0 Tutorials: Timed presentation of items #

This tutorial explains how to create a test in which the items are presented for a specified amount of time. For example, if you want to present the stimulus item (a picture) for 3 seconds exactly, following which the picture disappears but leaves the test taker with the response options.

This manipulation will help with the test setting, so that participants will get prepared before the presentation and have a limited time window to view the image, which could be critical for psychology experiments.

It is assumed that you are familiar with the **[Concerto v3.0 Tutorials: Create a simple test](http://code.google.com/p/concerto-platform/wiki/Concerto3SimpleTest)** section and are familiar with the basic functions of Concerto v3.0 (**[Concerto v3.0 Tutorials: General manual](http://code.google.com/p/concerto-platform/wiki/Concerto3Tabs)**).

**Note:**
  * This document is relevant to Concerto v3.0. If you use an older version, please upgrade it (or else refer to relevant tutorials).
  * You may experience some problems while using different browsers. Currently, it is best to use Google Chrome to run the administration panel.

.

### Adding javascript code to HTML templates ###

You may want to time your presentation and manipulate the showing sequence. Currently we don’t have a built-in function to achieve this effect. However, by adding a few lines of Java script, you can easily make your presentation dynamic!

For instance, in the example below, two time points are defined:
  * 1, at which point the image (‘img’) is shown, and
  * 2, when the ‘img’ will disappear

With these several lines of code at the beginning of the HTML source, the template will only show the image for 3 seconds (from 200 ms to 3200 ms), while leaving the remaining objects intact on the screen for the whole period.

**Note:** the first few lines clear the previous timing, in order to start a new timing for each presentation.





&lt;script&gt;



$(function(){

try{

clearTimeout(t1);

clearTimeout(t2);

}

catch(err){

}

$('img').hide();

t1 = setTimeout("$('img').show()",200);

t2 = setTimeout("$('img').hide()",3200);

});



&lt;/script&gt;



.