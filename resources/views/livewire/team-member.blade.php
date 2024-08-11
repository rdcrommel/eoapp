<div>
  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Invoices</h3>
          </div>
          <div class="card-body border-bottom py-3">
              <div class="d-flex">
                  <div class="text-secondary">
                      Show
                      <div class="mx-2 d-inline-block">
                          <input type="number" class="form-control form-control-sm" 
                                 wire:model="perPage" 
                                 size="3" 
                                 aria-label="Invoices count" 
                                 min="1">
                      </div>
                      entries
                  </div>
                  <div class="ms-auto text-secondary">
                      Search:
                      <div class="ms-2 d-inline-block">
                          <input type="text" class="form-control form-control-sm" 
                                 wire:model="search" 
                                 aria-label="Search invoice">
                      </div>
                  </div>
              </div>
          </div>
          <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap">
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
                          <tr>
                              <td>{{ $emp->created_at }}</td>
                              <td>{{ $emp->employee_lastname }} {{ $emp->employee_firstname }}</td>
                              <td>{{ $emp->employee_bio }}</td>
                              <td>{{ $emp->department }}</td>
                              <td>{{ $emp->position }}</td>
                              <td>{{ $emp->payroll_type }}</td>
                              <td>{{ $emp->daily_rate }} / {{ $emp->monthly_rate }}</td>
                              <td>{{ $emp->status }}</td>
                              <td>{{ $emp->remarks }}</td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
          <div class="card-footer d-flex align-items-center">
              <p class="m-0 text-secondary">
                  Showing <span>{{ $employees->firstItem() }}</span> to <span>{{ $employees->lastItem() }}</span> of <span>{{ $employees->total() }}</span> entries
              </p>
              <ul class="pagination m-0 ms-auto">
                  <li class="page-item {{ $employees->onFirstPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $employees->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                          prev
                      </a>
                  </li>

                  {{-- Limit the number of pagination buttons to 10 --}}
                  @php
                      $currentPage = $employees->currentPage();
                      $lastPage = $employees->lastPage();
                      $startPage = max(1, $currentPage - 4);
                      $endPage = min($lastPage, $currentPage + 5);
                  @endphp

                  @if ($startPage > 1)
                      <li class="page-item"><a class="page-link" href="{{ $employees->url(1) }}">1</a></li>
                      @if ($startPage > 2)
                          <li class="page-item disabled"><span class="page-link">...</span></li>
                      @endif
                  @endif

                  @for ($i = $startPage; $i <= $endPage; $i++)
                      <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                          <a class="page-link" href="{{ $employees->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor

                  @if ($endPage < $lastPage)
                      @if ($endPage < $lastPage - 1)
                          <li class="page-item disabled"><span class="page-link">...</span></li>
                      @endif
                      <li class="page-item"><a class="page-link" href="{{ $employees->url($lastPage) }}">{{ $lastPage }}</a></li>
                  @endif

                  <li class="page-item {{ $employees->hasMorePages() ? '' : 'disabled' }}">
                      <a class="page-link" href="{{ $employees->nextPageUrl() }}">
                          next 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>
