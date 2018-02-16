<h1>Facilites</h1>

<ul>
@foreach ( $facilities as $facility )
    <li> <a href="/facilities/{{ $facility->id }}">{{ $facility->name }} Modified at: {{ $facility->updated_at }} </a> </li>
 @endforeach

 </ul>