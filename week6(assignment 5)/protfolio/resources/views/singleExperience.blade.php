@include('components.header')
{{-- @dd($skill,$skillsDescription) --}}
<section>
@foreach ($skillsDescription as $singleSkill)
    @php
       $name = strtolower($singleSkill['name']);

    @endphp
    @if ($name === $skill)
        <h1>{{$name}}</h1>
        <h3> Year of Experience {{$singleSkill['year_of_experience']}}</h3>
        <h6>proficiency {{$singleSkill['proficiency']}}</h6>
        @php
            break;
        @endphp

    {{-- @else
        <p>Please provide a vilid url</p>
        @php
            break;
        @endphp --}}
        

    @endif




@endforeach
</section>
@include('components.footer')
