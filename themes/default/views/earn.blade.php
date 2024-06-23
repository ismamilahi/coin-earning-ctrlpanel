@extends('layouts.main')
@section('content')
<link href="{{ asset('css/earn-styles.css') }}" rel="stylesheet">



<!-- AdSense auto ads code -->
<script data-ad-client="ca-pub-XXXXXXXXXXXXXXXX" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>

@if(!request()->is('adblocker-found'))
    @if(!request()->is('mobile'))
        <!-- Adblocker detection script for desktop browsers (Updated) -->
        <script>
            function detectAdblocker() {
                var adBlockEnabled = false;
                var testAd = document.createElement('ins');
                testAd.className = 'adsbygoogle';
                testAd.style.display = 'block';
                testAd.style.height = '280px';
                testAd.setAttribute('data-ad-format', 'auto');
                testAd.setAttribute('data-full-width-responsive', 'true');
                testAd.innerHTML = '&nbsp;'; // Add some content inside the ad element
                document.body.appendChild(testAd);
                window.setTimeout(function() {
                    var adStyles = window.getComputedStyle(testAd);
                    if (testAd.offsetHeight < 24 || adStyles.getPropertyValue('display') === 'none' || adStyles.getPropertyValue('visibility') === 'hidden') {
                        adBlockEnabled = true;
                    }
                    testAd.remove();
                    if (adBlockEnabled) {
                        window.location.href = "/adblocker-found";
                    }
                }, 1000);
                setTimeout(function() {
                    detectAdblocker();
                }, 4000); // repeat after 4 seconds
            }

            // Call the adblocker detection function
            detectAdblocker();
        </script>
        <!-- Adblocker detection script for mobile browsers -->
        <script>
            function detectAdblocker() {
                var adBlockEnabled = false;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log('Adblocker not detected on mobile browser');
                        } else {
                            adBlockEnabled = true;
                            window.location.href = "/adblocker-found";
                        }
                    }
                };
                xhr.send();
                setTimeout(function() {
                    detectAdblocker();
                }, 4000); // repeat after 4 seconds
            }
            detectAdblocker();
        </script>
    @endif
@endif

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{__('Earn Coins')}}</h5>
                    </div>
                </div>
                <div class="card-body table-responsive">

                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Reward')}}</th>
                            <th>{{__('Daily Limit')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(true)
                            <tr>
                                <td>Linkvertise</td>
                                <td><span class="badge bg-light text-dark">5 Coins</span></td>
                                <td><span class="badge bg-light text-dark">{{ Session::get("linkvertise_count_" . Auth::id(), 0) . "/" . app('App\Http\Controllers\EarnController')->getDailyLimit() }} Complete</span></td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>
                                    <a href="{{ url('earn/lv') }}" class="earn-button">
                                        <div class="animated-button">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            Start
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endif

                        @if(false)
                            <tr>
                                <td>Adsense</td>
                                <td><span class="badge bg-light text-dark">5 Coins</span></td>
                                <td><span class="badge bg-light text-dark">5 Link Per Day</span></td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td><a href="{{ url('earn/ad') }}">
                                        <button class="btn btn-primary px-4 py-2">Start</button>
                                    </a></td>
                            </tr>
                        @endif

                        @if(true)
                            <tr>
                                <td>Clickcoin</td>
                                <td><span class="badge bg-light text-dark">1 Coins</span></td> <!-- Replace X with the actual reward amount -->
                                <td><span class="badge bg-light text-dark">Unlimited</span></td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td><a href="{{ url('earn/clickcoin') }}" target="_blank">
                                        <div class="animated-button">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            Start
                                        </div>
                                    </a></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
