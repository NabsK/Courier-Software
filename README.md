A web application for tracking parcels and getting shipping quotes using the Fastway Couriers API.

## Features

- **Track & Trace**: Enter a tracking number to view parcel status, location, and delivery history
- **Quote Generator**: Get shipping quotes by entering destination details and parcel information
- **Responsive Design**: Mobile-friendly interface built with Bootstrap
- **Form Validation**: Validation for all inputs
- **Error Handling**: Comprehensive error handling 

## Technology Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5
- **Backend**: PHP 8.2.23
- **API Integration**: Fastway Couriers REST API

## Prerequisites

Before running this application, ensure that you have:

1. **PHP 8.0 or higher** installed on your system
2. **Required PHP Extensions**:
   - OpenSSL extension 
   - cURL extension 
   - JSON extension 


## How to run the project

**Start PHP Development Server**:
   ```bash
   php -S localhost:8000
   ```

6. **Access the Application**:
   - Open your web browser
   - Go to: `http://localhost:8000`


## Usage Guide

### Tracking a Parcel

1. Navigate to the "Track & Trace" section
2. Enter a valid tracking number (test with: `Z60000983328` or `Z30002408261`)
3. Click "Track Package"
4. View the parcel status, location, and delivery history

### Getting a Quote

1. Go to the "Get Quote" section
2. Fill in the required fields:
   - Destination suburb
   - Postal code
   - Parcel weight
3. Click "Calculate Quote"
4. View the shipping cost and delivery options

## API Information

This application integrates with the Fastway Couriers API:

## Testing

### Test Tracking Numbers
- `Z60000983328`
- `Z30002408261`

### Test Quote Parameters
- Use any valid South African suburb and postal code
- Test with various weights

## Error Handling

The application handles various error scenarios:

- Invalid tracking numbers
- API timeouts and server errors
- Missing or invalid form fields
- Network connectivity issues

## Database Note

This implementation does not include database connectivity. All data is retrieved directly from the Fastway API in real-time.
