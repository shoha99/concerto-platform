# 'HTML templates' tab #

## general description ##

You can declare your test presentation layer here. Every page displayed in a Concerto test is declared as a HTML template. You can use HTML to declare your document structure, Cascading Style Sheets (CSS) to style your document and javascript if you want to add some life to it. It's also possible to append something to **`head`** tag of the **Concerto run test environment**.

To create your item templates you will be using WYSIWYG (What You See Is What You Get) HTML editor - **CKEditor**.

You can insert content to your templates dynamically at the runtime by inserting **` {{variable_name}} `** and later when the template will be used by your test you can replace it with any variable value from your test session.


---


## main form ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_template_form.png](http://concerto.e-psychometrics.com/demo/wiki/panel_template_form.png)

You can set the following test properties on HTML templates tab main form:

  * **name** - name of the template

At the top of the main form header there is an icon to change template description. This description will be later visible when hovering over question mark icon next to selected template in the 'HTML templates' tab list view.


---


## template transition effects ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_template_transitions.png](http://concerto.e-psychometrics.com/demo/wiki/panel_template_transitions.png)

This section is only available in advanced view.

Here you can define what kind of transition effect you would like to use when the template is about to be shown and when it is about to be hidden. Possible options are:

  * blind
  * clip
  * drop
  * explode
  * fade
  * fold
  * puff
  * slide
  * scale

You can declare separate effects for template appearance and disappearance. Every effect has also it's own detailed properties which can be changed according to your preferences.


---


## HTML source code ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_template_source.png](http://concerto.e-psychometrics.com/demo/wiki/panel_template_source.png)

This is where you declare how the template should look. You can use the graphical editor for it or switch to source code mode if you're more familiar with the HTML code. This section consists of two elements:

  * **HTML head tag** - anything entered here will be appended to Concerto run environment document head tag
  * **HTML** - to design how the template should look like