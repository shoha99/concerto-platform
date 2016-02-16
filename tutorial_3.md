# TUTORIAL: Add a fancy graph to your adaptive test #

This **short** tutorial is for those who have successfully finished the  [TUTORIAL: Create your first adaptive test with Concerto](tutorial_2.md) and want to see how to add a fancy graph to their test.

After you finish this tutorial your test should look like that:
  * **[Concerto v2.0 Simple Adaptive Test demo](http://dev.myiqtest.org/concerto/index.php?hash=004d269f4604dbc8058ae8384e6a239c)**

**This document is relevant to Concerto 2.0.2 and higher. If you use an older version, upgrade it.**

# Concept #
Here we show how to create a simple graph using the built in graphical capabilities of R


# Step 1: Edit the first (Introduction) template of the test #

**Note that in this tutorial we are editing templates created in the previous one ([Concerto v2.0 Simple Adaptive Test demo](http://dev.myiqtest.org/concerto/index.php?hash=004d269f4604dbc8058ae8384e6a239c)).**

Add the following R syntax at the end of the existing syntax. Try to READ AND UNDERSTAND IT.

```
## fancy graph function
plot_graph<-function(){
  
  ### set the working directory where the graph will be saved
  ### use the following for the demo installation of Concerto on our server
  ### IMPORTANT: this directory has to be visible from the web!
  setwd("/var/www/vhosts/dev.myiqtest.org/httpdocs/concerto/temp/")

  ### prepare the graph area
  ### x axis as long as max_items parameter (should be defined 
  ### earlier in this script - check the previous tutorial
  x_axis<-1:max_items

  ### y axis from -2 to 2... well, there must be a better way of 
  ### doing it. Any ideas?
  y_axis<-sample(c(-2,2),max_items, replace=T) 

  ### get 3 colors
  colors<-rainbow(3)

  ### Set the name for the graph
  ### IMPORTANT: each time the user clicks the file with the graph 
  ### has to change its name. Otherwise, the browser will not refresh
  ### the picture. The file with the graph will be called 
  ### SessionID_item.png
  ### where "SessionID" is the id of a current session and item is 
  ### the number of items already administered
  file.name<- paste(SessionID, "_", length(items), ".png", sep="")

  ### send the item name to HTML layer:
  set.var("image_source", file.name)

  ### set the output to the png file
  png(filename = file.name, width = 600, height = 450, pointsize = 12, res=80, bg = "white") #quality = 100,

  #### set up plot area
  plot(x_axis, y_axis, type="n", axes = F, xlab="responses", ylab="", frame.plot=F) 

  ### add axes
  axis(1, 1:max_items, pos=0)
  axis(2, -4:4/2, pos=0.8)
  
  ### add a title and subtitle 
  title("Sem, Theta, and Item Difficulty graph")

  ### add a legend 
  legend(1, 2, c("SEM", "THETA", "DIFFICULTY"), cex=0.8, col=colors, pch=1:3, lty=1:3,  bty="n", horiz =T)

  ### PLOT LINES
  lines(1:length(items), xsem, type="b", lwd=3, lty=1, col=colors[1], pch=1) 
  lines(1:length(items), xtheta, type="b", lwd=3, lty=2, col=colors[2], pch=2)
  lines(1:length(items), difficulty[items], type="b", lwd=3, lty=3, col=colors[3], pch=3)

  ### close the connection to the png file 
  dev.off()
#### END OF THE plot_graph FUNCTION
}

### Add variables to store theta and sem history
xtheta<-NA     #define theta history
xsem<-NA       #define sem history

### run the function
plot_graph()
```

**Save the first template**

# Step 2: Edit the second template of the test #

Now edit the second template of your test. Add the image by clicking on the add image icon, set its URL to:
```
http://dev.myiqtest.org/concerto/temp/{{image_source}}
```
Note that {{image\_source}} variable will be sent to HTML layer by R syntax. Set width to 600 and height to 450 (this was the size defined for the image in the R syntax).

http://cambridgepsychometrics.com/~michal/concerto/add_image.PNG

Go to the **R interaction Tab** and add this piece of code at the end of the existing one:

```
## update theta and sem history
xtheta<-c(xtheta,theta)
xsem<-c(xsem,sem)

## plot, baby!
plot_graph()
```


# Check it out. Works for me! #