<!-- Customer Deposit page backend starts-->
<?php

/* Connect db */

@include 'connect.php';
session_start();
if (isset($_POST['submit'])) {
    $id = $_SESSION['cus_id'];
    $loantype = $_POST['loantype'];
    $loanamount = $_POST['loanamount'];
    $loantime = $_POST['loantime'];
    $comment = $_POST['comment'];
    /*  $loantime = $_POST['loantime']; */
    $status = 0;




    $sql = "INSERT INTO `loan_request`( `cid`, `loantype`, `loanamount`, `loantime`, `comment`, `status`) VALUES ('$id','$loantype','$loanamount','$loantime','$comment','$status')";
    $result = mysqli_query($con, $sql);
     echo "<script>alert(' Loan Application Successful'); </script>";
     header("Location: cus_loan.php");

}
;






?>
<!--Customer Deposit  page backend ends-->





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercantile Bank</title>
    <link rel="stylesheet" href="../mblbank/css/loan_card.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>




    <div class=" card-body py-8 px-md-5 m-5 p-5 bg-image" style="
        background-image: url('../mblbank/images/loan_request.avif'); height:1300px;

        ">
        <h1 class="heading  text-center  text-white-50">LOAN DETAILS</h1>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 ">
                <li>
                    <a href="" class="card">
                        <img src="../mblbank/images/personal_loan14.jpeg" class="card__image" style="height: 350px;"
                            alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>

                                <div class="card__header-text">
                                    <h3 class="card__title">Personal Loan</h3>

                                    <span class="card__status">Interest: 9%|| </span>
                                    <span class="card__status">BDT 4 Lac-BDT 40 Lac || </span>
                                    <span class="card__status"> 6 - 36 Months</span>
                                </div>
                            </div>
                            <p class="card__description">
                                Eligibility :
                                Age: 22 to 60 years
                                Monthly income criteria:
                                Salaried Executive: BDT 30,000
                                Landlord: BDT 35,000
                                Professional: BDT 60,000
                                Business person: BDT 100,000


                            </p>
                        </div>
                    </a>
                </li>

            </div>
            <div class="col-lg-4 col-md-4 col-12 ">
                <li>
                    <a href="" class="card">
                        <img src="../mblbank/images/comercial_loan.jpg" class="card__image" style="height: 350px;"
                            alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>

                                <div class="card__header-text">
                                    <h3 class="card__title">Commercial Loan</h3>

                                    <span class="card__status">Interest: 15%|| </span>
                                    <span class="card__status">BDT 1Cr-BDT 10Cr || </span>
                                    <span class="card__status"> 6 - 60 Months</span>
                                </div>
                            </div>
                            <p class="card__description">
                                Requirements: Documented Property Value , Property Cash Flow , Income and Assets of the
                                Guarantor


                            </p>
                        </div>
                    </a>
                </li>

            </div>
            <div class="col-lg-4 col-md-4 col-12 ">
                <li>
                    <a href="" class="card">
                        <img src="../mblbank/images/home_loan.jpg" class="card__image" style="height: 350px;" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>

                                <div class="card__header-text">
                                    <h3 class="card__title">Home Loan</h3>

                                    <span class="card__status">Interest: 11%|| </span>
                                    <span class="card__status">BDT 20 Lac-BDT 1 Cr || </span>
                                    <span class="card__status"> 6 - 60 Months</span>
                                </div>
                            </div>
                            <p class="card__description">Eligibility :
                                Age: 22 to 65 years

                                Experience: 3 years experience in respective field.

                                Income criteria:

                                BDT 50,000 and above
                                BDT 30,000 (Government officials only)


                            </p>
                        </div>
                    </a>
                </li>

            </div>








        </div>">

        <h1 class="heading mt-5 text-center text-white-50 ">LOAN APPLICATION</h1>
        <div class="col m-5 d-flex me-auto  justify-content-center align-items-center">

            <div class="col-6 m-4 text-white  ">
                <form action=" " method="post">




                    <div class="form-row mt-3">



                        <fieldset class="mt-2">
                            <lebel class="mt-2 text-uppercase">Loan Type</lebel>
                            <input class="mt-2 text-uppercase" name="loantype" list="type-of-loan" />
                            <datalist class="mt-2 text-uppercase" id="type-of-loan">
                                <option value="Commercial">
                                <option value="Personal">

                                <option value="Home">
                            </datalist>
                            <br />
                            <label class="mt-2 text-uppercase" for="loanamount">Loan Amount</label>
                            <input type="text" name="loanamount" />
                        </fieldset>
                        <fieldset class="mt-2">
                            <legend class="mt-2 text-uppercase">Length of Loan(Months)</legend>
                            <input class="m-1" type="radio" name="loantime" value="6">6
                            <input class="m-1" class="m-1" type="radio" name="loantime" value="12">12
                            <input class="m-1" type="radio" name="loantime" value="24">24
                            <input class="m-1" type="radio" name="loantime" value="36">36
                            <input class="m-1" type="radio" name="loantime" value="48">48
                            <input class="m-1" type="radio" name="loantime" value="60">60
                        </fieldset>


                        <fieldset>
                            <legend class="text-uppercase">Comments</legend>
                            <textarea name='comment' name='comment'></textarea>


                        </fieldset>

                        <button class="bg-gradient m-2 p-2" type="submit" name="submit">Submit</button>


                </form>









            </div>
        </div>
        <div class=" loancalculator  ">
            <div class="col p-2 ">
                <div class="card card-body text-center m-5">
                    <h1 class="heading display-5 pb-3">Loan Calculator</h1>
                    <form id="loan-form">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" class="form-control m-1" id="amount" placeholder="Loan Amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">%</span>
                                <input type="number" class="form-control m-1" id="interest" placeholder="Interest">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control m-1" id="years" placeholder="Years To Repay">
                        </div>
                        <div class="form-group m-1">
                            <input type="submit" value="Calculate" class="btn btn-dark btn-block">
                        </div>


                    </form>

                    <!-- RESULTS -->
                    <div id="results" class="pt-4">
                        <h5>Results</h5>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Monthly Payment</span>
                                <input type="number" class="form-control m-1" id="monthly-payment" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Total Payment</span>
                                <input type="number" class="form-control m-1" id="total-payment" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Total Interest</span>
                                <input type="number" class="form-control m-1" id="total-interest" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


    </div>
    <div class="  d-flex justify-content-end ">
        <a class="bg-dark  m-5 p-2  rounded " href="customer_home.php" class="btn mt-5 " style="color: white;">Back</a>
    </div>
    </div>






    <!--    footer -->
    <?php include'footer.php'; ?>




    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <script>
    // Listen for submit
    document.getElementById('loan-form').addEventListener('submit', calculateResults);

    // Calculate Results
    function calculateResults(e) {

        // console.log("calculating");

        // Declare UI Variables

        const amount = document.getElementById('amount');
        const interest = document.getElementById('interest');
        const years = document.getElementById('years');
        const monthlyPayment = document.getElementById('monthly-payment');
        const totalPayment = document.getElementById('total-payment');
        const totalInterest = document.getElementById('total-interest');

        // Turn amount into decimal and store it into variable
        const principal = parseFloat(amount.value);
        const calculatedInterest = parseFloat(interest.value) / 100 / 12;
        const calculatedPayment = parseFloat(years.value) * 12;

        // Compute monthly payments
        const x = Math.pow(1 + calculatedInterest, calculatedPayment);
        const monthly = (principal * x * calculatedInterest) / (x - 1);


        // Check if value is finite

        if (isFinite(monthly)) {
            monthlyPayment.value = monthly.toFixed(2);
            totalPayment.value = (monthly * calculatedPayment).toFixed(2);
            totalInterest.value = ((monthly * calculatedPayment) - principal).toFixed(2);

        } else {
            showError("Please check your numbers")
        }

        e.preventDefault();
    }

    // Function to show error
    function showError(error) {

        const errorDiv = document.createElement('div');
        const card = document.querySelector('.card');
        const heading = document.querySelector('.heading');
        errorDiv.className = 'alert alert-danger';


        errorDiv.appendChild(document.createTextNode(error));



        card.insertBefore(errorDiv, heading);



        setTimeout(clearError, 3000);

    }


    // Create clear error
    function clearError() {
        document.querySelector('.alert').remove();
    }
    </script>

</body>