## Documentation <a name="contents"></a>
* [Concepts](#concepts)
* [Design Language](#design-language)
* [Development Langurage](#development-language)
* [Directory Structure](#directory-structure)
* [Folders](#folders)
* [Files](#files)
* [Database](#database)
* [Frequently Asked Questions (FAQ)](#faqs)

Better and more complete documentation will be added once rapid development has ceased.

### Concepts <a name="concepts"></a> <small>[Top](#contents)</small>
The app is built to play off of the "Person, Place, Thing" idea. These 3 core areas along with "Tasks" are the central focus of a CRM if you really boil them down to their core. The top main menu provides access to each area, then displays simple context-sensitive actions next to the page title to either create a new item, delete, or edit an existing item.

* __People__ - Contacts within your app. People are physical human beings and can be associated with one or more places that they work with or associate with. (You may call them "Contacts, Leads, Prospects")

* __Places__ - locations, either a business or company, or a location of interest such as a meeting location. (You may call them "Companies, Vendors")

* __Things__ - Everything else. They can be websites, logins, configuration records, products, services, and other reusable assets to your business. (You may call them "Vendors, Products, Services, Configurations")

* __Tasks__ - These are all the items you need to complete. Tasks can be either be a one-time item, or a project that consists of a bunch of individual tasks. (You may call them "Projects, Service Tickets, To-Dos, Meetings")

* __Money__ - All your business finances consisting of billable invoices, expenses, quotes/proposals, and other money that is coming or going. (You may call them "Invoices, Expenses, Quotes, Proposals")

* __Times__ - Time frames such as the amount of time worked on a task, when something renews or expires, a meeting time, or a calendar appointment that are converted to billable items. (You may call them "Timesheets, ClockIn, Clock Out, In/Out Boards, Calendars, Meetings")

### Design Language <a name="design-language"></a> <small>[Top](#contents)</small>
An elegant interface is a key component to this system. Leveraging Bootstrap for the time being, the UI is heavily inspired by Google Material Design Language with a Card-Based Layout rather than the usual table-based layouts.

Our new custom Bootstrap components consist of "card-list" and "card-open" which change the look of Bootstrap cards.

### Development Language <a name="development-language"></a> <small>[Top](#contents)</small>
The App is developed in PHP/MySQL utilizing the Laravel application and dependencies, for the time being. Coding practices will be fairly standard, although for the moment it might not appear that way. Currently, you may find in-line CSS, and embedded scripts for temporary development purposes only. Proper commenting has also not been done at the time of this writing but is definitely a top item  to complete.

### Directory Structure <a name="structure"></a> <small>[Top](#contents)</small>
The app is built using Laravel, which follows an MVC-inspired structure. For those unfamiliar, the essential parts of the folder structure are:

#### Folders <a name="folders"></a> <small>[Top](#contents)</small>
* `/` – The root directory which contains all other folders for the app
* `/app` – Contains Models
* `/resources/views` – Contains the Views
* `/app/Http/Controllers` - Contains Controllers
* `/database/migrations` – Contains the database schema that will be written upon install
* `/public` – Contains the front-end code, assets, and media

#### Files <a name="files"></a> <small>[Top](#contents)</small>
* `/routes/web.php` – Contains the routes within the app
* `/.env` – Contains the core configuration file for development. We ship you a `.env.example` file which you will need to manually rename to `.env` and configure to connect to your database
* `/config` – Contains configuration files (overwritten by /.env file listed in the root)

Personally, I prefer having less "root" folders and would like to condense application folders around in the future.

#### Database <a name="database"></a> <small>[Top](#contents)</small>
The database structure has been moved to `docs/database_schema.xlsx` which shows the database structure as well as samples of the data within the columns. This will be updated as often as possible, but may not be kept up-to-date with most recent database changes.

### Frequently Asked Questions (FAQs) <a name="faq"></a> <small>[Top](#contents)</small>
