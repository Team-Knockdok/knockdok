# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.4.2] - 2020-05-04

### Added

* fitur search

### Changed

* API dokter/make_schedule

## [Unreleased] - 2020-05-02

### Changed

* fixing API bug

## [Unreleased] - 2020-04-27

### Added

* added get_detail_pemesanan() at pesanan_model.php
* added document ready js function at jadwal_view.php
* Added set_session_transaksi() js function at riwayat_transaksi_view.php
* Added set_session_transaksi() function at user.php
* Added get_data_pemesanan() function at user.php
* Added get_keluhan() function at user.php

### Changed

* changed navbar route to riwayat_transaksi
* changed redirect route in pembayaran.php from riwayat into riwayat_transaksi
* changed riwayat_detail_pemesanan($id_transaksi) into riwayat_detail_pemesanan() at user.php

### Removed

* removed get_sudah_transaksi() function at pesanan_model

## [0.4.1] - 2020-04-25

### Added

* update status bayar API

### Changed

* home view

## [0.4.0] - 2020-04-25

### Added

* jadwal model
* update pesanan controller
* update_keluhan, get_keluhan, get_sudah_transaksi in pesanan model

### Changed

* checkout pesanan controller
* api dokter is now using jadwal model
* riwayat user is now using jadwal model
* insert in transaksi model
* moved ajax call from template to jadwal view
* pesanan view can edit keluhan
* profil_dokter, profil_rs view
* riwayat view

### Removed

* Material Bootstrap styles

## [0.3.0] - 2020-04-25

### Added

* dummy bukti pembayaran
* material bootstrap vendor
* pesanan mvc
* pembayaran vc
* transaksi model
* db sql

### Changed

* dokter mc
* jadwal_pemesanan_view to jadwal_view
* navbar route

## [Unreleased] - 2020-04-24

### Added

* added jadwal_pemeriksaan_view.php
* added get_schedule($id_dokter) function at dokter_model.php
* added get_schedule_by_id($id_jadwal) function at dokter_model.php
* added route schedule($id_dokter) at dokter.php
* added get_schedule($id_dokter) at dokter.php
* added get_schedule_by_id($id_jadwal) at dokter.php
* added dataTable javascript function at template.php for getting data into table
* added pesan_jadwal(id) javascript function at template.php
* added pesan_schedule($id_jadwal) function at dokter.php
* added add_data_pesanan($data_pesanan) at dokter_model.php
* added get_pesanan_by_id() at dokter_model.php
* added add_data_transaksi($data_transaksi) at dokter_model.php
* added delete_data_pesanan() at dokter_model.php

## [Unreleased] - 2020-04-23

### Added

* added add_data_dokter() function at dokter.php
* added insert_data_dokter($data) at dokter_model.php
* added hapus_data_dokter($id_dokter) at dokter.php
* added delete_data_dokter($id_dokter) at dokter_model.php
* added daftar_rumah_sakit() function at dokter.php
* added daftar_rs($data) function at dokter_model.php
* added make_schedule() function at dokter.php
* added add_schedule($data) function at dokter_model.php

### Changed
* fixing bug at add data hospital route
* fixing delete data hospital route
* fixing add_hospital function at rs_model
* fixing get() function at rs_model

## [Unreleased] - 2020-04-22

### Added
* add edit profile picture feature

### Changed
* fixing bug at edit profile picture

## [Unreleased] - 2020-04-21

### Added

* user_profil_view
* add modal box at user_profil_view
* add get_data_user() function at user_model
* add edit_data_profile() function at user_omodel
* add edit data profile feature

### Changed

* fixed template.php
* fixed cari_view.php
* fixed bantuan_view.php
* fixed login_view.php
* fixed riwayat_view.php
* fixed register_view.php
* change bantuan_view content

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
