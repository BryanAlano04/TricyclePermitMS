<main>
<br><br>    
<div class="container">
    <div class="multi-step-form">
        <div class="form-header">
            <h2>APPLICATION FOR TRICYCLE PERMIT</h2>
            <p>Personal Information</p>
        </div>
        <div class="step-indicators">
            <div class="indicator">
                <div class="icon"><i class="fas fa-user"></i></div>
                <p>PERSONAL</p>
            </div>
            <div class="indicator">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <p>SURVEY</p>
            </div>
            <div class="indicator">
                <div class="icon"><i class="fas fa-sticky-note"></i></div>
                <p>INSPECTION</p>
            </div>
            <div class="indicator">
                <div class="icon"><i class="fas fa-paperclip"></i></div>
                <p>Upload</p>
            </div>
            <div class="indicator">
                <div class="icon"><i class="fas fa-credit-card"></i></div>
                <p>Payment</p>
            </div>
        </div>
        <form id="multiStepForm">
            <div class="step active">
                <br>
                <h5>TRICYCLE OWNER</h5>
                <hr>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Contact No.</label>
                    <input type="text" class="form-control" id="contactNo" required>
                    <input type="date" class="form-control" id="dob" required>
                </div>
                <br>
                <h5>VEHICLE DESCRIPTION</h5>
                <hr>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Registration Plate No.</label>
                    <input type="text" class="form-control" id="registrationPlateNo" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Franchise No</label>
                    <input type="text" class="form-control" id="franchiseNo" required>
                </div>
                <br>
                <h5>VEHICLE DESCRIPTION</h5>
                <hr>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" required>
                </div>
                <div class="mb-3">
                    <label for="contactNo" class="form-label">Contact No.</label>
                    <input type="text" class="form-control" id="contactNo" required>
                </div>
                <div class="mb-3">
                    <label for="licenseNo" class="form-label">License No.</label>
                    <input type="text" class="form-control" id="licenseNo" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Expiry Date</label>
                    <input type="date" class="form-control" id="dob" required>
                </div>
                <button type="button" class="btn-next">Next</button>
            </div>
            <div class="step">
                <h5>SURVEY</h5>
                <hr>
                <div class="mb-3">
                    <label for="availability" class="form-label">Availability (Select all that apply):</label>
                    <div>
                        <input type="checkbox" id="availabilityMWF" value="MWF">
                        <label for="availabilityMWF">Monday</label>
                    </div>
                    <div>
                        <input type="checkbox" id="availabilityTTS" value="TTS">
                        <label for="availabilityTTS">Tuesday</label>
                    </div>
                    <div>
                        <input type="checkbox" id="availabilityMWF" value="MWF">
                        <label for="availabilityMWF">Wednesday</label>
                    </div>
                    <div>
                        <input type="checkbox" id="availabilityTTS" value="TTS">
                        <label for="availabilityTTS">Thursday</label>
                    </div>
                    <div>
                        <input type="checkbox" id="availabilityMWF" value="MWF">
                        <label for="availabilityMWF">Friday</label>
                    </div>
                    <div>
                        <input type="checkbox" id="availabilityTTS" value="TTS">
                        <label for="availabilityTTS">Saturday</label>
                    </div>
                    <div>
                        <input type="checkbox" id="availabilityTTS" value="TTS">
                        <label for="availabilityTTS">Sunday</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="income" class="form-label">Monthly Income:</label>
                    <select class="form-control" id="income" required>
                        <option value="" disabled selected>Select your income range</option>
                        <option value="Below 5000">Below 5,000</option>
                        <option value="5000-10000">5,000 - 10,000</option>
                        <option value="10000-15000">10,000 - 15,000</option>
                        <option value="15000-20000">15,000 - 20,000</option>
                        <option value="Above 20000">Above 20,000</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="income" class="form-label">How many children do you have?</label>
                    <select class="form-control" id="income" required>
                        <option value="" disabled selected>Select No.</option>
                        <option value="Below 5000">1</option>
                        <option value="5000-10000">2</option>
                        <option value="10000-15000">3</option>
                        <option value="15000-20000">4</option>
                        <option value="Above 20000">5</option>
                        <option value="Above 20000">6 Above</option>
                    </select>
                </div>
                <button type="button" class="btn-prev">Previous</button>
                <button type="button" class="btn-next">Next</button>
            </div>
            <div class="step">
                <h5>INSPECTION</h5>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>INSPECTION</th>
                            <th>Vehicle</th>
                            <th>Sidecar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tail Light</td>
                            <td><input type="checkbox" id="vehicleTailLight"></td>
                            <td><input type="checkbox" id="sidecarTailLight"></td>
                        </tr>
                        <tr>
                            <td>Head Light</td>
                            <td><input type="checkbox" id="vehicleHeadLight"></td>
                            <td><input type="checkbox" id="sidecarHeadLight"></td>
                        </tr>
                        <tr>
                            <td>Signal Light</td>
                            <td><input type="checkbox" id="vehicleSignalLightFront"> Front</td>
                            <td><input type="checkbox" id="vehicleSignalLightRear"> Rear</td>
                        </tr>
                        <tr>
                            <td>Brakes</td>
                            <td><input type="checkbox" id="vehicleBrakesLoud"> Loud</td>
                            <td><input type="checkbox" id="vehicleBrakesSoft"> Soft</td>
                        </tr>
                        <tr>
                            <td>Horn</td>
                            <td><input type="checkbox" id="vehicleHorn"></td>
                            <td><input type="checkbox" id="sidecarHorn"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn-prev">Previous</button>
                <button type="button" class="btn-next">Next</button>
            </div>
            <div class="step">
                <h5>UPLOAD</h5>
                <hr>
                <div class="mb-3">
                    <label for="officialReceipt" class="form-label">Official Receipt of the Vehicle</label>
                    <input type="file" class="form-control" id="officialReceipt" required>
                </div>
                <div class="mb-3">
                    <label for="registrationCertificate" class="form-label">Certificate of Registration of the Vehicle</label>
                    <input type="file" class="form-control" id="registrationCertificate" required>
                </div>
                <div class="mb-3">
                    <label for="franchise" class="form-label">Franchise of the Vehicle</label>
                    <input type="file" class="form-control" id="franchise" required>
                </div>
                <div class="mb-3">
                    <label for="communityTaxOwner" class="form-label">Community Tax Certificate of Owner</label>
                    <input type="file" class="form-control" id="communityTaxOwner" required>
                </div>
                <div class="mb-3">
                    <label for="communityTaxDriver" class="form-label">Community Tax Certificate of Driver</label>
                    <input type="file" class="form-control" id="communityTaxDriver" required>
                </div>
                <div class="mb-3">
                    <label for="barangayClearance" class="form-label">Barangay Clearance</label>
                    <input type="file" class="form-control" id="barangayClearance" required>
                </div>
                <div class="mb-3">
                    <label for="driversLicense" class="form-label">Professional Driver's License</label>
                    <input type="file" class="form-control" id="driversLicense" required>
                </div>
                <div class="mb-3">
                    <label for="deedOfSale" class="form-label">Deed of Sale</label>
                    <input type="file" class="form-control" id="deedOfSale" required>
                </div>
                <div class="mb-3">
                    <label for="trashBin" class="form-label">Trash Bin</label>
                    <input type="file" class="form-control" id="trashBin" required>
                </div>
                <button type="button" class="btn-prev">Previous</button>
                <button type="button" class="btn-next">Next</button>
            </div>
            <div class="step">
                <h5>PAYMENT</h5>
                <hr>
                <div class="mb-3">
                    <label for="receiptNumber" class="form-label">Receipt Number</label>
                    <input type="text" class="form-control" id="receiptNumber" required>
                </div>
                <button type="button" class="btn-prev">Previous</button>
                <button type="submit" class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<br><br> 
</main>
