<?php
include '../vendor/autoload.php';
class stripe_api
{
	function __construct()
	{
		$api_key=array("secret_key"=>"sk_test_TkgJZkv5oQcBKSAgywwgOapC","public_key"=>"pk_test_cLMUrX3g2OpbxjLvmI6qXkXP");
		\Stripe\Stripe::setApiKey($api_key["secret_key"]);
	}

	function view_customer()
	{
		$pesan="";
		try
		{
			$customer = \Stripe\Customer::all();

			$pesan=$customer->data;
		}catch(Exception $e)
		{
			$pesan = $e->getMessage();
		}


		return $pesan;
	}

	function create_customer($email,$deskripsi)
	{

		$pesan="";
		try
		{
			$customer = \Stripe\Customer::create([
				"email" => $email,
				"description" => $deskripsi,
			]);

			$pesan=$customer->status;
		}catch(Exception $e)
		{
			$pesan = $e->getMessage();
		}


		return $pesan;
	}

	function delete_customer($id)
	{
		$pesan="";
		try
		{
			$customer = \Stripe\Customer::retrieve($id);
			$pesan=$customer->delete();
		}catch(Exception $e)
		{
			$pesan = $e->getMessage();
		}


		return $pesan;
	}

	function take_customer($id)
	{
		$pesan="";
		try
		{
			$customer = \Stripe\Customer::retrieve($id);
			$pesan=$customer;
		}catch(Exception $e)
		{
			$pesan = $e->getMessage();
		}


		return $pesan;
	}

	function update_customer($email,$deskripsi,$id)
	{
		$pesan="";
		try
		{
			$customer = \Stripe\Customer::retrieve($id);
			$customer->email = $email;
			$customer->description = $deskripsi;
			$pesan=$customer->save();
		}catch(Exception $e)
		{
			$pesan = $e->getMessage();
		}


		return $pesan;
		
	}
}

$stripe = new stripe_api();

?>