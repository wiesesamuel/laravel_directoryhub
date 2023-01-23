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

                    <!-- Header Content -->
                    <div class="content-block">
                        <h1>{{ trans('mainpage.main_title') }}</h1>
                        <p>{!! trans('mainpage.sub_title') !!}</p>
                    </div>

                    <!-- Advance Search -->
                    @include('components.advanced_search', array('search_categories' => $search_categories, 'search_cities' => $search_cities))

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

                    <!-- Category Grid -->
                    <div class="row">
{{--                        @include('components.category_list', array('categories_all' => $categories_all->take(8)))--}}
                        @include('components.category_grid', array('categories_all' => $categories_all->take(8)))
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


@stop
