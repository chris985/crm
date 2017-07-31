# StarStation (Codename: "CRM")
Welcome to StarStation; a new CRM that focuses on efficiency, modern technologies, and awesome design to let you manage your business more effectively. Assistance is more than welcome and appreciated. Let's build something awesome :-)

![Screenshot](http://i.imgur.com/WiT4ezj.jpg "Screenshot")

I started building this application after disappointment with the apps currently on the market. The biggest apps out there are big, bloated, have a huge learning curve and downright disgusting interfaces that made me sick to my stomach. Some are web-based, but others require downloading companion apps and installing various companion programs to run. Other apps do one or two items related to a CRM but leave out the crucial pieces or hide them behind a paywall.

My idea with this app is to build a brand-new CRM that looks great and has all the functionality you would need to run a business, ideally for an IT business such as technical support or a project-based business such as web design or development. The goal is that it can eventually evolve into an app that suits many tastes but remains simple in nature.

** THIS APP IS IN HEAVY DEVELOPMENT, THIS IS NOT A "PUBLIC" RELEASE BY ANY STRETCH OF THE IMAGINATION. **

## LATEST NEWS
We are rapidly approaching 0.0.1.0 a major alpha release candidate! **The LAST stable build is 0.0.0.8. **

Minor versions from that version onwards will work towards this new release candidate which includes a major code revamp as we migrate to using [Semantic UI](https://semantic-ui.com/) as our new front-end framework. In addition, there will be a more robust and complete user-interface, integrated search, and beginnings of user administration.

## 1.1 CONTENTS
* 1.0   INTRO + WELCOME + LATEST NEWS
* 1.1   CONTENTS
* 1.2   SYSTEM REQUIREMENTS
* 1.3   INSTALLATION
* 1.4   UPDATING
* 1.5   UNINSTALLATION
* 2.0   DOCUMENTATION
* 2.1   CONCEPTS
* 2.2   DESIGN LANGUAGE
* 2.3   DEVELOPMENT LANGUAGE
* 2.4   DIRECTORY STRUCTURE
* 2.4.1 FOLDERS
* 2.4.2 FILES
* 2.4.3 DATABASE
* 3.0   WHAT'S NEW?
* 3.1   WHAT'S NEXT?
* 3.2   KNOWN ISSUES
* 3.3   ROADMAP
* 3.4   CREDITS
* 3.5   LICENSE

## 1.2   SYSTEM REQUIREMENTS
Current system requirements are:
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Internet Connection is currently required as Bootstrap is used for layout and is imported from CDN for development purposes
- Supports all modern browsers and IE 9+. Support across devices/screen sizes, but currently only optimized for desktops.

## 1.3   INSTALLATION
1.  Initialize Git `git init` and Clone the repository `git clone https://github.com/chris985/crm`
2.  Create an empty database
3.  Rename `/.env.example` to `/.env` and create your application key by running `php artisan key:generate` from command line.
4.  Configure `/.env` to connect to your database per: https://laravel.com/docs/5.4/configuration
5.  Run the Artisan database migrator to create the database schema. You can do this by running `php artisan migrate` from a command line in the root application folder `/`. Or, to create and fill with sample data find `/database/seeds/DatabaseSeeder.php.example` and rename it to `DatabaseSeeder.php` and run `php artisan migrate --seed`
7.  Check to be sure that all files have completed copying and the database structure has been created successfully. That's it! Enjoy!

## 1.4   UPDATING
1.  BACKUP your database and files should you wish to save them (You should not be using this for production right now anyway)
2.  Clone the latest version of the repository `git clone https://github.com/chris985/crm` overwriting all files
3.  Run the Artisan database migrator to re-create the database schema. You can do this by running `php artisan migrate:reset` followed by `php artisan migrate` from a command line in the root application folder `/`. If you encounter errors, manually dump all tables from the database, then run `php artisan migrate`. If you wish to add back in sample data, be sure to add `--seed` to your command.
4.  Cross your fingers and toes! That should be all

## 1.5   UNINSTALLATION
1.  Simply drop the database and delete all of the files.

## 2.0   DOCUMENTATION
Better and more complete documentation will be added once rapid development has ceased.

## 2.1   CONCEPTS
The app is built to play off of the "Person, Place, Thing" idea. These 3 core areas along with "Tasks" are the central focus of a CRM if you really boil them down to their core. The top main menu provides access to each area, then displays simple context-sensitive actions next to the page title to either create a new item, delete, or edit an existing item.

* __Tasks__ - These are all the items you need to complete. Tasks can be either be a one-off service ticket, or a project that consists of a bunch of individual tasks. (You may call them "Projects, Service Tickets, To-Dos")

* __People__ - Contacts within your app. People are physical human beings and can be associated with one or more places that they work with or associate with. (You may call them "Contacts, Leads, Prospects")

* __Places__ - locations, either a business or company, or a location of interest such as a meeting location. (You may call them "Companies, Vendors")

* __Money__ - All your business finances consisting of invoices, expenses, quotes/proposals, and other money that is coming or going. (You may call them "Invoices, Expenses, Quotes, Proposals")

* __Times__ - Time frames such as the amount of time worked on a task, a meeting time, or a calendar appointment. (You may call them "Timesheets, ClockIn, Clock Out, In/Out Boards, Calendars, Meetings")

* __Things__ - Everything else. They can be websites, logins, configuration records, products, services, and other reusable assets to your business. (You may call them "Vendors, Products, Services, Configurations")

## 2.2   DESIGN LANGUAGE
An elegant interface is a key component to this system. Leveraging Bootstrap for the time being, the UI is heavily inspired by Google Material Design Language with a Card-Based Layout rather than the usual table-based layouts.

The new Bootstrap components consist of "card-list" and "card-open" which change the look of Bootstrap cards.

## 2.3   DEVELOPMENT LANGUAGE
The App is developed in PHP/MySQL utilizing the Laravel application and dependencies, for the time being. Coding practices will be fairly standard, although for the moment it might not appear that way. Currently, you may find in-line CSS, and embedded scripts for temporary development purposes only. Proper commenting has also not been done at the time of this writing but is definitely a top item for me to complete.

## 2.4   STRUCTURE
The app is built using Laravel which follows an MVC-inspired structure. For those unfamiliar, the essential parts of the folder structure are:

### 2.4.1 FOLDERS
* `/` – The root directory which contains all other folders for the app
* `/app` – Contains Models
* `/resources/views` – Contains the Views
* `/app/Http/Controllers` - Contains Controllers
* `/database/migrations` – Contains the database schema that will be written upon install using `php artisan migrate`
* `/public` – Contains the front-end code, assets, and media

### 2.4.2 FILES
* `/routes/web.php` – Contains the routes within the app
* `/.env` – Contains the core configuration file for development. We ship you a `.env.example` file which you will need to manually rename to `.env` and configure to connect to your database
* `/config` – Contains configuration files (overwritten by /.env file listed in the root)

Personally, I prefer having less "root" folders. I would like to change some of these application folders around in the future, if possible.

### 2.4.3 DATABASE
The database structure has been moved to `docs/database_schema.xlsx` which shows the database structure as well as samples of the data within the columns. This will be updated as often as possible, but may not be kept up-to-date with most recent database changes.

## 3.0   WHAT'S NEW
```
Work on Tasks area, view, edit, index.
```

## 3.1   WHAT'S NEXT
```
Finish Tasks area, configure hierarchy so tasks can belong to a parent task
Next versions will focus on better commenting/documentation
Move media storage to storage directory, and remove from "public" location
```

## 3.2   KNOWN ISSUES
The app is currently in heavy development. Currently, the only working pieces consist of the "People" and "Places" sections with the rest of the functionality still needing to be programmed and built.

Additional fields are also to be added to the People and Places sections to complete the app.

## 3.3   ROADMAP
The roadmap is a look at things to come. As the app develops, these are the features that are planned, this list is subject to change, but it is in order.
```
* Code REVAMP switching Bootstrap to Semantic UI
* Complete all basic areas
* Complete all initial fields and database schema
* Authentication
* Integrate Markdown or Github flavored shortcodes into all text editors
* Administration area for “Admins” to add dedicated users, change types and, status dropdowns, configurable fields etc.
* System-wide Notes section. Associate multiple notes with all items
* Rollout of automatic installer/updater ala WordPress
* Integration of activity stream for system-wide changes
* Freeze Database Schema
* Official Public Alpha Release
* Mobile app layout development/optimization
* Integrate AJAX features to optimize database queries and load times
* Integrate system-wide AJAX search
* System-wide notifications system/mailer
* Table View layout for oldies, as opposed to modern card based layout
* System configuration options, colors/UI selections
* Integrate license files/keys
* Re-approach and redesign UI as needed
* Switchover app to use language files
* Code optimization, directory structure organization, and more
* Official Public Beta Release
* Further optimization and feature enhancements
```

## 3.4   CREDITS
Built with the following assets:
- __Laravel__: https://laravel.com
- __Laravel Collective Forms__: https://laravelcollective.com
- __Image Intervention__: http://image.intervention.io/
- __Faker__: https://github.com/fzaninotto/Faker
- __Bootstrap 4__: https://v4-alpha.getbootstrap.com/
- __Select2__: https://select2.github.io/
- __Google Material Design__: https://material.io/
- And Viewers like you!

__Author__: Christopher Martone: http://christophermartone.com
__Publisher__: Starcresc Interactive: http://starcresc.com

## 3.5   LICENSE
This app is provided "AS IS" and is not intended for use in a production environment, currently. Many areas are still in rapid development and the database schema has not yet been finalized. This app is provided freely for use and welcomes any user contributions to its code base. Under no circumstances is it provided with any warranty expressed or implied by either the Author or the Publisher. (C) Copyright 2017 Starcresc. (C) Copyright 2017 Christopher Martone. All Rights Reserved. Licensed Under [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)](https://creativecommons.org/licenses/by-nc-sa/4.0/) [Full License Terms](https://creativecommons.org/licenses/by-nc-sa/4.0/legalcode)

