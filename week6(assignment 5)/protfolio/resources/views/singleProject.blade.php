@include('components.header')
<section>

@foreach ($allProject as $project)
    @php
     $Urlname = strtolower($project['name']);
     $imageUrl = $project['image']
    @endphp
    @if($Urlname === $projectName)
        <div class="details-container color-container">
                        <div class="article-container">
                            <img
                                src="{{asset($imageUrl)}}"
                                alt="Project 1"
                                class="project-img"
                            />
                        </div>
                        <h2 class="experience-sub-title project-title">
                            {{$project['name']}}
                        </h2>
                        <p>{{$project['Description']}}</p>
        </div>




    @endif

@endforeach
@include('components.footer')

</section>
