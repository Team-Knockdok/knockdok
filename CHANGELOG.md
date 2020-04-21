# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

* user_profil_view

## [0.2.3] - 2020-04-20

### Added

* template shows username if logged in

### Changed

* fixed riwayat user incompatibility

## [0.2.2] - 2020-04-20

### Added

* User controller, model
* riwayat user view
* user session control in auth_model
* datatabels vendor

## [0.2.1] - 2020-04-20

### Added

* rs mvc

### Changed

* Refactored rumah sakit to rs

## [0.2.0] - 2020-04-20

### Added

* cari controller and view
* emerald style in assets/style/style.css
* dokter model api getRsById
* profil dokter view
* foto default rumah sakit
* foto default dokter

### Changed

* routes to Home instead of Welcome
* template routing and title
* profil dokter
* rumah sakit model api name

### Deleted

* old assets/style.css file
* dokter view

## [0.1.1] [YANKED]

### Added

* Dokter mvc
* RS mvc

### Changed

* template accept title

## [0.1.0] - 2020-04-10

### Added

* register_view.php
* template.php
* login_view.php
* auth.php
* auth_model.php
* rumah_sakit.php
* rumah_sakit_model.php
* register() and login_auth() at auth_model.php
* login() at auth.php
* send_register() at auth.php
* function get_data_rumah_sakit() at rumah_sakit_model.php
* function get_data_rumah_sakit_by_id() at rumah_sakit_model.php
* function insert_data_RS() at rumah_sakit.php
* function add_hospital() at rumah_sakit_model.php
* function delete_hospital() at rumah_sakit_model.php
* function delete_data_RS() at rumah_sakit_model.php
* bunch of pages
* dummy file inside uploads/users/
* Profil Doctor
* Profil Rumah Sakit

### changed

* add library session at autoload.php
* add route action at form login
* add notification label at template.php
* add input type file in register_view.php
* add library session and form_validation at autoload.php
* add name at input form in register_view.php
* fixed send_register() at auth.php
* database
* change function register() at auth_model.php by adding parameter $file and adding more key and value at array in register() function
* fixed env configuration for database
* fixed function get_data_rumah_sakit_by_id() at rumah_sakit_model.php
* fixed typos in rumah_sakit.php
* fixed upload error
* gitignore excludes .env.development and uploads/

## [0.0.2] - 2020-04-09

### Changed

* gitignore excludes .env and \_\_hidden\_\_ folder

## [0.0.1] - 2020-04-06

### Added

* CHANGELOG
* .env.example
