# Concerto panel #


---


## general description ##

The Concerto panel is the content management system and administration panel for the entire platform (your installation only). This is where you can create new tests, edit your HTML templates, browse your data tables or just add new users who can access the panel. The Concerto panel is available at **<your installation URL>/cms** URL and only registered and authorized Concerto users have access to the panel.


The Concerto panel is divided into the following sections:

  * panel header
  * panel tab menu
    * tests tab
      * list view
      * form view
    * QTI tab
      * list view
      * form view
    * HTML templates tab
      * list view
      * form view
    * tables tab
      * list view
      * form view
    * users tab
      * list view
      * form view
  * panel footer

In the following picture we can see the Concerto panel with the 'tests tab' selected on list view:

![http://concerto.e-psychometrics.com/demo/wiki/panel.png](http://concerto.e-psychometrics.com/demo/wiki/panel.png)


---


### panel header ###

![http://concerto.e-psychometrics.com/demo/wiki/panel_header.png](http://concerto.e-psychometrics.com/demo/wiki/panel_header.png)

As the name implies, the header is located at the top of the panel and always visible. Starting from the left, it contains the following elements:

  * **version information** - shows the current version of your installation
  * **latest version check result** - shows if your instance is the latest version available
  * **logged user information** - shows login name, first name and last name of current user
  * **logout button** - allows you to log out of the system
  * **language selection menu** - allows you to change the language of the panel user interface
  * **view switch** - you can switch here between a simple view, in which advanced options will be hidden, and an advanced view, with full functionality.


---


### panel tab menu ###

![http://concerto.e-psychometrics.com/demo/wiki/panel_tab_menu.png](http://concerto.e-psychometrics.com/demo/wiki/panel_tab_menu.png)

Located just below the panel header, the panel tab menu contains:

  * **tab menu options** - you can choose tab contents here:
    * tests tab
    * QTI tab
    * HTML templates tab
    * tables tab
    * users tab
  * **workspace selector** - you can switch/change your current workspace


---


### panel tab view switcher ###

![http://concerto.e-psychometrics.com/demo/wiki/panel_tab_view_switcher.png](http://concerto.e-psychometrics.com/demo/wiki/panel_tab_view_switcher.png)

Located inside every tab. It allows you to switch between:

  * **list of available objects** - switch to tab list view
  * **currently selected object** - switch to tab form view (if there is any object selected)


---


### panel tab list view ###

![http://concerto.e-psychometrics.com/demo/wiki/panel_tab_list_view.png](http://concerto.e-psychometrics.com/demo/wiki/panel_tab_list_view.png)

Here you can see all available objects from a specific tab in your currently selected workspace. Starting from the top, we have:

  * **multi select options**:
    * **'check all' button** - checks all objects on current list page
    * **'uncheck all' button** - unchecks all objects on current list page
    * **currently checked object counter** - shows total number of currently checked objects
    * **'delete checked' button** - deletes currently checked objects
    * **'export checked' button** - exports currently checked objects
  * **object addition options**:
    * **'add new object' button** - launches a form to create new object
    * **'import new object' button** - choose the [export](Concerto.md) file you want to import as a new object
    * **'download from online library' button** - choose the object you wish to download from the online library
  * **list column headers options** - sort, group, filter and choose which columns you want displayed
  * **object records** - divided into varied number of columns (depends on the tab we are on) and contains four common columns available on every tab:
    * **check** - manually check objects for **multi select options** above
    * **info** - short description of the object, available on mouse hovering over the question mark icon
    * **id** - object unique id number
    * **action icons** - it's the last column and it contains action button that you can perform on specific object:
      * **edit** - switch to selected object **form view**
      * **delete** - removes selected object
      * **export** - exports selected object into the file (options is not available in users tab)
      * **upload to online library** - uploads selected object to online library (option is not available in users tab)
  * **paging options and refresh table button**


---


### panel form view ###

Each tab's form view is explained on its respective wiki page:

  * ['tests' tab](Concerto4PanelTestTab.md)
  * ['QTI' tab](Concerto4PanelQTITab.md)
  * ['HTML templates' tab](Concerto4PanelTemplateTab.md)
  * ['tables' tab](Concerto4PanelTableTab.md)
  * ['users' tab](Concerto4PanelUserTab.md)


---


### footer ###

![http://concerto.e-psychometrics.com/demo/wiki/panel_footer.png](http://concerto.e-psychometrics.com/demo/wiki/panel_footer.png)

The footer is located at the bottom of the panel and contains a few useful links to:

  * changelog
  * project homepage
  * forum
  * contact us