# 'tables' tab #

## general description ##

On this tab you can create data tables that will be used by your tests. Data tables can be used for anything starting from user banks, item banks or recording responses. To create a table, you need to declare it's structure (columns of the table) before you can fill it with data.


---


## main form ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_table_form.png](http://concerto.e-psychometrics.com/demo/wiki/panel_table_form.png)

You can set following table properties on tables tab main form:

  * **name** - name of the table

At the top of the main form header there is an icon to change table description. This description will be later visible when hovering over question mark icon next to the selected table in the 'tables' tab list view.


---


## table structure definition ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_table_structure.png](http://concerto.e-psychometrics.com/demo/wiki/panel_table_structure.png)

Here you can set the columns you want your table to have. Every table needs to have at least one column called **`id`** of some kind of numeric type with auto increment attribute set. This column is automatically created for you.

Every column is described by following properties:

  * **name** - name of the column, must be unique for the table
  * **type** - data type of the column
  * **length/values** - maximum length for the column value or set of values for types **`enum`**, **`set`** (**only visible in advanced view**}
  * **default** - default value for the column (**only visible in advanced view**)
  * **attributes** - additional attributes for the column (**only visible in advanced view**)
  * **nullable** - check if the column accepts NULL as a value (**only visible in advanced view**)

In simple view mode you can choose between two column types:

  * **numeric** - will be represented in underlying MySQL database as **double** type
  * **text** - to set its value you can use CKEditor

In advanced view you can declare any MySQL data type except **spatials**.


---


## table indexes ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_table_indexes.png](http://concerto.e-psychometrics.com/demo/wiki/panel_table_indexes.png)

Only visible in advanced view.

Here is the list of all declared indexes for the table. They are exact representation of MySQL table indexes.


---


## table data ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_table_data.png](http://concerto.e-psychometrics.com/demo/wiki/panel_table_data.png)

This is the place where you can see all the records which are in the table. You can edit the records which are already in the table or delete them. You can also add new records from here. It's also possible to click on the icon at column header to sort the table by specific column or to filter the data using a set of conditions.


---


## additional actions ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_table_buttons.png](http://concerto.e-psychometrics.com/demo/wiki/panel_table_buttons.png)

'Tables' tab have three more actions available that can be performed on any table in the system:

  * **import table from MySQL table** - import any MySQL table you have in your database to Concerto platform
  * **import table from CSV file** - import any well formed CSV file as a Concerto table
  * **export table to CSV** - export any of your table to CSV file format