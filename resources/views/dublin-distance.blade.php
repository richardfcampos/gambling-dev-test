<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gabling Dev Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url("https://get.wallhere.com/photo/city-bridge-blue-Ireland-light-sky-15fav-Dublin-reflection-eye-cars-water-beautiful-topv111-night-1025fav-river-dark-landscape-lights-evening-interestingness-still-nice-topv555-topv333-time-gorgeous-topv1111-famous-transport-topv999-scene-eire-liffey-clear-explore-nighttime-mostinteresting-blogged-topv777-portfolio-favourite-OMG-110fav-Roskilde-feature-125fav-mostfavourited-pleasing-geo-lon-6265126-geo-lat-53346093-top20fav-cotcmostfavorited-asphetic-803397.jpg");
                color: #fff;
            }

            #dublin-table {
                background: rgba(255,255,255,0.9);
            }
        </style>
    </head>
    <body>
        <h1 class="text-center">Gambling Dev Test</h1>
        <h2 class="text-center">Max distance affiliates from Dublin in {{$distance}} KM</h2>
        <div class="container-fluid col-md-8"  id="dublin-table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Distance</th>
                </tr>
                </thead>
                <tbody>
                @foreach($affiliates as $affiliate)
                    <tr>
                        <th scope="row">{{$affiliate->affiliate_id}}</th>
                        <td>{{$affiliate->name}}</td>
                        <td>{{$affiliate->distance}} KM</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
