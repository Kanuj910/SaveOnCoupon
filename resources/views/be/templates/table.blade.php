@if(isset($data['list'][0]))
<table class="table">
    <tr>
    @foreach($data['list'][0] as $key=>$val)
        <th>{{ $key }}</th>
    @endforeach
    </tr>            
    @foreach($data['list'] as $key) 
    <tr>
        @foreach($key as $key2=>$key1)

        @if($key2=='edit')
        <td><a href="{{ route($data['editroute'],$key1) }}" class="btn btn-sm btn-default">Edit</a></td>
        @elseif($key2=='image_url')
        <td><img src="images/store/125/{{ $key1 }}" width="64"></td>        
        @elseif($key2=='IsActive')
        <td><span class='glyphicon glyphicon-{{($key1==1)?"ok":"remove"}}' style="color:{{($key1==1)?"green":"red"}};"></span></td>
        @else
        <td>{{ $key1 }}</td>
        @endif
            
        @endforeach
    </tr>            
    @endforeach
</table>
@endif