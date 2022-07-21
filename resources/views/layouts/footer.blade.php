

<footer class="footer footer-black ml-5 footer-white" style="position: fixed; bottom:0; left:0;">
    <div class="container-fluid">
        <div class="row">
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', made ') }}{{ __(' by ') }}<a class="@if(Auth::guest()) text-white @endif" href="https://www.retinodes.com" target="_blank">{{ __('Retinodes') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>