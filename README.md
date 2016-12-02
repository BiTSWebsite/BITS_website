## Synopsis

This project is the beginning of a series of initiatives created by the **city of
Barcelona** to implement technology in the everyday life of its citizens.

For further information, please consult this website:

https://bits.city

## Pre-requisites

You need to have this software installed in your machine before proceeding with the installation:

*Vagrant*,
*Php*,
*Node.js*,
*Npm*,
*Gulp*

## Installation

First, clone this repository.

Next, run ```npm install``` to install the dependencies in your machine.

The next step is to set up a **virtual machine** in which to deploy locally the server.

```
$ vagrant init hashicorp/precise64
```

```
$ vagrant up
```

```
$ gulp init-wp
$ gulp run-wp
```
*These commands will install a Virtual Machine with Php 7 and the latest stable release of Wordpress 7.*

For further reference, you can consult the following link:

https://github.com/Varying-Vagrant-Vagrants/VVV


To compile the sass code into css and deploy the plug-ins and themes in the virtual machine:

```
$ gulp sass && gulp deploy-vm
```

As an added extra, you may want to deploy the code in a server using FTP.

```
$ gulp deploy
```

The environment variables have to be defined.
**FTP_HOST**
**FTP_USERNAME**
**FTP_PASSWORD**

The wordpress installation is in a folder called: /htdocs

## Tests

Run the following command to set up the Php Unit testing framework:

```
php composer.phar install
```
To run the tests, you can do so with the following command:

```
./vendor/phpunit/phpunit/phpunit
```
