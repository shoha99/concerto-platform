.
# Concerto v3.0 Tutorials: Randomising test items #

This tutorial explains how to create a test in which the items are presented in random order.

It is assumed that you are familiar with the **[Concerto v3.0 Tutorials: Create a simple test](http://code.google.com/p/concerto-platform/wiki/Concerto3SimpleTest)** section and are familiar with the basic functions of Concerto v3.0 (**[Concerto v3.0 Tutorials: General Manual](http://code.google.com/p/concerto-platform/wiki/Concerto3Tabs)**).

**Note:**
  * This document is relevant to Concerto v3.0. If you use an older version, please upgrade it (or else refer to relevant tutorials).
  * You may experience some problems while using different browsers. Currently, it is best to use Google Chrome to run the administration panel.

.

### Constructing test logic sections for randomisation ###


Randomisation can be achieved by using the R command sample _(a:b,c)_ which gives a randomized sequence of _c_ numbers from _a_ to _b_.  After setting variable _d_ with this R code, each element can be called in with _d[e](e.md)_ which refers to the _e\_th number in the sequence_d_._

In the example below, a randomized sequence of 6 numbers from 1 to 6 is generated, and each of them is assigned to the id sequence from 1 to 6 (_see Picture 1 below_).

![http://cambridgepsychometrics.com/vaishali/mini/random/pic1.jpg](http://cambridgepsychometrics.com/vaishali/mini/random/pic1.jpg)


By this means, the six response options can be randomly presented on the template with corresponding html codes given to the six buttons (_see Picture 2 below_).

![http://cambridgepsychometrics.com/vaishali/mini/random/pic2.jpg](http://cambridgepsychometrics.com/vaishali/mini/random/pic2.jpg)


_Picture 3_ (below) shows the table with the prepared html and id.

![http://cambridgepsychometrics.com/vaishali/mini/random/pic3.jpg](http://cambridgepsychometrics.com/vaishali/mini/random/pic3.jpg)