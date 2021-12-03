@extends ('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="section-body">
    <!-- Main Content -->
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="alert alert-info alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
          <div class="alert-title">Hallo, {{ Auth::user()->name }}</div>
          Selamat Datang Di Schoolmedia!
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Cerita</h4>
              </div>
              <div class="card-body">
                {{ $note }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total User</h4>
              </div>
              <div class="card-body">
                10
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-6 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h4>Rating</h4>
            </div>
            <div class="card-header">
            {{-- <h4>Total Pelayanan : {{ $pelayanan->count() }}</h4> --}}
            </div>
          {{-- @if (Auth::user()->role == 'pegawai')
            <div class="card-body">
              <canvas id="myChart" height="182"></canvas>
            </div>
          @endif --}}
            <div class="card-body">
              <canvas id="myChart" height="182"></canvas>
            </div>
          </div>
        </div>
        </div>
        <script src="https://demo.getstisla.com/assets/modules/chart.min.js"></script>

<script>
"use strict";

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    
    datasets: [{
      label: 'Rating',
      data: [
        20, 15
      ],
      borderWidth: 2,
      backgroundColor: [
                '#E6E6FA',
                '#FFF0F5',
                '#ADD8E6',
                '#FFB6C1',
            ],
      borderColor: '#6777ef',
    }],
    labels: [
      "Cerita 1", "Cerita 2"
            ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'botom',
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        }
      }],
    },
  }
});

</script>
    @endsection


    @push ('page-scripts')
    
    
    @endpush
