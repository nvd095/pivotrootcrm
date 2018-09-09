************************************************************************************

PIVOTROOTS CRM SYSTEM

************************************************************************************

FRAMEWORK USED: LARAVEL:5.6

Dependency PHP > 7

One can take the data dump form the seeder file available to create users and roles in the system

ADMIN USER :
There is only one super admin/admin in the system, Super admin has access to all the functionality of the system. Admin can add new users into the system , update their information , Add new roles and events and assign users a new role and event.


EVENT MANAGER:
Event manager is the user who can manage the events and add new events into the system.

NORMAL REGISTERED USER:
A normal user can just login and check if he/she is assigned any event which is vivisble on the home page, when the user logs-in.

****************************************************************************************
VALIDAIONS AND CONDITIONS:
****************************************************************************************

System provides basic validations where the user can't leave a input field blank . All the admin urls are accessible via admin login only, this is achieved by a custom MiddleWare "CheckRole".

All pages except home page requires login.

Admin cannot be deleted from the system , nor the admin role assigned to anyone else hence only one super user in the system.

******************************************************************************************
DATABASE Details:
******************************************************************************************

5 tables are users in the system : User,Roles,Events, user_roles and manage_events.

Table fields user_id , role_id and event_id has many-to-many mapping.

Data dump is available on db.txt file as well.








