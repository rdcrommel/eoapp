<div class="modal modal-blur fade" id="form-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="example-text-input" placeholder="Your report name" disabled>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Payroll Type</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Daily Rate/Monthly Rate</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Payroll Type</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Daily Rate/Monthly Rate</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">SSS No.</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Pag-ibig No.</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">TIN No.</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Philhealth.</label>
              <input type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-body">
        <div class="col-lg-12">
          <div>
            <label class="form-label">Remarks</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
        <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Create new report
        </a>
      </div>
    </div>
  </div>
</div>

  <script>
     $(document).ready(function() {
        $("#form-modal").modal('show');
  });
  </script>
  