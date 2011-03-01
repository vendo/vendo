# Vendo

## What is it?

A lightweight e-commerce framework developed with the Kohana3 php framework.

It's main goal is to provide an excellent starting base for you to develop e-commerce applications with. It's not designed to be a drop-in e-commerce application, like Magento or OpenCart.

Vendo will give you a very good starting base for your e-commerce application, with sane schema, a sane data model, and easy to integrate payment classes.

## What is special about Vendo?

 1. It will be easy to build applications with
 2. The source code will make sense
 3. It will be fast
 4. It will be easy to write extensions for
 5. Development/Support will be as open as possible. Your contributions are welcome and encouraged
 6. It will be fully tested to ensure stability and prevent issue regression

## How can I help?

 1. Create an issue in this project for your feature/request
 2. Follow the [pull request](http://help.github.com/pull-requests/) procedures

## How do I use this thing?

Vendo has many parts:

 1. vendo-core: the core models and vendo base/exception classes
 2. vendo-acl: ACL classes
 3. vendo-billing: billing/order models and payment gateway classes
 4. vendo-admin: the admin application to manage the database for vendo
 5. vendo-application: a sample e-commerce application

If you just want to demo the whole vendo-application, do:

 1. Check out this repository with the --recursive flag to catch all the submodules (there are a few of them)
 2. Install the database: Run the schema.sql file located in application/schema/
    * The schema file contains table creation for users and roles. If you don't need this (if you are bolting this onto an existing application), simply omit it.
 3. Make sure the application/photos/ directory is writable by the webserver

If you'd like to use Vendo to develop your e-commerce application, you can omit the vendo-application module, and use the other four (you still need the database).

You can use the vendo-application as a starting point, or for inspiration on how to build an application with Vendo.

### Using vendo-application as a base

There is a *demo*,  `vendo-application` module, which can base for your e-commerce application. If you are happy with the functionality of the stock controllers but not the views (you should probably never use them as-is), you can replace the view class and templates in your application to get a customized skin on top of it.

It is a *demo* application. This is meant to be a guide for you to let you see what Vendo can do. You are not required, and are not encouraged to use it.

## Testing

One goal of Vendo is to be completely tested. This helps prevent bugs and defines a stable API. We use phpunit for unit tests, and [Behat](http://everzet.com/Behat/) for behavior/UI tests.

Test coverage is currently sparse in both areas.

If you contribute code, please make sure that you use TDD or BDD, depending on your contribution.

To run the phpunit tests, simply run `phpunit` from the root of this repository. All tests should pass. Please file an issue if they do not pass on your system.

To run the Behat tests, run `behat -c test/behat.yml` in the root of this repository.

## Integration

If you are using the Kohana Template Controller, put this in an extended template controller:

	public function after()
	{
		$this->template->{{$your_body_variable}} = $this->request->response;

		return parent::after();
	}

Then make a templates/layout.mustache file in your application directory with only this in it:

	{{>body}}

If you take this method, you will need to output the category links, cart link, and the account admin links manually.

This method is untested, so please provide feedback. :)

## Tech

Here's a list of tech used to build Vendo:

 * [Kohana](http://github.com/kohana/kohana)
 * [KOstache](http://github.com/zombor/KOstache)
 * [Mustache.php](http://github.com/bobthecow/mustache.php)
 * [Auto Modeler](http://github.com/zombor/Auto-Modeler)