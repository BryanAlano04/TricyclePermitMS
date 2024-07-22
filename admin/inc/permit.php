<style>
/* Main styles */
.permit-container {
    display: none; /* Hidden by default */
    width: 70%;
    margin: 0 auto;
    border: 1px solid black;
    padding: 20px;
    page-break-after: always;
    position: relative; /* To position the logo absolutely */
}

.permit-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.permit-header img {
    width: 100px; /* Adjust the size as needed */
    position: absolute;
    top: 20px;
    left: 20px;
}

.permit-header h1, .permit-header h3 {
    margin: 0;
    margin-left: 140px; /* Space for the logo */
    text-align: center;
}

.permit-content {
    margin-top: 60px; /* Space for the logo */
}

.permit-content table {
    width: 100%;
    border-collapse: collapse;
}

.permit-content th, .permit-content td {
    padding: 10px;
    border: 1px solid black;
    text-align: left;
}

.permit-footer p {
    margin-top: 20px;
}

/* Print styles */
@media print {
    .modal, .btn-print {
        display: none; /* Hide modal and print button during print */
    }
    .permit-container {
        display: block; /* Show permit container during print */
        width: 100%;
        border: none;
        margin: 0;
        padding: 0;
    }
}



    </style>
<main>
<div class="head-title">
		<div class="left">
			<h1>Permits</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Permits</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="#">Home</a>
				</li>
			</ul>
		</div>
		<!-- <a href="#" class="btn-download">
			<i class='bx bxs-cloud-download' ></i>
			<span class="text">Download PDF</span>
		</a> -->
		<!-- <a href="#" class="btn-download">
			<i class='bx bx-user-plus'></i>
			<span class="text">Add Documents</span>
		</a> -->
	</div>
<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Tricycle Permit</h3>
            <i class='bx bx-search' ></i>
            <i class='bx bx-filter' ></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status completed">Completed</span></td>
                <td class="action-cell">
                <button class="action-btn btn-download" title="Generate Permit" onclick="generatePermit('Bryan Alano', 'Juan Dela Cruz', '123 Street, Barangay, City', '09123456789', 'ABC123', 'FR12345')">
                    <i class="bx bx-printer" style="font-size: 20px;"></i>
                </button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">Pending</span></td>
                <td class="action-cell">
                <button  class="btn-download" title="Generate Permit">
                    <i class="bx bx-printer" style="font-size: 20px;"></i>
                </button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status process">Process</span></td>
                <td class="action-cell">
                <button  class="btn-download" title="Generate Permit">
                    <i class="bx bx-printer" style="font-size: 20px;"></i>
                </button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">Pending</span></td>
                <td class="action-cell">
                <button  class="btn-download" title="Generate Permit">
                    <i class="bx bx-printer" style="font-size: 20px;"></i>
                </button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/profileko.png">
                    <p>Bryan Alano</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status completed">Completed</span></td>
                <td class="action-cell">
                <button  class="btn-download" title="Generate Permit">
                    <i class="bx bx-printer" style="font-size: 20px;"></i>
                </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</main>

<!-- Modal for Permit -->
<div id="edit-applicants-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close btn-print">&times;</span>
        <div style="font-family: serif;" class="permit-container" id="permitContainer">
            <div class="permit-header">
                <img src="../balayan.png" alt="Balayan Logo">
                <br>
                <div>
                    <h1>Tricycle Permit</h1>
                    <h3>Municipality of Balayan, Batangas</h3>
                </div>
            </div>
            <div class="permit-content">
                <table>
                    <tr>
                        <th>Tricycle Owner</th>
                        <td id="ownerName"></td>
                    </tr>
                    <tr>
                        <th>Tricycle Driver</th>
                        <td id="driverName"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="driverAddress"></td>
                    </tr>
                    <tr>
                        <th>Contact No.</th>
                        <td id="driverContact"></td>
                    </tr>
                    <tr>
                        <th>Registration Plate No.</th>
                        <td id="plateNo"></td>
                    </tr>
                    <tr>
                        <th>Franchise No.</th>
                        <td id="franchiseNo"></td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center" class="permit-footer">
                <p>This permit certifies that the holder is authorized to operate a tricycle within the Municipality of Balayan, Batangas. This permit is valid for one year from the date of issuance and must be displayed prominently on the tricycle at all times.</p>
                <p>Approved by:<br><br><hr>Razelle P. De Los Reyes<br>(Licensing Officer III)</p>
            </div>
            <div class="button-group">
                <button class="btn-download btn-print" type="button" id="cancel-button">Cancel</button>
                <button class="btn-submit btn-print" onclick="printPermit()">Print Permit</button>
            </div>
        </div>
    </div>
</div>



