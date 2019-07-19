# CYZER - MVC Driven PHP Framework.
Cyzer is an OSS (Open Source Software). It is a minimalistic build PHP Framework for all types of modern application. It follows the MVC (Model View Controller) architecture.

## Preamble

Cyzer is built to create all types of web sites to super powerful web applications. It has minimal inbuilt functionality. Every functionality is carefully selected to just provide a bare bone-structure for your project. Minimalistic framework structure helps the application build over Cyzer to consume low server resource and provide better performance to end-user.

Cyzer needs no extra juice! It is compatible with almost all web server as it requires PHP, my SQL and Apache to run. It is lightweight, so any LAMP server can run Cyzer.

Cyzer supports add-ons. You add additional functionalities for your Cyzer application by installing addons/plugins AKA (also known as) external controllers. You can install official, self-created or 3rd party addons for your project. These add-ons extend Cyzer functionalities and make your application modular. Cyzer addons support export, import, editing and update functionality directly from SU (Super User) Panel.

Cyzer is secure by default. But you can follow the below-listed tips for better security
  - Do Not Install 3rd Party (UnTrusted) Addons
  - Enable Automatic Updates
  - Use VPS (Virtual Private Server)
  - Use strong password for SU Account

## Directory Structure

Cyzer has following directory structure. We are creating documentation for more insight.

- cyz-app - Application Directory
- cyz-gen - Auto Generated Directory
- cyz-inc - Cyzer Core Files
  - admin - Cyzer Super User / Adminstration Files
  - boot  - Cyzer Booting and Shutdown Function
  - comp  - Cyzer Core Components
  - lib   - Cyzer Core Controllers Library
  - routing - Core Routing File
  - cyz-version.php
- index.php

## Naming Convention

Typical, but worth mentioning


|     Type                      |              Naming Convention                                                                                       |
|-------------------------------|----------------------------------------------------------------------------------------------------------------------|
|File Names                     |Lower cased separated with dash (**cyzer-start.php**)                                                                 |
|Variables                      |Lower cased separated with underscored (**$file_system**)                                                             |
|Global variables               |All upper case and underscored (**$GLOBAL_VARIABLE**)                                                                 |
|Instances variables / Objects  |Suffix **_obj** (**$file_operator_obj**)                                                                              |
|Reserved variables             |Prefix **cyz_** (**$cyz_file_op_obj**)                                                                          |
|Array                          |Lower cased separated with underscored (**array('the_key'=>'the_value')**)                                            |
|Constants                      |All upper case and underscored (**THE_CONSTANT_VAR**)                                                                 |
|Classes                        |Camel case / Pascal case (Note that, when using camel case, the initial character is upper case) (**FileOperator**)   |
|Methods                        |Lower cased separated with underscored (**the_function()**)                                                           |

## Update Log

### V 1.0.0 - Alpha Build 1.0.6 - build 2
1. Added Static Objects - Phrase Object, CURL Object
2. Update Logic Modified - This release is only for testing

### V 1.0.0 - Alpha Build 1.0.6 - build 1
1. Architecture Modified
2. Code Revised
3. Core mySQL DB Controller Modified and Updated
4. Cyzer Core Update Functionality Added

### V 1.0.0 - Alpha Build 1.0.5
1. Code Editor Added
2. Super User Management Updated
3. Cyzer JDB Updated
4. Cyzer SMTP Integration - Work on Progress

### V 1.0.0 - Alpha Build 1.0.4
1. Complete Code Revised
2. Super User Management Updated
3. Cyzer JDB Updated
4. Cyzer SMTP Integration - Work on Progress

### V 1.0.0 - Alpha Build 1.0.3
1. Super User Session Management Updated (Remember Me Fixed, Unique Session Fixed)

### Major Update - V 1.0.0 - Alpha Build 1.0.2
1. Ace Editor Integrated
2. Code Editor Page Created
3. Page ID Implemented
4. Code Formatted
5. Code optimised

### V 1.0.0 - Alpha Build 1.0.1
1. Multiple Functions Created
2. Readme Added

### V 1.0.0 - Alpha Build 1.0.0
1. Architecture Created
