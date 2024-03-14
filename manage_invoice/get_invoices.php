<?php

// Sample invoice data
$invoices = array(
  array(
    "client_id" => "123",
    "client_name" => "John Doe",
    "phone_number" => "123-456-7890", // Added phone number
    "address" => "123 Main St, City, Country", // Added address
    "invoice_date" => "2024-03-10",
    "invoice_number" => "INV-001",
    "id" => 1
  ),
  array(
    "client_id" => "456",
    "client_name" => "Jane Smith",
    "phone_number" => "456-789-1230", // Added phone number
    "address" => "456 Elm St, Town, Country", // Added address
    "invoice_date" => "2024-03-11",
    "invoice_number" => "INV-002",
    "id" => 2
  )
);

// Set the content type header to JSON
header('Content-Type: application/json');

// Encode the invoice data as JSON and echo it
echo json_encode($invoices);
