<div class="my-4">
    @empty(!$selected)
    <div class="alert alert-info">
        {{ $nombre }}  {{ $email_cuenta }}
    </div>
    <input type="hidden" name="cuenta_id" value="{{ $cuenta_id }}" />
    @endempty
    <div class="search-box">
        <div class="form-floating">
            <input class="form-control" autofocus name="search" autocomplete="off" wire:model="search" wire:keyup="SearchResult" placeholder="Buscar cuenta..."/>
            <label>Buscar cuenta</label>
        </div>
    </div>
        @if($showdiv)
        <ul class="list-group" >
            @if(!empty($cuentas))
                @foreach($cuentas as $c)
                <li class="list-group-item" role="button" wire:click="SelectCuenta({{ $c->id }})">{{ $c->nombre }} {{ $c->email_cuenta}} </li>
                @endforeach
            @endif
        </ul>
        @endif
</div>
