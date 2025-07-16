<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Assets/icons8-truck.png">
    <title>Courier Software | Get Quote</title>

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

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quote-container">
                    <h2 class="text-center mb-4">Get a Shipping Quote</h2>

                    <form id="quoteForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pickup Franchise Code</label>
                                <input type="text" class="form-control" name="pickfranchise" value="JNB" required>
                                <small class="text-muted">e.g. JNB for Johannesburg</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Destination Suburb</label>
                                <input type="text" class="form-control" name="suburb" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Postal Code</label>
                                <input type="text" class="form-control" name="postcode" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Parcel Weight (kg)</label>
                                <input type="number" step="0.1" min="0.1" class="form-control" name="weight" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" id="submitBtn" class="btn btn-custom btn-lg px-4">
                                <span id="submitText">Calculate Quote</span>
                                <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <span class="rf-code-badge">RFCode: JNB (Johannesburg)</span>
                        </div>
                    </form>

                    <div id="quoteResult" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <?php
    include_once 'functions.php';
    echo getCommonJavaScriptFunctions();
    ?>
</body>

</html>