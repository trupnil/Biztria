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
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
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
                             <article class="post type-post status-publish format-gallery has-post-thumbnail hentry" >
                                <div class="media-attachment">
                                    <div class="media-attachment-gallery">
                                        <div class=" ">
                                             <h4 class="mb-3"><a href="">{{ $getBlog->blog_title }}</a></h4>
                                            <div class="item">
                                                <figure>
                                                    <img width="800" height="400" src="\blogimg/{{$getBlog->blog_images}}" class="attachment-post-thumbnail size-post-thumbnail" alt="1" />
                                                </figure>
                                            </div><!-- /.item -->
                                        </div>
                                    </div><!-- /.media-attachment-gallery -->
                                </div>
                                <br>

                                <header class="entry-header">
                                    
                                    <div class="entry-meta">
                                        <span class="cat-links"><a href="#" rel="category tag">{{ $getBlog->getAllBlogsWithCategory->blog_category_name }}</a>  </span>&nbsp;| &nbsp;
                                        <span class="posted-on"><a href="#" rel="bookmark"><time class="entry-date published" datetime="2016-03-04T07:34:20+00:00">{{ $getBlog->updated_at->diffForHumans() }}</time> </a></span>
                                    </div>
                                </header><!-- .entry-header -->

                                <div class="entry-content" itemprop="articleBody">
                                    <p class="highlight"> 
                                        
                                        {!! $getBlog->blog_details  !!}
                                    
                                    
                                    </p>
                                    
                                   
                                </div><!-- .entry-content -->
                            </article>
                            
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