<?php
// bcs350_mysqli_connect.php - Connect to MySQL and The bcs350 database
// Written by: Charles Kaplan, October 2020

// Variables

			require_once 'vendor/autoload.php';

			// Replace with your own Supabase credentials
			$supabaseUrl = "https://<your-project-id>.supabase.co";
			$supabaseAnonKey = "<your-anon-key>";
			
			$supabase = new Supabase\Client($supabaseUrl, $supabaseAnonKey);
			$result = $supabase->from('table_name')->select('*')->execute();

// Handle the result
if ($result->error) {
  // Handle the error
} else {
  // Use the result
  $data = $result->data;
  // ...
}

use PhpSupabase\Client;

$client = new Client('https://your-supabase-url.com', 'your-supabase-api-key');

$results = $client
    ->table('table_name')
    ->select('*')
    ->get();

print_r($results);



?>