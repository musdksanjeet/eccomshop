<div>
    <div class="section-title-01 honmob">
        <!-- Parallax background image -->
        <div class="bg_parallax image_01_parallax"></div>
        <!-- Background overlay -->
        <div class="opacy_bg_02">
            <div class="container">
                <!-- Category name as the main title -->
                <h1>{{$scategory->name}} Services</h1>
                <!-- Breadcrumbs for navigation -->
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>{{$scategory->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content section -->
    <section class="content-central">
        <div class="container">
            <div class="row" style="margin-top: -30px;">
                <!-- Section titles and separator line -->
                <div class="titles">
                    <h2>{{$scategory->name}} <span>Services</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>

        <!-- Content information section -->
        <div class="content_info" style="margin-top: -70px;">
            <div>
                <div class="container">
                    <!-- Portfolio container for displaying services -->
                    <div class="portfolioContainer">
                        @isset($scategory)
                        <!-- Check if there are services in the specified category -->
                        @if($scategory->services->count() > 0)
                            <!-- Loop through each service in the category -->
                            @foreach($scategory->services as $service)
                                <!-- Service item with image, information, and a link to book -->
                                <div class="col-xs-6 col-sm-4 col-md-3 nature hsgrids" style="padding-right: 5px;padding-left: 5px;">
                                    <a class="g-list" href="{{route('home.services_by_category',['category_slug'=>$service->slug])}}">
                                        <!-- Service thumbnail image -->
                                        <div class="img-hover">
                                            <img src="{{asset('images/services/thumbnails')}}/{{$service->thumbnail}}" alt="{{$service->name}}" class="img-responsive">
                                        </div>
                                        <!-- Service information -->
                                        <div class="info-gallery">
                                            <h3>{{$service->name}}</h3>
                                            <hr class="separator">
                                            <p>{{$service->tagline}}</p>
                                            <!-- Button to book the service -->
                                            <div class="content-btn"><a href="{{route('home.services_by_category',['category_slug'=>$service->slug])}}" class="btn btn-primary">Book Now</a></div>
                                            <!-- Service price -->
                                            <div class="price"><span>$</span><b>From</b>{{$service->price}}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <!-- Display a message if there are no services in the category -->
                            <div class="col-md-12"><p class="text-center">There is no any services.</p></div>
                        @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>
