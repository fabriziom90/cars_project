<div id="sidebar">
    <div class="top-sidebar">
        <a href="{{ route('admin.dashboard') }}">
            <h2>Logo</h2>
        </a>
    </div>
    <div class="bottom-sidebar">
        <ul class="list-unstyled">
            <li>
                <a class="{{ str_contains(Route::currentRouteName(), 'cars') ? 'active' : '' }}"
                    href="{{ route('admin.cars.index') }}">Cars</a>
            </li>
            <li>
                <a class="{{ str_contains(Route::currentRouteName(), 'brands') ? 'active' : '' }}"
                    href="{{ route('admin.brands.index') }}">Brands</a>
            </li>
            <li>
                <a class="{{ str_contains(Route::currentRouteName(), 'optionals') ? 'active' : '' }}"
                    href="{{ route('admin.optionals.index') }}">Optionals</a>
            </li>
        </ul>
    </div>
</div>
