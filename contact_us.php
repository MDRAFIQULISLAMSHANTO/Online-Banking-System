<!-- feedback backend starts-->
<?php

/* Connect db */
@include 'connect.php';
/* Access */
/* Access */
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $comment = $_POST['comment'];


    $query = " insert into homeuserfeedbackdata(`user`, `email`, `mobile`,`comment`)values('$user','$email','$mobile','$comment')";

    /* throw query */
    mysqli_query($con, $query);
    echo "<script>alert('Successfully done'); </script>";
 }

?>
<!-- feedback backend ends-->





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercantile Bank</title>
    <link rel="stylesheet" href="../mblbank/css/style.css">
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





    <?php include'header.php'; ?>

    <div class="container bg-light">


        <section class="my-5">
            <div class="py-5">
                <h2 class="text-center">Contact Us</h2>

            </div>
            <div class="w-50 m-auto ">
                <form action=" " method="post">
                    <div class="form-group">
                        <lebel>Username</lebel>
                        <input type="text" name="user" autocomplete="off" required class="form-control">
                    </div>
                    <div class="form-group">
                        <lebel>Email Id</lebel>
                        <input type="text" name="email" autocomplete="off" required class="form-control">
                    </div>
                    <div class="form-group">
                        <lebel>Mobile </lebel>
                        <input type="text" name="mobile" autocomplete="off" required class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <lebel>Comment</lebel>
                        <textarea name="comment" required class="form-control mt-1"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>


                </form>

            </div>

        </section>

    </div>

    <!--    footer -->
    <?php include'footer.php'; ?>

    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>