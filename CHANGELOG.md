# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
* auth.php
* auth_model.php
* rumah_sakit.php
* rumah_sakit_model.php
* add register() and login_auth() at auth_model.php
* add login() at auth.php
* add send_register() at auth.php
* add function get_data_rumah_sakit() at rumah_sakit_model.php
* add function get_data_rumah_sakit_by_id() at rumah_sakit_model.php
* add function insert_data_RS() at rumah_sakit.php
* add function add_hospital() at rumah_sakit_model.php

### Changed
* database
* change function register() at auth_model.php by adding parameter $file and adding more key and value at array in register() function

## [0.0.2] - 2020-04-09

### Changed

* gitignore excludes .env and \_\_hidden\_\_ folder

## [0.0.1] - 2020-04-06

### Added

* CHANGELOG
* .env.example
