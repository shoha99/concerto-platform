.
# Concerto v3.0 Tutorials: Preventing 'no response' situations #

This tutorial explains how to prevent test takers from skipping items or missing questions, for one reason or the other. Essentially, you are making the items mandatory to avoid missing and, hence, biased data.

It is assumed that you are familiar with the **[Concerto v3.0 Tutorials: Create a simple test](http://code.google.com/p/concerto-platform/wiki/Concerto3SimpleTest)** section and are familiar with the basic functions of Concerto v3.0 (**[Concerto v3.0 Tutorials: General Manual](http://code.google.com/p/concerto-platform/wiki/Concerto3Tabs)**).

**Note:**
  * This document is relevant to Concerto v3.0. If you use an older version, please upgrade it (or else refer to relevant tutorials).
  * You may experience some problems while using different browsers. Currently, it is best to use Google Chrome to run the administration panel.

.
## Creating a loop ##
The basic concept here is to loop the test logic sections such that the testee is presented with the same item page until he/she responds. In many cases, this merely involves the addition of a few conditional statements. The conditional statements specify that IF no response is selected/given THEN the same question should be presented.

It is important to note that the test section used to create the loop should be inserted following the section that loads the item template.

.

### Radio Buttons in Concerto v3 ###

When no option is selected from a group of radio buttons (with similar names but different values), the response is validated as NA in R and "NA" (string) in HTML/MySQL by default. i.e. this makes our life easier since we do not have to _set variable_ as NA or -9999 for missing data.

The only step is to create a loop with the help of a conditional 'IF' statement (see picture below). The condition specifies that if the value of the radio button does not exist (i.e. is NA), then the same item should be presented.

| **SECTION TYPE** | **DETAILS** |
|:-----------------|:------------|
| IF statement     | IF **is.na(radio1)** - **equal** - **T**  THEN **GO TO SECTION** - _8.load HTML template_ (this is the section in your test where the items template is loaded) |

.

![http://cambridgepsychometrics.com/vaishali/mini/noresp3.jpg](http://cambridgepsychometrics.com/vaishali/mini/noresp3.jpg)

.

### Dialogue Boxes in Concerto v3 ###

When no response is given and a dialogue box is left empty, the response is validated as "" (an empty string), rather than NA. This changes the looping method slightly, compared to radio buttons.

In the section below, the condition ensures that an empty dialogue box (no response) will bring the testee back to the same item, while preventing non-numeric responses (typing errors or intentional attempts at skipping items!). In order to ensure non-numeric responses, please ensure that **response** is returned as **numeric** in the test item template preceding this looping section.


| **SECTION TYPE** | **DETAILS** |
|:-----------------|:------------|
| IF statement     | IF **is.na(response)** - **equal** - **1** THEN **GO TO SECTION** - _14.load HTML template_ (this is the section in your test where the items template is loaded) |

.

![http://cambridgepsychometrics.com/vaishali/mini/noresp.jpg](http://cambridgepsychometrics.com/vaishali/mini/noresp.jpg)