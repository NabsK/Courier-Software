<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Assets/icons8-truck.png">
    <title>Courier Software |Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="Styles/styles.css">
</head>

<body>

    <?php include 'components/navbar.php'; ?>

    <!-- Hero -->
    <div class="container service-container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="service-heading">Fast, Reliable Courier Services</h1>
                <p class="service-description">
                    Professional parcel tracking and shipping quote services across South Africa.
                    Get real-time updates on your deliveries and instant shipping quotes.
                </p>
            </div>
            <div class="col-md-4">
                <div class="icon-container">
                    <img width="100" height="100" src="https://img.icons8.com/ios/100/truck--v1.png" alt="truck icon"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Features cards  -->
    <div class="container">
        <div class="row justify-content-center mt-5">

            <div class="col-md-5 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Track Your Order</h5>
                        <p class="card-text">Check the status of your current orders and shipments.</p>
                        <div class="mt-auto text-center">
                            <a href="track.php" class="btn btn-custom text-white">Track Order</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Request a Quote</h5>
                        <p class="card-text">Get a customized quote for your specific needs.</p>
                        <div class="mt-auto text-center">
                            <a href="quote.php" class="btn btn-custom text-white">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'components/footer.php'; ?>

</body>

</html>