## Installation <a name="contents"></a>
* [System Requirements](#system-requirements)
* [Installation](#installation)
* [Updating](#updating)
* [Uninstallation](#uninstallation)
* [Contributing](#contributing)

### System Requirements <a name="system-requirements"></a> <small>[Top](#contents)</small>
Current minimum system requirements are:
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Internet Connection is currently required as assets are imported from CDNs for development purposes
- Supports all modern browsers and IE 9+. Support across devices/screen sizes, but currently only optimized for desktops.

### Installation <a name="installation"></a> <small>[Top](#contents)</small>
1. Initialize Git `git init` and clone this repository `git clone https://github.com/chris985/crm crm`.
2. Create an empty MySQL database (other database types unsupported at this time)
3. Rename `/.env.example` to `/.env` and create your Application key by running `php artisan key:generate` from command line within the root folder.
4. Open and Configure `/.env` to connect to your database per: [Laravel Documentation](https://laravel.com/docs/5.4/configuration)
5. Run the database migrator to create the database schema. You can do this by running `php artisan migrate` from a command line in the root application folder `/`. Alternatively, to create the schema and fill with sample data run `php artisan migrate --seed`.
7. Check to be sure that all files have completed copying and the database structure has been created successfully. That's it... enjoy!

### Updating <a name="updating"></a> <small>[Top](#contents)</small>
1. BACKUP your Database and Files.
2. Clone the latest version of the repository `git clone https://github.com/chris985/crm` overwriting all files.
3. Run the Artisan database migrator to re-create the database schema. You can do this by running `php artisan migrate:reset` followed by `php artisan migrate` from a command line in the root application folder `/`. If you encounter errors, manually dump all tables from the database, then run `php artisan migrate`. If you wish to add back in sample data, be sure to add `--seed` to your command.
4. Cross your fingers and toes! That should be all.

### Uninstallation <a name="uninstallation"></a> <small>[Top](#contents)</small>
1.  Simply drop the database and delete all of the files.

### User Contributions <a name="contribute"></a> <small>[Top](#contents)</small>
We greatly appreciate all user contributions! We will manage making any and all user contributions fall within our project plans. Our only request is that good commenting is applied so that any submitted code can easily be understood by our team. As an example, if you wanted to contribute to adding a calendar for the People section, you would only need to ensure it is working for people and we would continue adding it to the other systems. If you are gratuitous enough to add a major system or feature you will be added to the wall of fame in the project Credits.