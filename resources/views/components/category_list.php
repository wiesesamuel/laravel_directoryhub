<div class="advance-search">
    @foreach ($categories_all as $category_all)
    <!-- Category list -->
    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
        <div class="category-block">
            <div class="header">
                <i class="{{ $category_all->icon }} icon-bg-{{ $category_all->id }}"></i>
                <h4>
                    <a href="{{ route('category', [$category_all->id]) }}">{{ $category_all->name }} <p style="display: inline">({{ $category_all->companies->count() }})</p></a>

                </h4>
            </div>
            <ul class="category-list">
                @foreach ( $category_all->companies->shuffle()->take(4) as $singleCompany)
                <li><a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name}} </a></li>
                @endforeach
            </ul>
        </div>
    </div> <!-- /Category List -->
    @endforeach
</div>
