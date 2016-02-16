.
# Concerto v3.0 Tutorials: Multilingual tests #

This tutorial explains how to create a test that can be taken in multiple languages. For example, test takers can select whether they would like to take a test in English, German, Tamil or any other language of your choice. The only key is that you will need to be able to translate the items! :) _Please note that the example test shown here is very simple and has no correct/wrong responses or feedback etc. The test just shows you the multi-language feature._

It is assumed that you are familiar with the **[Concerto v3.0 Tutorials: Create a simple test](http://code.google.com/p/concerto-platform/wiki/Concerto3SimpleTest)** section and are familiar with the basic functions of Concerto v3.0 (**[Concerto v3.0 Tutorials: General Manual](http://code.google.com/p/concerto-platform/wiki/Concerto3Tabs)**).

**Note:**
  * This document is relevant to Concerto v3.0. If you use an older version, please upgrade it (or else refer to relevant tutorials).
  * You may experience some problems while using different browsers. Currently, it is best to use Google Chrome to run the administration panel.

.

### Creating an Item Bank in Multiple Languages ###
The only difference here is to create separate columns for each language. i.e. If you want to present your test in English and French, you need separate columns for English and French items (ensuring that translations of each item are in the same row!).

![http://cambridgepsychometrics.com/vaishali/mini/language/table.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/table.jpg)

.

### HTML Template with Multi-language Options ###

In order to allow test users to select the language of their choice, you need to include a selection field with relevant language options, in one of your introductory templates.

![http://cambridgepsychometrics.com/vaishali/mini/language/sel_field.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/sel_field.jpg)

![http://cambridgepsychometrics.com/vaishali/mini/language/temp1.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/temp1.jpg)

![http://cambridgepsychometrics.com/vaishali/mini/language/temp2.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/temp2.jpg)

![http://cambridgepsychometrics.com/vaishali/mini/language/temp3.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/temp3.jpg)

.

### Creating Test Logic Sections ###

The test structure will change slightly, from language-specific tests, to allow for the language conditions. IF a person selects English, then the question variable should be set to extract information from the English column in the table. If a person selects French, then the question variable should be set to use information from the French column of the same table. In essence, it is just a few conditional IF statements. Please see below for the entire test structure of a basic test:

![http://cambridgepsychometrics.com/vaishali/mini/language/test1.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/test1.jpg)

![http://cambridgepsychometrics.com/vaishali/mini/language/test2.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/test2.jpg)

![http://cambridgepsychometrics.com/vaishali/mini/language/test3.jpg](http://cambridgepsychometrics.com/vaishali/mini/language/test3.jpg)