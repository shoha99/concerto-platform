# displaying dynamic content on HTML templates #

## general description ##

Concerto tests are very flexible. You can insert any dynamic content into specific sections on the HTML template at run time. That is why Concerto pages are called HTML templates. We can imagine situations where a test uses only one HTML template but changes it's content depending on the current test session state.


---


## declaring dynamic content on HTML templates ##

![http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_content_html.png](http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_content_html.png)

As you can see in the example above we created a very simple HTML template. What is interesting in it is **` {{username}} `** string in the template header and **` {{questions}} `** string in the template middle section.

By using double curly brackets: **` {{something}} `**, we declare that this is the place where we want to insert some dynamic content at a run time. This section will later be referred to by the name that is located within double brackets. The template is ready for dynamic content. Now let's take a look at how to insert any variable value into sections in the test logic.


---


## inserting dynamic content to HTML templates in test logic ##

  * Open **function toolbar**
![http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey1_28.png](http://concerto.e-psychometrics.com/demo/wiki/tutorial_survey1_28.png)

  * Click to insert **`concerto.template.show`** function wizard
![http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_cts_html.png](http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_cts_html.png)

  * We need to fill two arguments: **`templateID`** - id of the template we previously created and **`params`** - named list with the values of dynamic content. Other parameters can be left with default values.
![http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_cts_wizard.png](http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_cts_wizard.png)

  * Take a look at the example of passing dynamic content to HTML template. **`params`** parameter is now set to a named list with two arguments: **`username`** which will take value of the **`name_of_logged_user`** variable from test session and **`questions`** which will be filled with value of variable named **`question_list`**.
![http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_cts_wizard_params.png](http://concerto.e-psychometrics.com/demo/wiki/template_dynamic_cts_wizard_params.png)

That's it! The section in HTML template declared as a dynamic content will now be filled with selected variable values.