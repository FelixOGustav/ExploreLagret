@extends('Layouts/AdminTemplate')
@section('adminContent')
<!-- Charts.js import -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" integrity="sha256-o8aByMEvaNTcBsw94EfRLbBrJBI+c3mjna/j4LrfyJ8=" crossorigin="anonymous"></script>
<div class="panel" style="width: 350px; height: 450px;">
    <h2 style="text-align:center;">Fördelning mellan församlingarna</h2>
    <canvas id="placesChart" width="250" height="250"></canvas>
</div>
<div class="panel" style="width: 800px; height: 650px;">
    <h2 style="text-align:center;">Fördelning av platser</h2>
    <canvas id="spotsChart" width="550" height="450"></canvas>
</div>
<script>
    // Pie chart
    var ctx = document.getElementById('placesChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: [
                "{{$placesStats[0]->place->placename}}",
                "{{$placesStats[1]->place->placename}}",
                "{{$placesStats[2]->place->placename}}",
                "{{$placesStats[3]->place->placename}}",
                "{{$placesStats[4]->place->placename}}",
                "{{$placesStats[5]->place->placename}}",
                "{{$placesStats[6]->place->placename}}",
                "{{$placesStats[7]->place->placename}}",
                "{{$placesStats[8]->place->placename}}",
                "{{$placesStats[9]->place->placename}}",
                "{{$placesStats[10]->place->placename}}",
                "{{$placesStats[11]->place->placename}}",
            ],
            datasets: [{
                label: "Fördelning mellan församlingar",
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(66, 158, 244)',
                    'rgb(65, 244, 140)',
                    'rgb(211, 244, 65)',
                    'rgb(244, 148, 65)',
                    'rgb(202, 65, 244)',
                    'rgb(244, 65, 65)',
                    'rgb(65, 65, 244)',
                    'rgb(244, 65, 145)',
                    'rgb(48, 153, 140)',
                    'rgb(140, 51, 76)',
                    'rgb(255, 246, 0)'
                    ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(66, 158, 244)',
                    'rgb(65, 244, 140)',
                    'rgb(211, 244, 65)',
                    'rgb(244, 148, 65)',
                    'rgb(202, 65, 244)',
                    'rgb(244, 65, 65)',
                    'rgb(65, 65, 244)',
                    'rgb(244, 65, 145)',
                    'rgb(48, 153, 140)',
                    'rgb(140, 51, 76)',
                    'rgb(255, 246, 0)'
                    ],
                data: [
                    {{$placesStats[0]->amount}}, 
                    {{$placesStats[1]->amount}},
                    {{$placesStats[2]->amount}},
                    {{$placesStats[3]->amount}},
                    {{$placesStats[4]->amount}},
                    {{$placesStats[5]->amount}},
                    {{$placesStats[6]->amount}},
                    {{$placesStats[7]->amount}},
                    {{$placesStats[8]->amount}},
                    {{$placesStats[9]->amount}},
                    {{$placesStats[10]->amount}},
                    {{$placesStats[11]->amount}}
                    ],
            }]
        },

        // Configuration options go here
        /*options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }*/
    });

    // Stacked bar chart
    var placesStats = {!! json_encode($placesStats) !!};
    console.log(placesStats);
    
    var labels = placesStats.map(element => element.place.placename);
    var totalMax = placesStats.map(element => element.place.spots);
    var participants = placesStats.map(element => element.participants);
    var leaders = placesStats.map(element => element.leaders);

    var maxColor = placesStats.map(element => 'rgba(255, 99, 132, 0.5)');
    var participantsColor = placesStats.map(element => 'rgba(255, 159, 64, 0.5)');
    var leadersColor = placesStats.map(element => 'rgba(15, 115, 255, 0.5)');

    var ctx = document.getElementById("spotsChart");
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Tillgängliga platser',
            data: totalMax,
            backgroundColor: maxColor,
            borderColor: maxColor,
            borderWidth: 2
        },
        {
            label: 'Deltagare',
            data: participants,
            backgroundColor: participantsColor,
            borderColor: participantsColor,
            borderWidth: 2
        },
        {
            label: 'Ledare',
            data: leaders,
            backgroundColor: leadersColor,
            borderColor: leadersColor,
            borderWidth: 2
        }
        ]
    },
    options: {
        scales: {
        yAxes: [{
            stacked: false,
            ticks: {
            beginAtZero: true
            }
        }],
        xAxes: [{
            stacked: false,
            ticks: {
            beginAtZero: true
            }
        }]

        }
    }
    });
</script>
@endsection