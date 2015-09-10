# Changelog

All Notable changes to `Dick` will be documented in this file

## NEXT - YYYY-MM-DD

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing


## [0.6.6] - 2015-09-10

### Added
- Front-end layout view;
- Front-end routing according to the language locale; // TODO

### Fixed
- Default page templates now more realistic: home_page, about_us, services, simple_page, contact and using the default front-end layout;


## [0.6.5] - 2015-09-09

### Added
- Page entity is now multi-language, to show how that works. Added migration for the extra columns needed for multi-language.
- CRUD alias: 'CRUD' => 'Dick\CRUD\CrudServiceProvider'
- CRUD resource routes can now be defined with CRUD::resource() instead of Route::resource() and a bunch of other routes if reorder/translation was needed.
- Small CSS additions for the CRUD multi-language scenario.

## [0.6.4] - 2015-09-09

### Fixed
- Passed the $page variable to the view by default, in admin created pages using PageManager.

## [0.6.3] - 2015-09-08

### Added
- Dick\MenuManager package, an interface to add/edit/delete/reorder/nest menu items;

## [0.6.2] - 2015-09-08

### Added
- TranslationManager package, to edit lang files online;
- CHANGELOG.md file, to keep track of changes and versioning;

### Removed
- DebugBar dependency on Dick; If required, every developer will pull it in his project;