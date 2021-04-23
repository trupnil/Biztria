@extends('user.master')
@section('main-section')
        <main id="content" role="main">
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="">Home</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-wd">
                        <div class="min-width-1100-wd">
                            

                            @foreach($getAllBlogs as $index => $value)

                            <article class="card mb-13 border-0">
                                <div class="row">
                                    <div class="col-lg-4 mb-5 mb-lg-0">
                                        <a href="{{ route('blogs.details',$value->blog_slug)  }}" class="d-block"><img src="blogimg/{{$value->blog_images}}" class="img-fluid min-height-250 object-fit-cover" alt="Image Description"></a>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body p-0">
                                            <h4 class="mb-3"><a href="{{ route('blogs.details',$value->blog_slug)  }}">{{ $value->blog_title }}</a></h4>
                                            <div class="mb-3 pb-3 border-bottom">
                                                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                                    <a href="" class="mx-0dot5 text-gray-5">{{ $value->getAllBlogsWithCategory->blog_category_name }}</a>
                                                   
                                                    <a href="" class="mx-0dot5 text-gray-5">&nbsp;/{{ $value->updated_at->diffForHumans() }}</a>
                                                </div>
                                            </div>
                                            <p>

                           {!!  substr(strip_tags($value->blog_details), 0, 200) !!}<a href="{{ route('blogs.details',$value->blog_slug)  }}">......</a>

           
                                            </p>
                                             @if ( strlen($value->blog_details ) > 200)
                                            <div class="flex-horizontal-center">
                                                <a href="{{ route('blogs.details',$value->blog_slug)  }}" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>
                                               
                                            </div>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            </article>

                            @endforeach
                            
                            
                          <div class="container">
                                {{ $getAllBlogs->links() }}
                          </div>
                            
                             
                            
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-wd">
                       
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">About Blog</h3>
                            </div>
                            <p class="text-gray-90 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero.</p>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Blogs Categories</h3>
                            </div>
                            <div class="list-group">

                                @foreach($BlogCategories as $index)
                                <a href="{{ route('blogs.category',$index->id) }}" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i class="mr-2 fas fa-angle-right"></i>{{ $index->blog_category_name }}</a>
                                @endforeach
                               
                            </div>
                        </aside>
                   
                    </div>
                </div>
              
            </div>
        </main>
@stop
      