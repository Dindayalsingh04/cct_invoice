<html>

<head>
    <title>Calanjiyam Invoice</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css'>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js"
        integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>

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
        --body-color: #cdd1de;
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
        --body-color: #18191a;
        --sidebar-color: #242526;
        --primary-color: #06335f;
        --primary-color-light: #3a3b3c;
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

    /* Default styles for table headers (light mode) */
    th {
        color: black;
        /* Or your preferred color for light mode */
    }

    /* Styles for dark mode */
    .dark th,
    .dark thead.dark-mode-text th {
        color: white;
        /* Text color for dark mode */
    }

    .dark .dark-mode-text * {
        color: white;
        /* Text color for dark mode */
    }
    .dark .form-group label {
    color: white;
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
    <section class="home">
        <div class='container pt-5'>
            <!-- <h1 class='text-center text-primary'>Create Printable PDF invoice using PHP MySQL</h1><hr> -->
            <?php
            if (isset($_POST["submit"])) {
                $invoice_no = $_POST["invoice_no"];
                $invoice_date = date("Y-m-d", strtotime($_POST["invoice_date"]));
                $cname = mysqli_real_escape_string($conn, $_POST["cname"]);
                $caddress = mysqli_real_escape_string($conn, $_POST["caddress"]);
                $cmobile = mysqli_real_escape_string($conn, $_POST["cmobile"]);
                $grand_total = mysqli_real_escape_string($conn, $_POST["grand_total"]);

                $sql = "insert into invoice (INVOICE_NO,INVOICE_DATE,CNAME,CADDRESS,cmobile,GRAND_TOTAL) values ('{$invoice_no}','{$invoice_date}','{$cname}','{$caddress}','{$cmobile}','{$grand_total}') ";
                if ($conn->query($sql)) {
                    $sid = $conn->insert_id;

                    $sql2 = "insert into invoice_products (SID,PNAME,PRICE,QTY,TOTAL) values ";
                    $rows = [];
                    for ($i = 0; $i < count($_POST["pname"]); $i++) {
                        $pname = mysqli_real_escape_string($conn, $_POST["pname"][$i]);
                        $price = mysqli_real_escape_string($conn, $_POST["price"][$i]);
                        $qty = mysqli_real_escape_string($conn, $_POST["qty"][$i]);
                        $total = mysqli_real_escape_string($conn, $_POST["total"][$i]);
                        $rows[] = "('{$sid}','{$pname}','{$price}','{$qty}','{$total}')";
                    }
                    $sql2 .= implode(",", $rows);
                    if ($conn->query($sql2)) {
                        echo "<div class='alert alert-success'>Invoice Added. <a href='print.php?id={$sid}' target='_BLANK'>Click</a> here to Print Invoice</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
                }
            }

            ?>
            <form method='post' action='invoice_create.php' autocomplete='off'>
                <div class='row'>
                    <div class='col-md-4'>
                        <h5 class='text-success'>Invoice Details</h5>
                        <div class='form-group'>
                            <label class="dark-mode-text">Invoice No</label>
                            <input type='text' name='invoice_no' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label class="dark-mode-text">Invoice Date</label>
                            <input type='text' name='invoice_date' id='date' required class='form-control'>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <h5 class='text-success'>Client Details</h5>
                        <div class='form-group'>
                            <label class="dark-mode-text">Name</label>
                            <input type='text' name='cname' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label class="dark-mode-text">Address</label>
                            <input type='text' name='caddress' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label class="dark-mode-text">Mobile Number</label>
                            <input type='text' name='cmobile' required class='form-control'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <h5 class='text-success'>Product Details</h5>
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th class="dark-mode-text">Product</th>
                                    <th class="dark-mode-text">Price</th>
                                    <th class="dark-mode-text">Qty</th>
                                    <th class="dark-mode-text">Total</th>
                                    <th class="dark-mode-text">Action</th>
                                </tr>
                            </thead>
                            <tbody id='product_tbody'>
                                <tr>
                                    <td><input type='text' required name='pname[]' class='form-control'></td>
                                    <td><input type='text' required name='price[]' class='form-control price'></td>
                                    <td><input type='text' required name='qty[]' class='form-control qty'></td>
                                    <td><input type='text' required name='total[]' class='form-control total'></td>
                                    <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'>
                                    </td>
                                </tr>
                            </tbody>


                            <tfoot>
                                <tr>
                                    <td><input type='button' value='+ Add Row' class='btn btn-primary btn-sm'
                                            id='btn-add-row'></td>
                                    <td colspan='2' class='text-right'>Total</td>
                                    <td><input type='text' name='grand_total' id='grand_total' class='form-control'
                                            required></td>
                                </tr>
                            </tfoot>
                        </table>
                        <input type='submit' name='submit' value='Save Invoice' class='btn btn-success float-right'>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#date").datepicker({
                dateFormat: "dd-mm-yy"
            });

            $("#btn-add-row").click(function () {
                var row = "<tr> <td><input type='text' required name='pname[]' class='form-control'></td> <td><input type='text' required name='price[]' class='form-control price'></td> <td><input type='text' required name='qty[]' class='form-control qty'></td> <td><input type='text' required name='total[]' class='form-control total'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
                $("#product_tbody").append(row);
            });

            $("body").on("click", ".btn-row-remove", function () {
                if (confirm("Are You Sure?")) {
                    $(this).closest("tr").remove();
                    grand_total();
                }
            });

            $("body").on("keyup", ".price", function () {
                var price = Number($(this).val());
                var qty = Number($(this).closest("tr").find(".qty").val());
                $(this).closest("tr").find(".total").val(price * qty);
                grand_total();
            });

            $("body").on("keyup", ".qty", function () {
                var qty = Number($(this).val());
                var price = Number($(this).closest("tr").find(".price").val());
                $(this).closest("tr").find(".total").val(price * qty);
                grand_total();
            });

            function grand_total() {
                var tot = 0;
                $(".total").each(function () {
                    tot += Number($(this).val());
                });
                $("#grand_total").val(tot);
            }
        });
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

            // No need to toggle class on thead anymore
        });

    </script>
</body>

</html>