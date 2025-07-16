<?php

function getCommonJavaScriptFunctions() {
    return <<<'JS'
<script>
/**
 * Handles form submission and API requests for tracking
 */
function handleTrackFormSubmit(e) {
    e.preventDefault();

    const trackingNumber = document.getElementById("trackingNumber").value.trim();
    const resultDiv = document.getElementById("result");
    const loadingDiv = document.getElementById("loading");

    if (!trackingNumber) {
        resultDiv.innerHTML = `<div class="alert alert-warning">Please enter a tracking number.</div>`;
        return;
    }

    loadingDiv.style.display = "block";
    resultDiv.innerHTML = "";

    fetch(`API/track-api.php?tracking_number=${trackingNumber}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(html => {
            loadingDiv.style.display = "none";
            
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            
            const trackingContainer = tempDiv.querySelector('.tt_container');
            
            if (trackingContainer) {
                resultDiv.innerHTML = '';
                resultDiv.appendChild(trackingContainer);
            } else {
                resultDiv.innerHTML = `<div class="alert alert-info">No tracking information found</div>`;
            }
        })
        .catch(error => {
            loadingDiv.style.display = "none";
            resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
        });
}

/**
 * Handles form submission and API requests for quotes
 */
function handleQuoteFormSubmit(e) {
    e.preventDefault();
    const form = e.target;
    const submitBtn = document.getElementById("submitBtn");
    const submitText = document.getElementById("submitText");
    const spinner = document.getElementById("loadingSpinner");
    const resultDiv = document.getElementById("quoteResult");
    
    const formData = {
        pickfranchise: form.pickfranchise.value.trim(),
        suburb: form.suburb.value.trim(),
        postcode: form.postcode.value.trim(),
        weight: parseFloat(form.weight.value) 
    };
    
    // Validating the inputs
    if (!formData.pickfranchise || !formData.suburb || !formData.postcode || !form.weight.value) {
        resultDiv.innerHTML = `<div class="alert alert-danger">Please fill in all required fields</div>`;
        return;
    }
    
    // Validat the weight
    if (isNaN(formData.weight) || formData.weight <= 0) {
        resultDiv.innerHTML = `<div class="alert alert-danger">Please enter a valid weight greater than 0kg</div>`;
        return;
    }
    
    if (formData.weight > 30) {
        resultDiv.innerHTML = `
            <div class="alert alert-danger">
                <h5>Weight Limit Exceeded</h5>
                <p>Maximum weight allowed is 30kg. Please contact customer support for heavy shipments.</p>
            </div>`;
        return;
    }
    
    // Show loading state
    submitText.textContent = "Calculating...";
    spinner.classList.remove("d-none");
    submitBtn.disabled = true;
    resultDiv.innerHTML = "";
    
    fetch(`API/quote-api.php?${new URLSearchParams(formData)}`)
        .then(response => response.json())
        .then(data => {
            submitText.textContent = "Calculate Quote";
            spinner.classList.add("d-none");
            submitBtn.disabled = false;
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            if (data.result?.services) {
                let html = `
                    <div class="alert alert-success">
                        <h4>Quote Results</h4>
                        <p>From ${data.result.pickfranchise} to ${data.result.to} (${data.result.postcode})</p>
                        <p>Weight: ${formData.weight} kg</p>
                        <hr>
                        <h5>Available Services:</h5>`;
                
                // Find the cheapest service
                const cheapest = data.result.services.reduce((prev, current) => 
                    parseFloat(prev.totalprice_normal) < parseFloat(current.totalprice_normal) ? prev : current);
                
                data.result.services.forEach(service => {
                    const isCheapest = service.name === cheapest.name;
                    const isOverWeight = formData.weight > service.weightlimit;
                    const weightClass = isOverWeight ? "text-danger" : "text-muted";
                    
                    html += `
                        <div class="service-card ${isCheapest ? 'cheapest-service' : ''}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>${service.name}</h5>
                                    <p class="mb-0 text-muted">${service.type} service</p>
                                </div>
                                <div class="text-end">
                                    <h4 class="text-primary">R${service.totalprice_normal}</h4>
                                    ${isCheapest ? '<span class="badge bg-success">Best Value</span>' : ''}
                                </div>
                            </div>
                            <p class="mb-0 mt-2">
                                <small class="${weightClass}">Weight limit: ${service.weightlimit} kg</small>
                                ${isOverWeight ? '<span class="badge bg-danger ms-2">Over limit</span>' : ''}
                            </p>
                        </div>`;
                });
                
                resultDiv.innerHTML = html + `</div>`;
            } else {
                throw new Error('No shipping options available');
            }
        })
        .catch(error => {
            submitText.textContent = "Calculate Quote";
            spinner.classList.add("d-none");
            submitBtn.disabled = false;
            resultDiv.innerHTML = `
                <div class="alert alert-danger">
                    <h5>Error</h5>
                    <p>${error.message}</p>
                </div>`;
        });
}

/**
 * Initializes form event listeners
 */
function initializeForms() {
    document.getElementById("trackForm")?.addEventListener("submit", handleTrackFormSubmit);
    document.getElementById("quoteForm")?.addEventListener("submit", handleQuoteFormSubmit);
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", initializeForms);
</script>
JS;
}
?>