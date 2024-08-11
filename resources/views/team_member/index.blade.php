@extends('components.layouts.app')
@section("content")
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            {{$page_title}}
          </h2>
        </div>
      </div>
    </div>
  </div>
  @livewire('team-member')
@endsection