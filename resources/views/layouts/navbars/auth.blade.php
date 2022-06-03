<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo text-center">
        {{--<a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>--}}
        <a href="{{route('home')}}" class="simple-text logo-normal">
            {{ __('Petrol Pump') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Operator')
            <li class="{{ $elementActive == 'home' ? 'active' : '' }}">
                <a href="{{ route('home.add') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>
            @endif
            @if(auth()->user()->role == 'Admin')
            <li class="{{ $elementActive == 'product' || $elementActive == 'nozle' || $elementActive == 'cashverification' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#masters">
                    <i class="nc-icon nc-diamond"></i>
                    <p>
                        {{ __('Master') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $elementActive == 'product' || $elementActive == 'nozle' || $elementActive == 'cashverification' ? 'show' : '' }}" id="masters">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'product' ? 'active' : '' }}">
                            <a href="{{ route('product.list') }}">
                            {{--<a href="#" onclick="open_verify_pin_modal('product_page');">--}}
                                <i class="nc-icon nc-tile-56"></i>
                                <p>{{ __('Products') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'nozle' ? 'active' : '' }}">
                            <a href="{{ route('nozle.list') }}">
                            {{--<a href="#" onclick="open_verify_pin_modal('nozle_page');">--}}
                                <i class="nc-icon nc-tile-56"></i>
                                <p>{{ __('Nozle') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cashverification' ? 'active' : '' }}">
                            <a href="{{route('cashverification.option')}}">
                                <i class="nc-icon nc-tile-56"></i>
                                <p>{{ __('Cash Verification') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            @if(auth()->user()->role == 'Admin')
            <li class="{{ $elementActive == 'unverified' ? 'active' : '' }}">
                <a href="{{ route('cashdetail.unverified') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('VERIFY YOUR CASH') }}</p>
                </a>
            </li>
            @endif
            @if(auth()->user()->role == 'Admin')
            <li class="{{ $elementActive == 'verified' ? 'active' : '' }}">
                <a href="{{ route('cashdetail.verified') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('PREPARE BATCH') }}</p>
                </a>
            </li>
            @endif
            @if(auth()->user()->role == 'Admin')
            <li class="{{ $elementActive == 'batches' ? 'active' : '' }}">
                <a href="{{ route('cashdetail.batches') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Batches') }}</p>
                </a>
            </li>
            @endif
            @if(auth()->user()->role == 'Admin')
            <li class="{{ $elementActive == 'comulativebatchreport' ? 'active' : '' }}">
                <a href="{{ route('comulative.batch.report') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Comulative Batch Report') }}</p>
                </a>
            </li>
            @endif
          

        </ul>
    </div>
</div>