<div class="text-gray-900 flex flex-col min-w-0 flex-1">
                  <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
                     {{ $comment->firstName .' '. $comment->lastName  }}
                  </a>

                  <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                     {{ '@'.$comment->username }}
                  </a>
</div>
