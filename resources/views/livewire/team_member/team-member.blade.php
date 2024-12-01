<div>

    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Invoices</h3>
            </div> --}}
            {{-- <div class="mb-3" style="width: 200px; display:block;">
                <select type="text" class="form-select" id="select-users" value="">
                    <option value="1">Chuck Tesla</option>
                    <option value="2">Elon Musk</option>
                    <option value="3">Paweł Kuna</option>
                    <option value="4">Nikola Tesla</option>
                </select>
            </div> --}}
            <div class="table-responsive" style="padding: 10px;">
                <table id="team-member" class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
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
                        @foreach ($employees as $emp)
                            <tr onclick="showModalForm({{ $emp->employee_id }})" style="cursor: pointer;">
                                <td>{{ $emp->created_date }}</td>
                                <td>{{ $emp->employee_lastname }} {{ $emp->employee_firstname }}</td>
                                <td>{{ $emp->employee_bio }}</td>
                                <td>{{ $emp->department_name }}</td>
                                <td>{{ $emp->position_name }}</td>
                                <td>{{ $emp->employee_payrolltype }}</td>
                                <td>{{ $emp->employee_dailyrate }}{{ $emp->employee_monthlyrate }}</td>
                                <td>{!! returnLabel($emp->approval_status) !!}</td>
                                <td>{{ $emp->remarks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @php
        function returnLabel($status) {
            $label = '';

            if($status == "For Verification") {
                $label = '<span class="badge bg-yellow text-yellow-fg">'.$status.'</span>';
            }

            if($status == "For Approval") {
                $label = '<span class="badge bg-azure text-azure-fg">'.$status.'</span>';
            }

            if($status == "Rejected") {
                $label = '<span class="badge bg-red text-red-fg">Disapproved</span>';
            }

            if($status == "Approved") {
                $label = '<span class="badge bg-green text-green-fg">'.$status.'</span>';
            }

            return $label;
        }
    @endphp

</div>

