# operations on tables #

## general description ##

In Concerto, users can create tables and use them in their test. Any table can be used in any number of different tests since tables are independent entities (the same goes with any other Concerto object: tests, templates, QTI, etc.). A Concerto table is represented on the server side as a MySQL database table.

More advanced users can use any R code that can operate on MySQL database, but for everyone else Concerto has a **`concerto.table.query`** function in **`concerto`** package. This function contains extended function wizard that will let you create any query you want.


---


## extended function wizard for concerto.table.query - simple view ##

To run function wizard for **`concerto.table.query`**, insert it from your function toolbar in **test** tab (located under **Concerto functions** tab) or use code auto-complete tool, select **`concerto.table.query`** function and press **Ctrl+Enter**. Please keep in mind that the wizard will be inserted on your current cursor position in your test logic R code.

#### general function wizard description ####

If you got the function wizard open you need to first specify which table you want to query. You need to choose the workspace where table is located and the table itself.

Next, specify what kind of query you want to perform on the selected table. Possible queries:

  * **SELECT** - gets the specified data from the table
  * **INSERT** - inserts the specified data to the table
  * **UPDATE** - updates specified records in the table
  * **REPLACE** - replaces specified records in the table with the new ones
  * **DELETE** - removes specified records from the table

#### getting the data from the table - SELECT ####

![http://concerto.e-psychometrics.com/demo/wiki/table_select.png](http://concerto.e-psychometrics.com/demo/wiki/table_select.png)

This query lets us get some data from the table. We can use the following section to build the query:

  * **columns** - specify which columns should be included in the query result
  * **where** - specify filter conditions (R code is used to set the conditions)
  * **order by** - specify order of the result
  * **limit** - set the limit of records returned

In the example above we build the query that will return the data frame with all columns from the table included in the result. The filter was set so that only records with column **`id`** greater than 10 will be returned. We will order the result by **`id`** (descending) and we limit the result to just first 10 number of records.

#### inserting or replacing data in the table - INSERT/REPLACE ####

![http://concerto.e-psychometrics.com/demo/wiki/table_insert.png](http://concerto.e-psychometrics.com/demo/wiki/table_insert.png)

This query lets us insert new records to the table or replace existing ones. We can use the following section to build the query:

  * **set** - specify the values for columns of the table for the new row (any omitted columns will use the default values)

In the example above we build the query that will insert new records with the following values: column **`name`** will be set to "my name" and column **`count`** will be set to 1.

The difference between **INSERT** and **REPLACE** is that some columns may be set as **unique indexes** in the **table** tab in advanced view. If that's the case then when we will use **REPLACE** query on that table and we will try to set the column with unique index to the value that is already in the table then the record with that value will be replaced with the new one.

#### updating data in the table - UPDATE ####

![http://concerto.e-psychometrics.com/demo/wiki/table_update.png](http://concerto.e-psychometrics.com/demo/wiki/table_update.png)

This query lets us change the values of already existing records in the table. We can use following section to build the query:

  * **set** - specify the new values of table columns
  * **where** - specify filter conditions (R code is used to set the conditions)
  * **order by** - specify the order by which the records are updated
  * **limit** - set the limit of records updated

In the example above we build the query that will update all records where **`id`** column value is greater than 10. All matching rows will be changed so that column **`name`** value will be "my name" and column **`count`** value will be set to 1.

#### delete data in the table - DELETE ####

![http://concerto.e-psychometrics.com/demo/wiki/table_delete.png](http://concerto.e-psychometrics.com/demo/wiki/table_delete.png)

This query lets us delete the records that matches **where** conditions. We can use following section to build the query:

  * **where** - specify filter conditions (R code is used to set the conditions)
  * **order by** - specify the order by which the records are deleted
  * **limit** - set the limit of records deleted

In the example above we build the query that will remove all records where **`id`** column value is greater than 10.


---


## extended function wizard for concerto.table.query - advanced view ##

![http://concerto.e-psychometrics.com/demo/wiki/table_advanced.png](http://concerto.e-psychometrics.com/demo/wiki/table_advanced.png)

There are few more options available when using **`concerto.table.query`** function wizard in advanced view. First of all we have additional sections available when building the query for **SELECT** operation:

  * **group by** - lets you specify by which columns result will be grouped when using MySQL aggregate functions
  * **having** - lets you apply conditional statements for aggregate functions

The second addition in advanced view is the possibility to switch between wizard view and MySQL code view for chosen individual elements in query sections. When switched to code view you can use any MySQL code you wish.

If you declared function **`parameters`** argument (only available in advanced view) you can also insert it into your MySQL code **` {{var1}} `** where **`var1`** is your variable name passed as a **`parameters`** named list argument. The **`var1`** will be replaced at a runtime with the value of the variable.