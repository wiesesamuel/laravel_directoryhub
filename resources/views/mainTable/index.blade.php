@extends('layouts.mainTable')

@section('content')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>{{ trans('mainpage.main_title') }}</h1>
					<p>{!! trans('mainpage.sub_title') !!}</p>
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
                    <form action="{{ route('search') }}" method="GET">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="search" value="{{ old('search') }}" class="form-control"
                                       placeholder="{{ trans('mainpage.placeholder_main_search') }}" />
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <select name="categories" class="form-control form-control-lg" placeholder="{{ trans('mainpage.placeholder_main_dropdown') }}">
                                    @foreach ($search_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('categories'))
                                    <p class="help-block">
                                        {{ $errors->first('categories') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <select name="city_id" class="form-control form-control-lg" placeholder="{{ trans('mainpage.placeholder_sub_dropdown') }}">
                                    @foreach ($search_cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('city_id'))
                                    <p class="help-block">
                                        {{ $errors->first('city_id') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group col-md-2">
                                <button type="submit"
                                        class="btn btn-main">
                                    {{ trans('mainpage.main_search') }}
                                </button>
                            </div>

                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <a href="#" id="advanced-search-link"><i class="fas fa-angle-down"></i> {{ trans('mainpage.advanced_search') }}</a>
                                <div id="advanced-search" style="display:none;">
                                    text
                                    <!-- Add your advanced search fields here -->
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        $('#advanced-search-link').click(function(e) {
                            e.preventDefault();
                            $('#advanced-search').toggle();
                        });
                    </script>

                </div>
            </div>
        </div>
	</div>

	<!-- Container End -->
</section>


<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>{{ trans('mainpage.category_title') }}</h2>
					<p>{!! trans('mainpage.category_sub_title') !!}</p>
				</div>
                <div class="row">
                    @foreach ($categories_all->take(8) as $category_all)
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
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


@stop
