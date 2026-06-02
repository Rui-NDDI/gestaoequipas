# Domain Login Restrict

This module provide functionality to restrict the user login based on domain 
assigned to user. It also provide domain wise setting for Roles control login
if there domain specific role required.


## Requirements

* PHP v7.2+
* Drupal 8 | 9

## Installation (Web UI)

 * Install as you would normally install a contributed Drupal module. Visit
   https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules
   for further information.
 - with drush
 ```drush pm-enable -y domain_login_restrict```

REQUIREMENTS
------------

This module require Domain module.

## Usage

### Configure Global Domain affiliation Setting:
#### Validate User associated domain during login
* Visit : /admin/config/domain/settings (Domain settings), you will the 
section 'Domain User: Login restrict' with Checkbox.
* If this checkbox is selected then every time user login is validated 
against domain assigned to user under user edit screen for 'Domain Access'.
* If user does not have affiliation with domain and try to login, this module
 will not allow it.
* To bypass this validation for admin or other users with higher access, you 
can check permission called 'login to any domain' of few roles. whoever 
having this permission validation process get skipped for theme.

#### Assign Current Domain to the newly created user.
* Field 'Assign Domain to User'
* This assign Current domain to the new users.



### Configure Domain Specific Setting using roles:
#### Validate User roles with Domain specific roles:
* Visit : 'admin/config/domain' then click on edit link for any of the domain, 
url will be like 'admin/config/domain/edit/DOMAIN_ID'
* you will see 'Domain User: Login restrict using Role' section, it display 
all roles with checkboxes.
* Once you checked some role, then only user with role present on this domain
 allow to login.
* To bypass this validation for admin or other users with higher access, you 
can check permission called 'login to any domain' of few roles. whoever 
having this permission validation process get skipped for theme.

#### Assign roles to new users with Domain specific roles:
* Field 'Assign Role to New User'
* This assign selected roles to newly created user to this current domain.
