<?php 

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
      <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/demo.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
		/* Add this to your CSS file */
/* Add this to your CSS file */

.brand {
    display: flex;
    align-items: center;
}

.logo {
    width: 40px; /* Adjust the width as needed */
    height: 40px; /* Adjust the height as needed */
    object-fit: cover; /* Ensures the image covers the space without stretching */
    border-radius: 50%; /* Optional: makes the image circular */
    margin-right: 10px;
	margin-left: 10px; /* Adjust spacing between the logo and text */
}

.text {
    margin-left: 10px; /* Adjust spacing between the logo and text */
}	

/* @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700); */
.button-group {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 10px;
}

.btn-download {
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--red);
    color: var(--light);
    display: flex;
    justify-content: center;
    align-items: center;
    grid-gap: 10px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    outline: none;
}

.btn-submit {
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--blue);
    color: var(--light);
    display: flex;
    justify-content: center;
    align-items: center;
    grid-gap: 10px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    outline: none;
}

/* .table-data {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
} */

/* CSS for Modal */
/* CSS for Modal */
/* Modal */
.modal {
    display: none; 
    position: fixed; 
    z-index: 9999; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; /* Allows scrolling on the overlay if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent background */
    font-family: var(--poppins);
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto; /* Adjusted to center the modal better */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; 
    max-width: 800px; /* Max width for larger screens */
    max-height: 1500vh; /* Limits height of the modal */
    overflow-y: auto; /* Allows vertical scrolling within modal */
    border-radius: 20px;
    position: relative; /* Ensure positioning context for close button */
}

/* Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


.input-field {
    margin-bottom: 15px;
}

.input-field label {
    display: block;
    margin-bottom: 5px;
}

.input-field input,
.input-field select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 36px;
}

.alert {
    padding: 1rem;
    border-radius: 5px;
    color: white;
    margin: 1rem 0;
    font-weight: 500;
}

.alert-info {
    background-color: #2E9AFE;
}

.alert-danger {
    background-color: #fc5555;
}

/* Overlay Style */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5); /* Adjust opacity as needed */
    z-index: 998; /* Ensure it is behind the modal */
}



</style>
	<title>Tricycle Permit MS</title>
</head>