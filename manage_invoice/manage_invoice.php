<?php
// No output or whitespace here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Invoices</title>

  <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            /* Add some margin for better spacing */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            /* Reduce font size */
        }

        .search-bar {
            display: flex;
            /* Use flexbox for better alignment */
            justify-content: space-between;
            /* Align search bar and button to opposite ends */
            margin-bottom: 20px;
        }

        #search {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            /* Add rounded corners */
            width: 80%;
            /* Adjust width as needed */
            font-size: 14px;
            /* Reduce font size */
        }

        button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            color: #000000;
            cursor: pointer;
            font-size: 14px;
            /* Reduce font size */
            transition: background-color 0.2s ease-in-out;
            /* Add hover effect transition */
            margin-right: 10px;
            /* Add margin between buttons */
        }


        button:hover {
            opacity: 0.8;
        }

        .view-details {
            background-color: #3A995B;
        }

        .download-pdf {
            background-color: #286eb4;
        }
        .remove-button {
            background-color: rgb(228, 108, 52)
        }
        .remove-button:hover {
            background-color: rgb(247, 78, 0)
        }

        .view-details:hover {
            background-color: #3A995B;
        }

        .download-pdf:hover {
            background-color: #0080ff;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            /* Reduce table width */
            border: 1px solid #ddd;
            /* Add table border */
            margin: 0 auto;
            /* Center align table */
        }

        th,
        td {
            padding: 10px;
            /* Reduce padding */
            border: 1px solid #ddd;
            /* Add cell borders */
            text-align: left;
            /* Align text to the left */
            font-size: 14px;
            /* Reduce font size */
        }

        th {
            background-color: #f2f2f2;
            /* Light gray background for headers */
            font-weight: bold;
            /* Make headers bolder */
        }

        .actions {
            text-align: center;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 20px;
            /* Reduce font size */
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        tr:hover {
            background-color: #f5f5f5;
            /* Add hover effect for table rows */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        .actions button {
            padding: 6px 12px;
            /* Adjust padding for desired button size */
            border-radius: 4px;
            /* Add rounded corners */
            cursor: pointer;
            font-family: inherit;
            /* Inherit font family from body */
            font-size: 12px;
            /* Reduce font size */
            text-transform: uppercase;
            /* Make button text uppercase (optional) */
            transition: background-color 0.2s ease-in-out;
            /* Add hover effect transition */
        }

        .actions button.view-details {
            background-color: #8bc34a;
            /* Light green color */
        }

        .actions button.download-pdf {
            background-color: #2196F3;
            /* Blue color */
        }

        .actions button:hover {
            opacity: 0.8;
            /* Change opacity on hover for subtle effect */
        }
    </style>
</head>

<style>
    /* Google Font Import - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    :root {
        /* ===== Colors ===== */
        --body-color: #d5d9e3;
        --sidebar-color: #FFF;
        --primary-color: #2111cf;
        --primary-color-light: #F6F5FF;
        --toggle-color: #DDD;
        --text-color: #707070;

        /* ====== Transition ====== */
        --tran-03: all 0.2s ease;
        --tran-03: all 0.3s ease;
        --tran-04: all 0.3s ease;
        --tran-05: all 0.3s ease;
    }

    body {
        background-color: var(--body-color);
        transition: var(--tran-05);
    }

    ::selection {
        background-color: var(--primary-color);
        color: #fff;
    }

    body.dark {
        --body-color: #d5d9e3;
        --sidebar-color: #d5d9e3;
        --primary-color: #d5d9e3;
        --primary-color-light: #d5d9e3;
        --toggle-color: #fff;
        --text-color: #ccc;
    }

    /* ===== Sidebar ===== */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        padding: 10px 14px;
        background: var(--sidebar-color);
        transition: var(--tran-05);
        z-index: 100;
    }

    .sidebar.close {
        width: 88px;
    }

    /* ===== Reusable code - Here ===== */
    .sidebar li {
        height: 50px;
        list-style: none;
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .sidebar header .image,
    .sidebar .icon {
        min-width: 60px;
        border-radius: 6px;
    }

    .sidebar .icon {
        min-width: 60px;
        border-radius: 6px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .sidebar .text,
    .sidebar .icon {
        color: var(--text-color);
        transition: var(--tran-03);
    }

    .sidebar .text {
        font-size: 17px;
        font-weight: 500;
        white-space: nowrap;
        opacity: 1;
    }

    .sidebar.close .text {
        opacity: 0;
    }

    /* =========================== */

    .sidebar header {
        position: relative;
    }

    .sidebar header .image-text {
        display: flex;
        align-items: center;
    }

    .sidebar header .logo-text {
        display: flex;
        flex-direction: column;
    }

    header .image-text .name {
        margin-top: 2px;
        font-size: 18px;
        font-weight: 600;
    }

    header .image-text .profession {
        font-size: 16px;
        margin-top: -2px;
        display: block;
    }

    .sidebar header .image {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar header .image img {
        width: 40px;
        border-radius: 6px;
    }

    .sidebar header .toggle {
        position: absolute;
        top: 50%;
        right: -25px;
        transform: translateY(-50%) rotate(180deg);
        height: 25px;
        width: 25px;
        background-color: var(--primary-color);
        color: var(--sidebar-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        cursor: pointer;
        transition: var(--tran-05);
    }

    body.dark .sidebar header .toggle {
        color: var(--text-color);
    }

    .sidebar.close .toggle {
        transform: translateY(-50%) rotate(0deg);
    }

    .sidebar .menu {
        margin-top: 40px;
    }

    .sidebar li.search-box {
        border-radius: 6px;
        background-color: var(--primary-color-light);
        cursor: pointer;
        transition: var(--tran-05);
    }

    .sidebar li.search-box input {
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        background-color: var(--primary-color-light);
        color: var(--text-color);
        border-radius: 6px;
        font-size: 17px;
        font-weight: 500;
        transition: var(--tran-05);
    }

    .sidebar li a {
        list-style: none;
        height: 100%;
        background-color: transparent;
        display: flex;
        align-items: center;
        height: 100%;
        width: 100%;
        border-radius: 6px;
        text-decoration: none;
        transition: var(--tran-03);
    }

    .sidebar li a:hover {
        background-color: var(--primary-color);
    }

    .sidebar li a:hover .icon,
    .sidebar li a:hover .text {
        color: var(--sidebar-color);
    }

    body.dark .sidebar li a:hover .icon,
    body.dark .sidebar li a:hover .text {
        color: var(--text-color);
    }

    .sidebar .menu-bar {
        height: calc(100% - 55px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow-y: scroll;
    }

    .menu-bar::-webkit-scrollbar {
        display: none;
    }

    .sidebar .menu-bar .mode {
        border-radius: 6px;
        background-color: var(--primary-color-light);
        position: relative;
        transition: var(--tran-05);
    }

    .menu-bar .mode .sun-moon {
        height: 50px;
        width: 60px;
    }

    .mode .sun-moon i {
        position: absolute;
    }

    .mode .sun-moon i.sun {
        opacity: 0;
    }

    body.dark .mode .sun-moon i.sun {
        opacity: 1;
    }

    body.dark .mode .sun-moon i.moon {
        opacity: 0;
    }

    .menu-bar .bottom-content .toggle-switch {
        position: absolute;
        right: 0;
        height: 100%;
        min-width: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        cursor: pointer;
    }

    .toggle-switch .switch {
        position: relative;
        height: 22px;
        width: 40px;
        border-radius: 25px;
        background-color: var(--toggle-color);
        transition: var(--tran-05);
    }

    .switch::before {
        content: '';
        position: absolute;
        height: 15px;
        width: 15px;
        border-radius: 50%;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        background-color: var(--sidebar-color);
        transition: var(--tran-04);
    }

    body.dark .switch::before {
        left: 20px;
    }

    .home {
        position: absolute;
        top: 0;
        top: 0;
        left: 250px;
        height: 100vh;
        width: calc(100% - 250px);
        background-color: var(--body-color);
        transition: var(--tran-05);
    }

    .home .text {
        font-size: 30px;
        font-weight: 500;
        color: var(--text-color);
        padding: 12px 60px;
    }

    .sidebar.close~.home {
        left: 78px;
        height: 100vh;
        width: calc(100% - 78px);
    }

    body.dark .home .text {
        color: var(--text-color);
    }
</style>

<body>
    <!-- sidebar html -->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="https://media.licdn.com/dms/image/C4D0BAQFV-POcXD1uWg/company-logo_200_200/0/1656599845278/calanjiyam_logo?e=2147483647&v=beta&t=CuVNycKXv5AC3zD9Az4ZA0834ZWfmNiR9Dts1txcmpY"
                        alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">Welcome!</span>
                    <span class="profession">
                        <?php echo $_SESSION['username'] ?>
                    </span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="welcome.php">
                            <i class='bx bxs-home bx-md'></i>
                            <span class="text nav-text">-->Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-money bx-md'></i>
                            <span class="text nav-text">-->Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="invoice_create.php">
                            <i class='bx bxs-spreadsheet bx-md'></i>
                            <span class="text nav-text">-->Invoices</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANJJREFUSEvtlt0RgjAQhJdOtBOtRKlErUSsBDqRTjTrA+MwezGM+WE0PAYuX2737kKDQk9TiIsKzqb8z0q9ERKOXEuZ8R3AHHxx0HMFZ6voJVL34lQ352HnOe1VeDzFhBbXQwDaD+AoxVUMfBQZDwBePWk8KobfMy64jy0w+1QNCXq/E++mw37rMaEnkTH3TepxcrBqJ44/gg8i4z0AbwuGSh19uLyDObznfrEKt27daqcoUv8fmD5aF7d5oS+MISP5j4C3IFdR1dFbxrdhzTib3E+64z0fJtwRiwAAAABJRU5ErkJggg==" />
                            <span class="text nav-text">-->Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="manage_customer.php">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAclJREFUSEvFlutRxDAMhH2dQCVAJUAlQCVAJdAJdAL33Xg9iiPJTgYm/pN7RF7t6nkqB53TQbhlD/BVKeW2lMLzuzrO83MLiVlgQB5KKU/J5QJ/MQ6Fr4+AZwD7y+XAY6ZABgzoR5V0i4p6FwfuIvYRMKBfAzTFl3ejwzswX8U/AoYpCRQd4vhc/+Q5iv11f5EH/FoTaTZEM+q8Vebtzh4YlrAdHWIn+WZsVpL3wBFbDG0s+Y7c/HY/mYA4isOX0wOTUF6yKDup5Rsn/jjyfrZFUlWDV2Yt1hY4k6x3kMvlIKDKcIFFydlCZC+EDVJ7R4yQK2qNajaZ9JQWqiykzoCtMzjRl8eo/GTfytAyHtWjjD3gKDd69Q5j7ALP1CMMVs2gdrGse4k5IbokopV6pgNhI2McVUbP2ja8vkxGSWKbgDqcmsLIdqGUV5/ZVGoxOg+Gn8pYGT6qCttm3dUnGxKS2YKoRDK5h0OCGEYLgJoIZWdllfxROXrlFy57mff9wMBZ7zdl8kLiaEjYgv+L1cfdPrzp1HeaPcsed9gNxW3+oy1TRjhAgyCpomNHYz+tVjazwNYBPmsf01L/bwt9QnTfX1sZ70NxrH4Bd3txH4SHrqIAAAAASUVORK5CYII=" />
                            <span class="text nav-text">-->Customers</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxl-product-hunt bx-md'></i>
                            <span class="text nav-text">-->Products</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>
    <!-- sidebar html end -->
    <div class="topnav">

        <a href="#help">
            <i class='bx bxs-phone-call'></i> Help</a>
        <a href="#notifications">
            <i class='bx bxs-bell-minus'></i> Notifications</a>
        <a href="#refresh">
            <i class='bx bx-refresh'></i> Refresh</a>
        <input type="text" placeholder="Search..">
    </div>

    <h1>Manage Invoices</h1>

    <div class="search-bar">
        <input type="text" id="search" placeholder="Search by client ID or invoice number">
        <button id="download-pdf" onclick="generatePDF()"
            style="background-color: blue; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.2s ease-in-out;">Download
            PDF</button>
    </div>
    <!-- style for search bar -->
    <style>
        .search-bar {
            margin-bottom: 20px;
            display: flex;
            /* Use flexbox for better alignment */
            justify-content: center;
            /* Center the input field */
        }

        #search {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            /* Add rounded corners */
            width: 300px;
            /* Adjust width as needed */
            font-size: 16px;
            /* Increase font size for better readability */
            margin-right: 10px;
            /* Add margin to separate from the button */
        }

        #search:focus {
            outline: none;
            /* Remove outline on focus */
            border-color: #007bff;
            /* Change border color on focus */
        }

        .modal .close {
            /* Style the close button */
            color: #fff;
            background-color: #000;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: none;
            opacity: 0.6;
            border-radius: 5px;
            transition: opacity 0.3s;
        }

        .modal .close:hover {
            /* Change opacity on hover */
            opacity: 1;
        }
    </style>
    <table id="invoice-table">
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Phone Number</th> <!-- Added Phone Number column -->
                <th>Address</th> <!-- Added  Address column -->
                <th>Invoice Date</th>
                <th>Invoice Number</th>
                <th class='hide-actions'>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the PHP script to fetch data
            include 'get_invoices.php';

            // Loop through the sample invoice data and display it in the table
            foreach ($invoices as $invoice) {
                echo "<tr>";
                echo "<td>{$invoice['client_id']}</td>";
                echo "<td>{$invoice['client_name']}</td>";
                echo "<td>{$invoice['phone_number']}</td>";
                echo "<td>{$invoice['address']}</td>";
                echo "<td>{$invoice['invoice_date']}</td>";
                echo "<td>{$invoice['invoice_number']}</td>";
                echo "<td>";
                echo "<button class='view-details'  data-invoice-id='{$invoice['id']}'>Details</button>";
                echo "<button class='remove-button'  data-invoice-id='{$invoice['id']}'>Remove</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Modal and other HTML elements as before -->
    <div id="details-modal" class="modal">
        <div class="modal-content">
            <button class="close">&times;</button>
            <h3>Invoice Details</h3>
            <table id="invoice-details">
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            // Function to get invoices from PHP and populate table
            function getInvoices() {
                $.ajax({
                    url: "get_invoices.php", // Use get_invoices.php for both invoice list and details
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#invoice-table tbody").empty(); // Clear existing table rows

                        $.each(data, function (index, invoice) {
                            var row = $("<tr></tr>");

                            row.append("<td>" + invoice.client_id + "</td>");
                            row.append("<td>" + invoice.client_name + "</td>");
                            row.append("<td>" + invoice.phone_number + "</td>"); // Added phone number
                            row.append("<td>" + invoice.address + "</td>");
                            row.append("<td>" + invoice.invoice_date + "</td>");
                            row.append("<td>" + invoice.invoice_number + "</td>");

                            var actionsCell = $("<td></td>");
                            actionsCell.append("<button class='view-details' data-invoice-id='" + invoice.id + "'>Details</button>");
                            actionsCell.append("<button class='remove-button' data-invoice-id='" + invoice.id + "'>Remove </button>");

                            row.append(actionsCell);

                            $("#invoice-table tbody").append(row);
                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error("Error fetching invoices:", textStatus, errorThrown);
                    }
                });
            }

            // Call getInvoices function on page load
            getInvoices();

            // Event listener for searching by client name or invoice number (unchanged)

            // Event listener for "View Details" button click
            $(document).on("click", ".view-details", function () {
                var invoiceId = $(this).data("invoice-id");

                // Fetch invoice details based on ID using AJAX (assuming get_invoices.php provides details too)
                $.ajax({
                    url: "get_invoices.php", // Use get_invoices.php for details as well (modify script if needed)
                    method: "GET",
                    data: { id: invoiceId }, // Send invoice ID as data
                    dataType: "json",
                    success: function (data) {
                        populateInvoiceDetails(data);
                        $("#details-modal").show();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error("Error fetching invoice details:", textStatus, errorThrown);
                    }
                });
            });


            // Function to populate invoice details table in the modal
            function populateInvoiceDetails(invoiceData) {
                $("#invoice-details").empty(); // Clear existing rows

                // Create table rows dynamically with invoice data
                var row = $("<tr></tr>");
                row.append("<th>Client ID:</th><td>" + invoiceData.client_id + "</td>");
                row.append("<th>Client Name:</th><td>" + invoiceData.client_name + "</td>");
                row.append("<th>Invoice Date:</th><td>" + invoiceData.invoice_date + "</td>");
                row.append("<th>Invoice Number:</th><td>" + invoiceData.invoice_number + "</td>");
                row.append("<th>Phone Number:</th><td>" + invoiceData.phone_number + "</td>");  // Added phone number
                row.append("<th>Address:</th><td>" + invoiceData.address + "</td>");
                $("#invoice-details").append(row);
            }

            // Close the details modal when the close button is clicked (unchanged)
            $(".close").on("click", function () {
                $("#details-modal").hide();
            });





            // Call getInvoices function on page load (unchanged)
            getInvoices();

        });
        function generatePDF() {
            // Hide elements before PDF generation
            $("#download-pdf").hide(); // Hide the download button itself
            $("#search").hide(); // Hide the search bar (assuming ID is "search")
            $(".actions-column").hide(); // Hide the actions column (assuming class is "actions-column")

            // Optional: Style input elements for better PDF presentation (consider using CSS class)
            $("input").css({
                "border": "none",
                "pointer-events": "none",
                "padding": "10px 0"
            });

            // Optional: Hide additional elements (adjust selectors as needed)
            $(".btn-add").hide(); // Assuming a button with class "btn-add" to hide
            $("#client-image").hide(); // Assuming an element with ID "client-image" to hide
            $(".btn-p").hide(); // Assuming buttons with class "btn-p" to hide

            const element = document.getElementById("invoice-table"); // Select the invoice table

            const unwantedElements = "#download-pdf, #details-modal, .hide-actions";
            // PDF configuration with preferred settings
            const pdfConfig = {
                margin: 10,
                filename: 'Calanjiyam_invoice.pdf', // Adjust filename as needed
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: {
                    unit: 'mm',
                    format: [297, 210], // A4 landscape format (width, height)
                    orientation: 'landscape'
                }, exclude: unwantedElements
            };

            // Generate PDF using html2pdf
            html2pdf(element, pdfConfig);

            // Restore element visibility after PDF generation
            $("#download-pdf").show(); // Show the download button again
            $("#search").show(); // Show the search bar again
            $(".actions-column").show(); // Show the actions column again
            $("input").css({ // Restore input element styles (optional)
                "border": "",
                "pointer-events": "",
                "padding": ""
            });
            $(".btn-add").show(); // Show the hidden button (optional)
            $("#client-image").show(); // Show the hidden image (optional)
            $(".btn-p").show(); // Show the hidden buttons (optional)
        }
    </script>
    <!-- sidebar script -->

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>
    <script>
        // Event listener for searching by client name or invoice number (unchanged)
        $("#search").keyup(function () {
            var searchTerm = $(this).val().toLowerCase();
            $("#invoice-table tbody tr").each(function () {
                var clientName = $(this).find("td:nth-child(2)").text().toLowerCase();
                var invoiceNumber = $(this).find("td:nth-child(4)").text().toLowerCase();
                if (clientName.indexOf(searchTerm) !== -1 || invoiceNumber.indexOf(searchTerm) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    </script>
    <style>
        * {
            box-sizing: border-box;
        }

        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #2196F3;
            color: black;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .topnav input[type=text] {
            float: right;
            padding: 6px;
            width: 250px;
            margin-top: 8px;
            margin-right: 16px;
            border: none;
            font-size: 17px;
        }

        @media screen and (max-width: 600px) {

            .topnav a,
            .topnav input[type=text] {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }

            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
    </style>
  <script>
    $(document).on("click", ".remove-button", function () {
        var invoiceId = $(this).data("invoice-id");

        // Confirmation dialog
        if (confirm("Are you sure you want to delete this invoice?")) {
            $.ajax({
                url: "delete_invoice.php",
                method: "POST",
                data: { id: invoiceId },
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        // Remove invoice row from the table
                        $(document).find("tr[data-invoice-id='" + invoiceId + "']").remove();
                        console.log("Invoice deleted successfully!");
                        // Optional: Show success message to the user
                    } else {
                        console.error("Error deleting invoice:", data.error);
                        // Optional: Show error message to the user
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("Error deleting invoice:", textStatus, errorThrown);
                    // Optional: Show error message to the user
                }
            });
        }
    });

  </script>

</body>

</html>