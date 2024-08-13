@extends('components.layouts.app')
@section("content")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <div class="page-pretitle">
            Module
          </div>
          <h2 class="page-title">
            {{$page_title}}
          </h2>
        </div>
      </div>
    </div>
  </div>
  @livewire('team-member')
  <div id="team-member-container"></div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
  <script>
  let baseUrl = "{{url('/')}}";

  $(document).ready(function() {
      $('#team-member').DataTable(

      );
  });

  function showModalForm(employee_id) {
    $.ajax({
      type: "GET",
      url: baseUrl + "/showModalForm",
      data: {"employee_id": employee_id},
      dataType: "JSON",
      success: function (response) {
        console.log(response.data);

        $("#team-member-container").html(response.data);
      }
    });
  }
  </script>
@endsection