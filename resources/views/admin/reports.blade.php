@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h2 style="margin-top: 0;">{{ $reportTitle }}</h2>

            <canvas id="myChart"></canvas>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            <script>
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: '{{ $chartType }}',
                    data: {
                        labels: [
                            @foreach ($results as $group => $result)
                                "{{ $group }}",
                            @endforeach
                        ],

                        datasets: [{
                            label: '{{ $reportLabel }}',
                            data: [
                                @foreach ($results as $group => $result)
                                    {!! $result !!},
                                @endforeach
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
@stop
