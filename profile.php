<style>
    .profile-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 10px; /* Reduced padding */
        margin-top: 0px; /* Remove any default margin */
    }

    .profile-background {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px; /* Reduced padding */
        width: 100%;
        max-width: 1200px; /* Reduced max-width */
        display: flex;
        flex-direction: column; /* Change to column for better mobile layout */
    }

    .profile-sidebar {
        width: 100%;
        text-align: center;
        padding: 10px; /* Reduced padding */
        border-bottom: 1px solid #dee2e6; /* Change to bottom border for better mobile layout */
    }

    .profile-sidebar img {
        border-radius: 50%;
        width: 100px; /* Reduced width */
        height: 100px; /* Reduced height */
        object-fit: cover;
    }

    .profile-form {
        width: 100%;
        padding: 10px; /* Reduced padding */
    }

    /* Media query for larger screens */
    @media (min-width: 768px) {
        .profile-background {
            flex-direction: row; /* Change to row for desktop layout */
        }

        .profile-sidebar {
            width: 30%;
            border-right: 1px solid #dee2e6;
            border-bottom: none;
        }

        .profile-form {
            width: 70%;
        }
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8;
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #682773;
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none;
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none;
    }

    .back:hover {
        color: #682773;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8;
    }

    h2 {
        margin-top: 0; /* Remove margin from the heading */
    }
</style>

<main>
    <div class="container profile-container">
        <div class="profile-background">
            <div class="profile-sidebar">
                <img src="admin/img/profileko.png" alt="Profile Image">
                <h4>Bryan</h4>
                <p>bryan@mail.com.my</p>
            </div>
            <div class="profile-form">
                <form id="profileForm">
                    <h2>Profile Settings</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="first name" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" value="" placeholder="surname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNumber" placeholder="enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" placeholder="enter address">
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input type="text" class="form-control" id="postcode" placeholder="enter postalcode">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="enter email">
                    </div>
                    <div class="form-group">
                        <label for="education">Education</label>
                        <input type="text" class="form-control" id="education" placeholder="education">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="country">
                    </div>
                    <div class="form-group">
                        <label for="stateRegion">Region</label>
                        <input type="text" class="form-control" id="stateRegion" placeholder="state">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </form>
            </div>
        </div>
    </div>
</main>
