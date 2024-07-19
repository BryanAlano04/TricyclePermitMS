<!-- add_applicant_modal.php -->
<div class="modal fade" id="addApplicantModal" tabindex="-1" aria-labelledby="addApplicantModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addApplicantModalLabel">Add Applicant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addApplicantForm">
          <div class="mb-3">
            <label for="applicantName" class="form-label">Name</label>
            <input type="text" class="form-control" id="applicantName" required>
          </div>
          <div class="mb-3">
            <label for="applicantEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="applicantEmail" required>
          </div>
          <div class="mb-3">
            <label for="applicantStatus" class="form-label">Status</label>
            <select class="form-control" id="applicantStatus" required>
              <option value="Completed">Completed</option>
              <option value="Pending">Pending</option>
              <option value="Process">Process</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Add Applicant</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#addApplicantForm').on('submit', function(event) {
    event.preventDefault();
    // Add your form submission logic here (e.g., AJAX call to the server)
    alert('Applicant added successfully!');
    $('#addApplicantModal').modal('hide');
  });
});
</script>
