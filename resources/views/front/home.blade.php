@extends('layouts.front')

@section('page-title', 'Home')
@section('styles')
    <link rel="stylesheet" href="{{ asset('front-assets/css/homepage.css') }}">

    @php
        $placeHolderTextFontSize = '1rem !important';

        if (strlen($placeHolderText) > 10) {
            $placeHolderTextFontSize = '11px !important';
        }

        if (strlen($placeHolderText) > 34) {
            $placeHolderTextFontSize = '9px !important';
        }

    @endphp

    <style>
        /* for small devices */

        @media (max-width: 576px) {


            #searchPlaceholder::placeholder {
                font-size: {{ $placeHolderTextFontSize }};
            }

        }
    </style>

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="page_title pt-4 mt-4 pb-4 text-center text-white">Search any Prop Firm</h2>
                <div class="search-container_2">
                    <div class="search-box">
                        <input type="text" id="searchPlaceholder" placeholder="{{ $placeHolderText }}"
                            class="form-control" oninput="searchFirm(this)">
                        <button class="cros-btn" id="crossBtn" onclick="removeSearch()" style="display: none">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/fc92f4b1e5ae453f85e52926657bffd07ae71ba903ace00620f07f9f4aaf57cf?apiKey=0c0d59785c2748c2ac1f9aa6f8f75c16&amp;"
                                alt="Search"
                                style="
                            width: 13px;position: relative;left: -15px;">
                        </button>
                        <button class="search-button">
                            <img src="https://img.icons8.com/ios-glyphs/30/ffffff/search.png" alt="Search"
                                style="width: 20px;">
                        </button>
                    </div>
                    <div class="search-results" id="searchCont" style="display: none !important;">
                    </div>
                    <div class="no-results d-flex justify-content-between align-items-center"
                        style="display: none !important;">
                    </div>
                </div>

                <p class="head_search mt-5">Popular Firms</p>
                <div class="popular-firms">

                    @foreach ($firms as $firm)
                        <div class="firm-logo">
                            <img src="{{ $firm->logo_url }}" alt="Topstep">
                            <div>
                                <a href="{{ route('firms.show-slug', ['slug' => $firm->slug]) }}">{{ $firm->name }}</a>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="mt-4 text-center">
                    <p class="compare_texts">Not sure what you're looking for?</p>
                    <a href="{{ route('compare.index') }}" class="compare-button">Compare</a>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!-- Section 1 End   -->
@endsection

@push('scripts')
    <script>
        var noResultDiv = document.querySelector('.no-results');
        var resultDiv = document.querySelector('#searchCont');

        var crossBtn = document.querySelector('#crossBtn');

        function removeSearch() {
            console.log('remove search');
            document.querySelector('.search-box input').value = '';
            noResultDiv.style.display = 'none !important';
            noResultDiv.innerHTML = '';
            resultDiv.style.display = 'none !important';
            resultDiv.innerHTML = '';

            crossBtn.style.display = 'none';
        }

        function searchFirm(input) {
            let enteredText = input.value;

            if (!enteredText) {
                noResultDiv.style.display = 'none !important';
                noResultDiv.innerHTML = '';
                resultDiv.style.display = 'none !important';
                resultDiv.innerHTML = '';

                crossBtn.style.display = 'none';
                return;
            }

            if (crossBtn.style.display == 'none') {
                crossBtn.style.display = 'block';
            }

            // send axios request to search firms

            axios.get('/firms/search', {
                    params: {
                        search: enteredText
                    }
                })
                .then(response => {
                    console.log('response', response);

                    let firms = response.data.data.firms;

                    if (firms.length > 0) {
                        resultDiv.style.display = 'block';

                        noResultDiv.style.display = 'none';
                        noResultDiv.innerHTML = '';

                        let searchResults = document.querySelector('.search-results');
                        searchResults.innerHTML = '';

                        firms.forEach(firm => {
                            let result = document.createElement('div');
                            result.classList.add('result');

                            let anchor = document.createElement('a');
                            anchor.href = '/firms/' + firm.slug;

                            let img = document.createElement('img');
                            img.src = firm.logo_url;
                            img.alt = firm.name;
                            result.appendChild(img);

                            let name = document.createElement('div');
                            name.innerText = firm.name;
                            result.appendChild(name);

                            anchor.appendChild(result);

                            searchResults.appendChild(anchor);
                        });
                    } else {

                        resultDiv.style.display = 'none';

                        noResultDiv.innerHTML = '';
                        noResultDiv.style.display = 'block';



                        // <button class="add-firm-btn">+ Add Firm</button>


                        // add no result found for the search in the div

                        let msg = document.createElement('span');
                        // add class to the span
                        msg.classList.add('result-text');
                        msg.innerText = 'No result found for "' + enteredText + '"';

                        noResultDiv.appendChild(msg);


                        // add above button in the div
                        let btn = document.createElement('button');
                        btn.classList.add('add-firm-btn');
                        btn.innerText = '+ Add Firm';
                        // add click event to the button
                        btn.addEventListener('click', function() {
                            addFirm(enteredText);
                        });

                        noResultDiv.appendChild(btn);


                    }

                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                    // hide loader
                });


        }

        function addFirm(text) {

            axios.post('/firms/request', {
                    name: text
                })
                .then(response => {
                    console.log('response', response);
                    // remove add-firm-btn
                    // add button with text Request Submitted
                    let firmBtn = document.querySelector('.add-firm-btn');
                    firmBtn.innerHTML = 'Request Submitted';
                    firmBtn.disabled = true;
                    firmBtn.style.backgroundColor = '#41b618';




                    noResultDiv.appendChild(btn);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    </script>
@endpush
