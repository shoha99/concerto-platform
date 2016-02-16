# 'users' tab #

## general description ##

This is the place where 'super administrators' of Concerto can add new users. Regular users can also use this section to change their profile information, manage their workspaces or grant access to other users for specific workspaces.

Workspaces are separate databases where one user can have multiple tests, templates, tables etc. and no one else has access to that unless the owner grants access to that workspace. One user can have unlimited number of workspaces and he can give access to any workspace to unlimited number of other users. Anyone with access to your workspace will have full access to it which means that they can also delete any object that is inside it (they can't however give access to anyone else).


---


## main form ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_user_form.png](http://concerto.e-psychometrics.com/demo/wiki/panel_user_form.png)

You can set the following test properties on users tab main form:

  * **login** - user login
  * **password** - user password, when editing existing user and you want to change the password you need to check the checkbox next to the password
  * **pass.conf.** - password confirmation
  * **first name** - users first name
  * **last name** - users last name
  * **inst. type** - type of users institution
  * **inst. name** - name of users institution
  * **email** - users email address (for now it's used to recover lost password)
  * **phone no.** - users phone number
  * **super user** - only available to super users, check if you want to make a user a super user (lets user add new users)


---


## user workspaces ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_user_workspace.png](http://concerto.e-psychometrics.com/demo/wiki/panel_user_workspace.png)

Only available in advanced view mode.

Here users can manage their workspaces. Workspace is a separate database that can contain Concerto objects (tests, tables, templates, etc.) and no one else has access to it except the owner. Every user has at least one workspace which is created when the user is added to the system. There is no limit on number of workspaces that one user is allowed to have. One test can used objects from different workspaces (if the test owner has adequate rights).


---


## workspace sharing ##

![http://concerto.e-psychometrics.com/demo/wiki/panel_user_sharing.png](http://concerto.e-psychometrics.com/demo/wiki/panel_user_sharing.png)

Only available in advanced view mode.

Every user can give access to her/his workspace to any other user in the system. The access given is full read/write access which means that the user you gave access to your workspace can remove any objects or create new ones. It's also possible for one user to use objects (e.g. templates, tables) in their own tests.