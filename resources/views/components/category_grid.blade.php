<style>
    .services-block-three{
        margin-bottom: 30px;
    }
    .services-block-three i {
        font-size: 32px;
    }
    .services-block-three>a {
        display: block;
        border: 2px solid #d5d5d5;
        border-radius: 4px;
        text-align: center;
        background: #fff;
        padding: 20px;
        position: relative;
        margin-bottom:30px;

    }
    .services-block-three>a:before {
        display: block;
        content: "";
        width: 9%;
        height: 17%;
        position: absolute;
        bottom: -2px;
        right: -2px;
        border-bottom: 2px solid #03a9f5;
        border-right: 2px solid #03a9f5;
        transition: all 0.5s ease 0s;
        -webkit-transition: all 0.5s ease 0s;
    }
    .services-block-three>a:after {
        display: block;
        content: "";
        width: 9%;
        height: 17%;
        position: absolute;
        top: -2px;
        left: -2px;
        border-top: 2px solid #03a9f5;
        border-left: 2px solid #03a9f5;
        transition: all 0.5s ease 0s;
        -webkit-transition: all 0.5s ease 0s;
    }
    .padding-15px-bottom {
        padding-bottom: 15px;
    }
    .services-block-three h4 {
        color: #6f6f6f;
        font-size: 14px;
        margin-bottom: 10px;
        font-weight: 600;
    }
    .services-block-three p {
        margin-bottom: 0;
        color: #757575;
    }
    .services-block-three>a:hover {
        opacity: 1;
        border-color: #d5d5d5;
    }
    /*a:hover, a:active {*/
    /*    color: #03a9f5;*/
    /*    text-decoration: none;*/
    /*}*/

    .services-block-three>a:hover:before, .services-block-three>a:hover:after {
        width: 95%;
        height: 90%;
    }
</style>

<section>
    <div class="container">
        <div class="row">
            @foreach ($categories_all as $category)
                <div class="services-block-three col-lg-4 col-md-6 sm-margin-30px-bottom xs-margin-20px-bottom">
                    <div class="services-block-three">
                        <a href="{{ route('category', [$category->id]) }}">
                            <div class="padding-15px-bottom">
                                <i class="{{ $category->icon }} icon-bg-{{ $category->id }}"></i>
                            </div>
                            <h4>
                                {{ $category->name }}
                                <p style="display: inline">
                                    ({{ $category->companies->count() }})
                                </p>
                            </h4>
                            <p class="xs-font-size13 xs-line-height-22">
                                {{ $category->description }}
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach

{{--            <div class="col-lg-4 col-md-6 margin-30px-bottom xs-margin-20px-bottom">--}}
{{--                <div class="services-block-three">--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <div class="padding-15px-bottom">--}}
{{--                            <i class="fa fa-eercast"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Branding Design</h4>--}}
{{--                        <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-6 margin-30px-bottom xs-margin-20px-bottom">--}}
{{--                <div class="services-block-three">--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <div class="padding-15px-bottom">--}}
{{--                            <i class="fa fa-snowflake-o"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Bootstrap Framework</h4>--}}
{{--                        <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="services-block-three col-lg-4 col-md-6 margin-30px-bottom xs-margin-20px-bottom">--}}
{{--                <div class="services-block-three">--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <div class="padding-15px-bottom">--}}
{{--                            <i class="fa fa-braille"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Creative Ideas</h4>--}}
{{--                        <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="services-block-three col-lg-4 col-md-6 xs-margin-20px-bottom">--}}
{{--                <div class="services-block-three">--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <div class="padding-15px-bottom">--}}
{{--                            <i class="fa fa-object-ungroup"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Easy page builder</h4>--}}
{{--                        <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="services-block-three col-lg-4 col-md-6">--}}
{{--                <div class="services-block-three">--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <div class="padding-15px-bottom">--}}
{{--                            <i class="fa fa-paper-plane-o"></i>--}}
{{--                        </div>--}}
{{--                        <h4>Clean Modern Code</h4>--}}
{{--                        <p class="xs-font-size13 xs-line-height-22">Exhaustive technology of implementing multi purpose projects is putting your project successful.</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- end -->
        </div>
    </div>
</section>
