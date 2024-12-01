@extends('components.layouts.app')
@section("content")

<link href="https://cdn.datatables.net/v/dt/dt-2.1.4/b-3.1.1/fc-5.0.1/fh-4.0.1/kt-2.12.1/sb-1.8.0/datatables.min.css" rel="stylesheet">
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
<div class="col-12">
    <div class="card">
        <div class="table-responsive" style="padding: 10px;">
            <table id="team-member" class="table card-table table-vcenter text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Created</th>
                        <th>Full Name</th>
                        <th>Bio ID</th>
                        <th>Department/Branch</th>
                        <th>Position</th>
                        <th>Payroll Type</th>
                        <th>Daily Rate/Monthly Rate</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="team-member-container"></div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.1.4/b-3.1.1/fc-5.0.1/fh-4.0.1/kt-2.12.1/sb-1.8.0/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
<script>
    $(document).ready(function() {
        teamMemberTable = new DataTable('#team-member', {
            columnDefs: [
                {
                    targets: [1, 2, 5, 7, 8],
                    className: 'text-center', 
                    render: function (data, type, row, meta) {
                        if (type === 'header') {
                            return '<th class="text-center">' + data + '</th>';
                        }
                        return data;
                    }
                },
                {
                    targets: [0],
                    visible: false
                }
            ]
        });

        $('#team-member tbody').on('click', 'tr', function() {
            var row = teamMemberTable.row(this).data();
            var employee_id = row[0];

            showModalForm(employee_id);
        });

        getAllTeamMember()
    });

    function getAllTeamMember() {

        teamMemberTable.clear();
        $.ajax({
            type: "GET",
            url: "{{ url('/getAllTeamMember') }}",
            dataType: "JSON",
            success: function (response) {
                let data = response.data;
                for (let i = 0; i < data.length; i++) {
                    let row = [];
                    for(let j = 0; j < data[i].length; j++){
                        row.push(data[i][j]);
                    }
                    teamMemberTable.row.add(row);
                }

                teamMemberTable.draw();
            }
        });
    }

    function showModalForm(employee_id) {
        $.ajax({
            type: "GET",
            url: "{{ url('/showModalForm') }}",
            data: {"employee_id": employee_id},
            dataType: "JSON",
            success: function (response) {
                console.log(response.data);
                $("#team-member-container").html(response.data);
            }
        });
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('select-users'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
</script>
@endsection
