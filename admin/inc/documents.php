    <?php 

    ?>
    <style>
        /* Modal styles */
    /* Modal styles */
    /* Modal styles */
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1000; 
        left: 0;
        top: 0; /* Align to the top of the screen */
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.4); 
    }

    /* Ensure modal content is centered horizontally and positioned at the top */
    .modal-content {
        position: relative;
        max-width: 80%; /* Adjusted width */
        width: 600px; /* Fixed width for better control */
        margin: 20px auto; /* Center horizontally and add margin from the top */
        padding: 20px;
        border-radius: 10px;
        background-color: #fefefe;
        /* Center horizontally and place near the top */
        top: 0;
        transform: translateY(20px); /* Adjust vertical alignment if needed */
    }

    /* Close button styles */
    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .status-dropdown {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 5px;
    width: 100px;
    font-size: 14px;
}


    </style>
    <main>
    <div class="head-title">
            <div class="left">
                <h1>Documents</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Documents</a>
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
            <a href="#" class="btn-download">
                <i class='bx bx-user-plus'></i>
                <span class="text">Add Documents</span>
            </a>
        </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Requirements</h3>
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
                    <td>
                        <select class="status-dropdown">
                            <option value="pending" selected>Pending</option>
                            <option value="completed">complited</option>
                            <option value="process">Process</option>    
                        </select>
                    </td>
                    <td class="action-cell">
                        <button class="action-btn view-btn" data-docs='["img/RESIGNATION_LETTER.pdf", "img/01FORM-01.pdf", "img/the-value-proposition-canvas.pdf"]' title="View Documents"><i class="bx bx-show view-icon"></i></button>
                        <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                        <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                    </td>
                </tr>

                    <td>
                        <img src="img/profileko.png">
                        <p>Bryan Alano</p>
                    </td>
                    <td>01-10-2021</td>
                    <td>
                        <select class="status-dropdown">
                            <option value="completed" selected>Completed</option>
                            <option value="pending">Pending</option>
                            <option value="process">Process</option>
                        </select>
                    </td>
                    <td class="action-cell">
                        <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                        <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                        <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/profileko.png">
                        <p>Bryan Alano</p>
                    </td>
                    <td>01-10-2021</td>
                    <td>
                        <select class="status-dropdown">
                            <option value="completed" selected>Completed</option>
                            <option value="pending">Pending</option>
                            <option value="process">Process</option>
                        </select>
                    </td>
                    <td class="action-cell">
                        <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                        <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                        <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/profileko.png">
                        <p>Bryan Alano</p>
                    </td>
                    <td>01-10-2021</td>
                    <td>
                        <select class="status-dropdown">
                            <option value="completed" selected>Completed</option>
                            <option value="pending">Pending</option>
                            <option value="process">Process</option>
                        </select>
                    </td>
                    <td class="action-cell">
                        <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                        <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                        <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/profileko.png">
                        <p>Bryan Alano</p>
                    </td>
                    <td>01-10-2021</td>
                    <td>
                        <select class="status-dropdown">
                            <option value="completed" selected>Completed</option>
                            <option value="pending">Pending</option>
                            <option value="process">Process</option>
                        </select>
                    </td>
                    <td class="action-cell">
                        <button class="action-btn view-btn" title="View"><i class="bx bx-show view-icon"></i></button>
                        <button class="action-btn update-btn" title="Update"><i class="bx bxs-edit-alt update-icon"></i></button>
                        <button class="action-btn delete-btn" title="Delete"><i class="bx bx-trash delete-icon"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="documentModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Document Viewer</h2>
        <div id="pdfViewerContainer" style="width: 100%; height: 600px;">
            <canvas id="pdfCanvas"></canvas>
        </div>
        <div class="modal-controls">
            <button id="prevPage" title="Previous Document">Previous</button>
            <button id="nextPage" title="Next Document">Next</button>
            <button id="printDoc" title="Print Document">Print</button>
        </div>
    </div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf_viewer.min.css"/>

<script>
// Modal elements
var modal = document.getElementById("documentModal");
var span = document.getElementsByClassName("close-btn")[0];

// Select all view buttons
var viewButtons = document.querySelectorAll(".view-btn");

var currentDocumentIndex = 0; // Track the current document index
var pdfUrls = []; // Store document URLs
var currentPdf = null; // Store the current PDF document object

// Function to open the modal and load a PDF
function openModal(pdfUrls) {
    // Open the modal
    modal.style.display = "block";

    // Load the first PDF by default
    currentDocumentIndex = 0;
    loadDocument(pdfUrls[currentDocumentIndex]);

    // Store the PDF URLs
    window.pdfUrls = pdfUrls; // Make the URLs accessible globally
}

// Function to load a document
function loadDocument(pdfUrl) {
    var loadingTask = pdfjsLib.getDocument(pdfUrl);
    loadingTask.promise.then(function(pdf) {
        currentPdf = pdf; // Store the PDF document object

        pdf.getPage(1).then(function(page) {
            var scale = 1.5;
            var viewport = page.getViewport({ scale: scale });

            var canvas = document.getElementById('pdfCanvas');
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            page.render(renderContext).promise.then(function () {
                console.log('Page rendered');
            }).catch(function(error) {
                console.error('Error rendering page:', error);
            });
        }).catch(function(error) {
            console.error('Error getting page:', error);
        });
    }).catch(function(error) {
        console.error('Error loading PDF:', error);
    });
}

// Set up click events for view buttons
viewButtons.forEach(function(btn) {
    btn.onclick = function() {
        var docs = JSON.parse(btn.getAttribute('data-docs')); // Get the document URLs from data attribute
        openModal(docs);
    }
});

// Set up navigation for multiple documents
document.getElementById('nextPage').onclick = function() {
    if (currentDocumentIndex < pdfUrls.length - 1) {
        currentDocumentIndex++;
        loadDocument(pdfUrls[currentDocumentIndex]);
    }
};

document.getElementById('prevPage').onclick = function() {
    if (currentDocumentIndex > 0) {
        currentDocumentIndex--;
        loadDocument(pdfUrls[currentDocumentIndex]);
    }
};

// Function to print the document
document.getElementById('printDoc').onclick = function() {
    if (currentPdf) {
        printPDF();
    } else {
        console.error('No document loaded');
    }
};

// Print the currently loaded PDF
function printPDF() {
    // Create a new window for printing
    var printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print Document</title></head><body>');
    printWindow.document.write('<embed width="100%" height="100%" src="' + pdfUrls[currentDocumentIndex] + '" type="application/pdf">');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
}

// Close the modal when clicking on the close button
span.onclick = function() {
    modal.style.display = "none";
}

// Close the modal when clicking outside of the modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Function to update dropdown background color based on the selected status
function updateDropdownColor(dropdown) {
        const value = dropdown.value;
        let color;

        switch(value) {
            case 'completed':
                color = 'var(--blue)';
                break;
            case 'pending':
                color = 'var(--red)';
                break;
            case 'process':
                color = 'var(--yellow)';
                break;
            default:
                color = '#fff'; // Default color if no match
        }

        dropdown.style.backgroundColor = color;
        dropdown.style.color = value === 'completed' ? '#fff' : '#000'; // Adjust text color for better contrast
    }

    // Attach event listener to all status dropdowns
    document.querySelectorAll('.status-dropdown').forEach(dropdown => {
        // Initial color setting
        updateDropdownColor(dropdown);

        // Update color on dropdown change
        dropdown.addEventListener('change', () => {
            updateDropdownColor(dropdown);
        });
    });
</script>
