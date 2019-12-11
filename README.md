**First of all Thank You for purchasing of Application!**

**---------------------------- Directories**

- Docs - Contains installation manual for Multicrm
- html_template - Clean html template used in software
- multicrm - CRM Application
- lp - Landing Page Front Website

**---------------------------- Changelog**

**---------------------------- Version 3.1.4**
    
## Features
    - Added Tab Filters (All, Assigned To Me) in Leads, Contacts, Accounts, Tickets)
    - Tickets module. Added new fields in ticket (Ticket Owner), Added Print view with QR Code
    - Accounts Module. Added new fields Payment Currency, Payment Condition, Extra ID
    - Invoices. Added QR Code.
    
 ## Bugfix
    - Fixed error - Syntax error or access violation: 1064 You have an error in your SQL syntax;
    - Fixed default value of certificate in PayPal.
    
**---------------------------- Version 3.1.2**

  ## Bugfix
    - Fixed invalid installation instruction
    - Improvements in search dates in datatables

**---------------------------- Version 3.1**

 ## Features
    - Contact module. Added Websites (Customer internet adresses) 
    - Contact module. Mailing List (Usable for integration with other applications)
    - Testimonials module. Extended fields and features.
    - Products module. Added additional dates feature.
    - Added static field (Example in Testimonial Form)
    - Added BapUpdate Command (Usable when updating from prev version)
    - Calls module. Added status field
    - Invoices module. Invoice Settings - Added default due days (number)
    - Companies module. Added new fields to list.
    - Added Force delete (Removes companies and users) - soft delete 
    - Added possiblity to change displayed text size in generic datatables.
    
 
 ## Bugfix
    - Fixed issues in calendar
    - Fixed issues with Email Campaing
    - Changes module - fixed relation with user.
    - Lots of other bugs fixed.
    - Show phone icon only when there is a phone number
    - Fixed error with save profile in landing-page admin (voyager)
    - Invoice must have contact id
    - Quotes - fixed display of html tags in print
    
**---------------------------- Version 3.0.2**


 ## Features
    - Attachments api for 3-part applications
 
 ## Bugfix
    - Fixed error with saving company settings, display settings.
    - Fixed issue with tags loaded on each page.
    - Removed queue work from cron. You need to add queue work to supervisor - https://laravel.com/docs/5.8/queues
    
**---------------------------- Version 3.0**

 As of version 3.0 Software As a Service Payments are integrated into CRM and Front Website is Landing Page. CRM has now easier installation and can be connected with any landing page.

 ## Features
    - Subscription Payment/Invoice integrated into CRM (PayPal, CreditCard - Stripe, Offline Payment - Invoice )
      Complete Subscrpition module with (Settings, MultiCurrency, Plans, Invoices, Stats, Paypments)
    - Login/Register - Social Auth via Facebook, Twitter, Github
    - Added reCAPTCHA
    - Added API Key for webform (Contacts, Leads).
    - Added Email Campaign in Campaign Module
    - Added Currency to Product/Service
    - Added Invoice Settings -  Invoice Prefix, Invoice auto number. 
    - Added Recurring Invoice (Manual - Without automation yet)
    - Added custom datatable export XML in Testimonial module
    - Added Currency in dashboard widget
    - Many improvements
 
 ## Bugfix
    - Fixed deleted at in widgets
    - Other small bugs fixed.
    


**---------------------------- Version 2.2.5**

 ## Features
    1. Added mass delete 
    2. Added mass update
 ## BugFix
    - Fixed Send Email via queue.
    - Fixed print/export error on related modules.
    - Other small bugs fixed.
    
**---------------------------- Version 2.2.4**

 ## BugFix
    - Fixed Display Module in Settings. Updated Library in composer.json
    - Fixed Error in menu Editor
    - Added Currency in Price Summary in Invoices, Quotes, Orders.

**---------------------------- Version 2.2.2**

 ## BugFix
    **Rest API Module**
    - Added switch company method for admin users. "POST /api/switch-company { company_id: 1}"
    - Updated jwt-auth to tymon/jwt-auth": "1.0.0-rc.4.1" 
    - New command to generate jwt key "php artisan jwt:secret"
    
**---------------------------- Version 2.2.1**

 ## Features
    1. Better Performance - Added option to disable preloaded, records in tabs datatables are loaded on tab click.
    2. Added option to disable countTo in Leads.
 ## BugFix
    1. Fixed Calendar - Added option to create events from calendar drag.
    2. Fixed CSV Import.
    3. Fixed birth date in lead.
  

**---------------------------- Version 2.2**

 ## Features
    1. Better separation of companies. All dictionaries in modules, Tags, Email Templates, Customer Country, Currency, Tax, Roles etc are per company.  
    2. New saas api functions.
    3. Added Plans (Possiblity to limit modules per company)
    4. New module Testimontials.
    5. Lot of Bug Fixes
   
 ## Features Saas Front
    1. Added Trial Plans - 30 days free of charge.
    2. Added Manage users of crm via saas.
    3. Bug fix
  
**---------------------------- Version 2.1**

 ## Features
    1. Added Send Email to Contacts
    2. Added Email settings per account. Each user can have his own email settings.
    3. Added Email Templates.
    4. Better support for Tags - Global per company tags.
    5. Bug Fixes

**---------------------------- Version 2.0**

 ## Features
    
    1. Quick Edit - Ability to edit records directly in lists.
    2. Advanced View - Ability to create custom list views.
    3. Advanced Filter - Ability to filter records with complex queries.
    4. Generic additional partial views in index list of modules + Generic Count Group By Widget. Examples: Campaigns, Leads, Contacts.
    5. New modules:
        - Activity -> Call Log
        - Activity -> Contact Request
    6. Contacts - Added Additional emails feature.
    7. Leads - Additional emails feature.
    8. Product - Added Price Book (Multi Price Product) + Integration with Invoices.
    9. Web Forms - Integration with wordpress form or any other application that can "post" request to url.
    10. Added Gravatar for Contacts.
    11. In Part of admin settings added quick quick add ,quick edit options.
    12. Added support for redis cache.
    13. Updated Laravel to 5.7
    14. Bug Fix
          - comment save fix.
          - users limit, storage limit fix.
          - other fixes.
          - fixed bug with entity_created_by
    

**---------------------------- Version 1.1.5**

    ## Features
    
    1. Generic CSV Import with CSV mapping to Database columns
    - Lead Import from CSV
    - Contacts Import from CSV
    - Accounts Import from CSV
    - Payments Import from CSV
    2. Quick Create - Create records directly from Module index list.
    3. Convert Records
    - Convert Lead to Contact
    - Convert Quote to Order
    - Convert Order to Invoice
    
    BugFix
    Fixed error with fk during installation
    Other small errors fixed.

**---------------------------- Version 1.1.4**

    ## Features
    1. Added SAAS Front Website
    2. Added Parent task
    3. Added Company Limits (Optional User limits, Optional Storage limits)
    4. Api Integration with front website application

**---------------------------- Version 1.1.3**

    ## Featurs
    1. Added Images to Product - Display of image in quotes

**---------------------------- Version 1.1.2**

    ## BugFix 
    1. Fixed reset password

**---------------------------- Version 1.1.1**

    ## BugFix
    1. Fixed error with save record in Leads module

**---------------------------- Version 1.1**


    ## BugFix
    1. Added company field in users for admin user
    2. Fixed lead overview on dashboard when there are no data in database
    3. Moved delete to more section in show view
    4. Performacne fix - show view - removed min and max from prev,next.

- **---------------------------- Version 1.0**

    
    initial release
