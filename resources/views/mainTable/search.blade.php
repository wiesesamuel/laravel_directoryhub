@extends('layouts.mainTable')

@section('content')


<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
                @include('components.advanced_search', array('search_categories' => $search_categories, 'search_cities' => $search_cities))
			</div>
		</div>
	</div>
</section>

<section class="section-sm">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2><a href="{{ route('message') }}">Nachricht schreiben</a></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>Results</h2>
                    <p>{{ $companies->count() }} Results</p>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            @foreach ( $categories_all as $category_all)
                                <li><a href="{{ route('category', [$category_all->id]) }} ">{{ $category_all->name}} <span>{{$category_all->companies->count()}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
				</div>
			</div>
            <div class="col-md-9">
				<div class="product-grid-list">
					<div class="row mt-30">
                        @if (count($companies) > 0)
                            @foreach ($companies as $company)
                                <div class="col-sm-12 col-lg-4 col-md-6">

                                    <!-- product card -->

                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">
                                                @if($company->logo)<a href="{{ route('company', [$company->id]) }}"><img class="card-img-top img-fluid" src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $company->logo) }}"/></a>@endif
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><a href="{{ route('company', [$company->id]) }}">{{$company->name}}</a></h4>
                                                @foreach ($company->categories as $singleCategories)
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('category', [$singleCategories->id]) }}"><i class="fa fa-folder-open-o"></i>{{ $singleCategories->name }}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                <p class="card-text">{{ substr($company->description, 0, 100) }}...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
				</div>
            {{ $companies->appends(request()->all())->links() }}
			</div>
		</div>
	</div>
</section>


@stop
