<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo text-center">
        <a href="{{route('home')}}" class="simple-text logo-normal">
            {{ __('Ravi Advertising') }}
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
            <li class="{{ $elementActive == 'statelist' || $elementActive == 'customerlist' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#masters">
                    <i class="nc-icon nc-settings"></i>
                    <p>
                        {{ __('Master') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $elementActive == 'statelist' || $elementActive == 'customerlist' ? 'show' : '' }}" id="masters">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'statelist' ? 'active' : '' }}">
                            <a href="{{ route('master.state.list') }}">
                                <i class="nc-icon nc-single-copy-04"></i>
                                <p>{{ __('State list') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'customerlist' ? 'active' : '' }}">
                            <a href="{{ route('home.list') }}">
                                <i class="nc-icon nc-badge"></i>
                                <p>{{ __('All Customers List') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif 
            
            @if(auth()->user()->role == 'Admin')
            <li class="{{ $elementActive == 'datewisereport' || $elementActive == 'totalreport' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#reports">
                    <i class="nc-icon nc-chart-pie-36"></i> 
                    <p>
                        {{ __('Report') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $elementActive == 'datewisereport' || $elementActive == 'totalreport' ? 'show' : '' }}" id="reports">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'datewisereport' ? 'active' : '' }}">
                            <a href="{{ route('report.datewisereport') }}">
                                <i class="nc-icon nc-calendar-60"></i>
                                <p>{{ __('Date Wise Report') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'totalreport' ? 'active' : '' }}">
                            <a href="{{ route('report.totalreport') }}">
                                <i class="nc-icon nc-paper"></i>
                                <p>{{ __('Total Report') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

        </ul>
        @include('layouts.footer')  

    </div>
</div>