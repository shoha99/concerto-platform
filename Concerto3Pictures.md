.
# Concerto v3.0 Tutorials: Inserting pictures, audio & video clips into a test #

This tutorial explains how to insert pictures to your test, for aesthetic purposes, as items or otherwise.

It is assumed that you are familiar with the **[Concerto v3.0 Tutorials: Create a simple test](http://code.google.com/p/concerto-platform/wiki/Concerto3SimpleTest)** section and are familiar with the basic functions of Concerto v3.0 (**[Concerto v3.0 Tutorials: General Manual](http://code.google.com/p/concerto-platform/wiki/Concerto3Tabs)**).

**Note:**
  * This document is relevant to Concerto v3.0. If you use an older version, please upgrade it (or else refer to relevant tutorials).
  * You may experience some problems while using different browsers. Currently, it is best to use Google Chrome to run the administration panel.

.
## Uploading Files to the Host Server ##

An essential part of setting up web pages is its publication. This includes uploading related files (pictures etc.) to the host server where the web page is likely to be located. More specifically, an FTP program is used for this purpose. In the case of a test, images and clips need to be uploaded to a publicly (www) accessible directory. Thus, the first step is to get an FTP account with a public access directory and upload the relevant files.

.

## Inserting Images Using Image Icon ##

The best way to insert images is to do so directly using the toolbar in the templates tab. Click the _image_ icon ![http://cambridgepsychometrics.com/vaishali/mini/img_btn.jpg](http://cambridgepsychometrics.com/vaishali/mini/img_btn.jpg) and enter relevant details as shown below.

URL: _www location of your uploaded files_

Alternative Text: _Brief description of image_

Width, Height, Border, HSpace, VSpace, Align: _size, position etc._

You can preview your image as you type the specifications. Click OK to insert image into the HTML template.
.

![http://cambridgepsychometrics.com/vaishali/mini/img_prop.jpg](http://cambridgepsychometrics.com/vaishali/mini/img_prop.jpg)

.

## Insert Audio & Video Clips Using Link Icon ##
Inserting audio and video clips can be done via the _link_ icon ![http://cambridgepsychometrics.com/vaishali/mini/link_btn.jpg](http://cambridgepsychometrics.com/vaishali/mini/link_btn.jpg) on the toolbar. Specify the details of the link as shown below. Further, you can also set the _target_ such that the video/audio clip opens in the same window or pop-up window etc. You can embed the link in text or an icon image by selecting the text/image and then clicking the _link icon_.

.

![http://cambridgepsychometrics.com/vaishali/mini/link_prop.jpg](http://cambridgepsychometrics.com/vaishali/mini/link_prop.jpg)

.

## Inserting Images & Clips via the Source ##
Another way of adding interesting elements to your test is by directly inserting HTML code into the source of the template.

![http://cambridgepsychometrics.com/vaishali/mini/source_btn.jpg](http://cambridgepsychometrics.com/vaishali/mini/source_btn.jpg) - Click the _source_ icon in the toolbar to view/edit the HTML code.


For example, pasting the following code into the source page will add background music to your test page.



&lt;embed autostart="true" hidden="true" loop="false" src="http://cambridgepsychometrics.com/~abcde/Nara.mp3"&gt;



&lt;/embed&gt;



The following HTML code will embed an audio clip with audio controls on the test page.



&lt;audio controls="controls"&gt;



&lt;source src="http://cambridgepsychometrics.com/~abcde/Nara.mp3" type="audio/mpeg"&gt;



&lt;/source&gt;



&lt;/audio&gt;



The _src_ attribute has to be necessarily modified (substitute the url of your audio clip). The other attributes in the code can be modified to suit your needs. _autostart_ indicates whether the song file should start playing automatically or not. _hidden_ indicates whether the media player is hidden or not. _loop_ indicates whether the clip should be repeated.

.

## Inserting Images & Clips from Tables ##
If the items on your test are images, audio clips or video clips, create a table of items that consists of the images/clips.

For example:

  1. Add a column with **name = questions** and **type = HTML**
  1. Click within the cell to add data. You will be presented with a changing HTML pop-up window. Click the **source** button and insert the HTML code for your image (as described previously). You can also paste your image in the HTML description box, if you prefer not to deal with the **source code**. Click **change** and **save** the table.
  1. Proceed to construct your HTML templates with relevant inserts and set variables in the test logic section.
> _If you are not sure of this process, please go through our [simple test tutorial](Concerto3SimpleTest.md)._