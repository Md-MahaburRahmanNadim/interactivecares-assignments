@extends('layouts.home')
@section('main')

<main class="container max-w-2xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
      <!-- Newsfeed -->
      <section id="newsfeed" class="space-y-6">
        <!-- Barta Card -->
        <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
          <!-- Barta Card Top -->
          <header>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-3">
                <!-- User Info -->
                <x-post.user-info :post="$post" />
                <!-- /User Info -->
              </div>

                <!-- Card Action Dropdown -->
                <x-post.card-action :post="$post" />
                <!-- /Card Action Dropdown -->
            </div>
          </header>

          <!-- Content -->
          <div class="py-4 text-gray-700 font-normal">
            <p>
                {!! $post->body !!}
            </p>
          </div>

          <!-- Date Created & View Stat -->

          <x-post-mata.date-view-info :post="$post" >
             <span>{{ $comments->count() }} comments</span>
            <span class="">•</span>

          </x-post-mata.date-view-info >


          <hr class="my-6">

          <!-- Barta Create Comment Form -->
            <x-post.comment-from :post="$post" />
          <!-- /Barta Create Comment Form -->

          <!-- /Barta Card Bottom -->
        </article>
        <!-- /Barta Card -->

        <hr>
        <div class="flex flex-col space-y-6">
          <h1 class="text-lg font-semibold">Comments ({{ $comments->count() }})</h1>

          <!-- Barta User Comments Container -->
          <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-2 sm:px-6 min-w-full divide-y">
              @foreach ($comments as $comment)
            <!-- Comments -->


            <div class="py-4">
              <!-- Barta User Comments Top -->
              <header>
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-3">
                    <!-- User Info -->
                    <x-post.comment-user-info :comment="$comment" />
                    <!-- /User Info -->
                  </div>
                </div>
              </header>

              <!-- Content -->
              <div class="py-4 text-gray-700 font-normal">
                <p>{{ $comment->comment }}</p>
              </div>

              <!-- Date Created -->
              <div class="flex items-center gap-2 text-gray-500 text-xs">
                <span class="">6m ago</span>
              </div>
            </div>
            <!-- /Comment 1 -->


            @if ($comment->user_id == auth()->user()->id)

            <!-- Card Action Dropdown -->
              <x-post.card-action :post="$post" />
            <!-- /Card Action Dropdown -->
            @endif
                </div>
              </header>


              @endforeach
            </article>
          <!-- /Barta User Comments -->
        </div>
      </section>
      <!-- /Newsfeed -->
    </main>


@endsection
