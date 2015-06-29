### ShineISP 2
ShineISP is a **billing system** to **manage your customers** (CMS, eCommerce, CRM, ERP) like WHMCS and WHMAP, Parallels Plesk Billing, AWBS (Advanced Webhosting Billing System) and ClientExec.

Requirements
------------

The dependencies for ShineISP are set up as Git submodules so you should not have to mess with dependencies.

* PHP 5.4+ (With short tags enabled)
* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [ZfcBase](https://github.com/ZF-Commons/ZfcBase)
* [ZfcUser](https://github.com/ZF-Commons/ZfcUser)

Why Zend Framework 2?
---------------------

Simple: The ZF2 module system is awesome and provides the perfect foundation for
a project with goals such as ours.

Installation
------------

* Run `git clone https://github.com/shineisp/core.git` and
  set up a vhost pointing to the public directory.
* Install with Composer -- http://getcomposer.org
  * `cd shineisp && ../composer.phar install`
* Launch the app from the browser, you will be propted for db info/etc
  * installation module will be created soon
 