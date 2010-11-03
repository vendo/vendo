<?php
/**
 * Master testcase for fixtures
 *
 * @package    Vendo
 * @author     Jeremy Bush
 * @copyright  (c) 2010 Jeremy Bush
 * @license    http://github.com/zombor/Vendo/raw/master/LICENSE
 */
abstract class Vendo_TestCase extends PHPUnit_Framework_TestCase
{
	static $user;
	static $address;
	static $contact;

	/**
	 * Creates a predefined enviroment using the default environment
	 * 
	 * @return null
	 */
	public static function setupbeforeclass()
	{
		self::$address = new Model_Vendo_Address;
		self::$address->set_fields(
			array(
				'billing_address'  => 'foo',
				'billing_city'     => 'foo',
				'shipping_address' => 'foo',
				'shipping_city'    => 'foo',
			)
		);
		self::$address->save();

		self::$user = new Model_Vendo_User;
		self::$user->email = 'unittest@foo.com';
		self::$user->password = 'unittest';
		self::$user->first_name = 'Unit';
		self::$user->last_name = 'Test';
		self::$user->address_id = self::$address->id;
		self::$user->save();

		self::$contact = new Model_Contact;
		self::$contact->set_fields(
			array(
				'email'      => self::$user->email,
				'first_name' => self::$user->first_name,
				'last_name'  => self::$user->last_name,
				'address_id' => self::$address->id,
			)
		);
		self::$contact->save();
	}

	/**
	 * Removes all the things created with setupbeforeclass
	 * 
	 * @return null
	 */
	public static function teardownafterclass()
	{
		self::$user->delete();
		self::$contact->delete();
	}
}