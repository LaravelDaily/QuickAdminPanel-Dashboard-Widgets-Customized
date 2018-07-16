<div class="row">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    @foreach($graphs as $title => $graphData)
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $graphData['reportTitle'] }}
                </div>

                <canvas id="{{ $title }}Graph" style="padding-left: 10px;"></canvas>
            </div>
        </div>

        <script>
            new Chart(document.getElementById("{{ $title }}Graph"), {
                type: '{{ $graphData['chartType'] }}',
                data: {
                    labels: [
                        @foreach ($graphData['results'] as $group => $result)
                            "{{ $group }}",
                        @endforeach
                    ],

                    datasets: [{
                        label: '{{ $graphData['reportLabel'] }}',
                        data: [
                            @foreach ($graphData['results'] as $group => $result)
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
    @endforeach
</div>