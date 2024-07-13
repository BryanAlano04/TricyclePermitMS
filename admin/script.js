const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// Get the modal elements
const requestApplicationModal = document.getElementById('request-application-modal');
const uploadRequirementsModal = document.getElementById('upload-requirements-modal');

// Get the link elements that open modals
const requestApplicationLink = document.getElementById('request-application-link');
const uploadRequirementsLink = document.getElementById('upload-requirements-link');

// Get the <span> element that closes the modal
const closeButtons = document.querySelectorAll('.close');

// Open the modals when the corresponding links are clicked
requestApplicationLink.addEventListener('click', function(event) {
    event.preventDefault();
    requestApplicationModal.style.display = 'block';
});

uploadRequirementsLink.addEventListener('click', function(event) {
    event.preventDefault();
    uploadRequirementsModal.style.display = 'block';
});

// Close the modals when the close button or outside the modal is clicked
closeButtons.forEach(button => {
    button.addEventListener('click', function() {
        requestApplicationModal.style.display = 'none';
        uploadRequirementsModal.style.display = 'none';
    });
});

// Close the modal if the user clicks outside the modal content
window.addEventListener('click', function(event) {
    if (event.target === requestApplicationModal) {
        requestApplicationModal.style.display = 'none';
    }
    if (event.target === uploadRequirementsModal) {
        uploadRequirementsModal.style.display = 'none';
    }
});

// Form submission handling (optional)
const requestApplicationForm = document.getElementById('request-application-form');
const uploadRequirementsForm = document.getElementById('upload-requirements-form');

requestApplicationForm.addEventListener('submit', function(event) {
    event.preventDefault();
    // Handle form submission logic here (e.g., AJAX request)
    console.log('Request Application Form Submitted');
    requestApplicationModal.style.display = 'none';
});

uploadRequirementsForm.addEventListener('submit', function(event) {
    event.preventDefault();
    // Handle form submission logic here (e.g., AJAX request)
    console.log('Upload Requirements Form Submitted');
    uploadRequirementsModal.style.display = 'none';
});
