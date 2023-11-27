@extends('layouts.home')

@section('main')

<main

      class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
      @if (session('success'))
    <div class="alert alert-success bg-blue-500">
        {{ session('success') }}
    </div>

@endif
      <!--      <div class="text-center p-12 border border-gray-800 rounded-xl">-->
      <!--        <h1 class="text-3xl justify-center items-center">Welcome to Barta!</h1>-->
      <!--      </div>-->

      <!-- Barta Create Post Card -->
      <form
        method="POST"
        action="{{ route('posts.store') }}"
        enctype="multipart/form-data"
        class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
        @csrf
        <!-- Create Post Card Top -->
        <div>
          <div class="flex items-start /space-x-3/">
            <!-- User Avatar -->
            <!--            <div class="flex-shrink-0">-->
            <!--              <img-->
            <!--                class="h-10 w-10 rounded-full object-cover"-->
            <!--                src="https://avatars.githubusercontent.com/u/831997"-->
            <!--                alt="Ahmed Shamim" />-->
            <!--            </div>-->
            <!-- /User Avatar -->

            <!-- Content -->
            <div class="text-gray-700 font-normal w-full">
              <textarea
                class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                name="body"
                rows="2"
                placeholder="{{'What\'s going on, '. auth()->user()->firstName . ' ' . auth()->user()->lastName . ' ' . '? please share your feelings with us   '  }}">{!! old('body') !!}</textarea>
            </div>
          </div>
        </div>

        <!-- Create Post Card Bottom -->
        <div>
          <!-- Card Bottom Action Buttons -->
          <div class="flex items-center justify-end">
            <div>
              <!-- Post Button -->
              <button
                type="submit"
                class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                Post
              </button>
              <!-- /Post Button -->
            </div>
          </div>
          <!-- /Card Bottom Action Buttons -->
        </div>
        <!-- /Create Post Card Bottom -->
      </form>
      <!-- /Barta Create Post Card -->

      <!-- Newsfeed -->
      <section
        id="newsfeed"
        class="space-y-6">
        <!-- Barta Card -->
        @foreach($posts as $post)

        <article
          class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
          <!-- Barta Card Top -->
          <header>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-3">
                <!-- User Avatar -->
                <!--                <div class="flex-shrink-0">-->
                <!--                  <img-->
                <!--                    class="h-10 w-10 rounded-full object-cover"-->
                <!--                    src="https://avatars.githubusercontent.com/u/61485238"-->
                <!--                    alt="Al Nahian" />-->
                <!--                </div>-->
                <!-- /User Avatar -->

                <!-- User Info -->
                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                  <a
                    href="profile.html"
                    class="hover:underline font-semibold line-clamp-1">
                    {{ $post->firstName . $post->lastName }}
                  </a>

                  <a
                    href="profile.html"
                    class="hover:underline text-sm text-gray-500 line-clamp-1">
                    {{ '@'. $post->username  }}
                  </a>
                </div>
                <!-- /User Info -->
              </div>

@if($post->user_id == auth()->user()->id)
               <!-- Card Action Dropdown -->
             <x-post.card-action :post="$post" postOrComment='post' edit='posts.edit' destroy='posts.destroy' />
              <!-- /Card Action Dropdown -->
             @endif

            </div>
          </header>

          <!-- Content -->
          <a href="{{ route('posts.show',['post'=>$post->id]) }}">
            <div class="py-4 text-gray-700 font-normal">
                <p>
                    {!!Str::markdown($post->body)  !!}
                </p>
            </div>
          </a>

          <!-- Date Created & View Stat -->
          <x-post-mata.date-view-info :post="$post" />

          <!-- Barta Card Bottom -->
          <footer class="border-t border-gray-200 pt-2">
            <!-- Card Bottom Action Buttons -->
            <div class="flex items-center justify-between">
              <div class="flex gap-8 text-gray-600">
                <!-- Comment Button -->

               <x-post-mata.comment-button :post="$post" :comments="$comments" />
                <!-- /Comment Button -->
              </div>
            </div>
            <!-- /Card Bottom Action Buttons -->
          </footer>
          <!-- /Barta Card Bottom -->
        </article>
        @endforeach
        <!-- /Barta Card -->

        <!-- /Barta Card -->
      </section>
      <!-- /Newsfeed -->
    </main>



@endsection


