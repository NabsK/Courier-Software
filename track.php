<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Assets/icons8-truck.png">
    <title>Courier Software | Track Package</title>

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

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="tracking-container">
                    <h2 class="text-center mb-4">Track Your Package</h2>

                    <form id="trackForm">
                        <div class="mb-3">
                            <label for="trackingNumber" class="form-label fw-semibold">Tracking Number</label>
                            <input type="text" class="form-control" id="trackingNumber" required
                                placeholder="Enter tracking number ">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-custom px-4">
                                <span class="btn-text">Track Package</span>
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </div>
                    </form>

                    <div id="loading" class="text-center my-4">
                        <div class="spinner-border text-primary"></div>
                        <p class="mt-2">Loading tracking information...</p>
                    </div>

                    <div id="result" class="mt-4">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <?php include 'functions.php';
    echo getCommonJavaScriptFunctions(); ?>
    
</body>

</html>