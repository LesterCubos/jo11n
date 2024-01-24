<div class="form-group row">
    <label class="col-sm-3 col-form-label" style="font-size: 16px; color: #000; font-weight: bolder">STATUS</label>
    <div class="col-md-6 row">
        @foreach($options as $option)
            <div class="col-sm-4">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="{{ $option }}" wire:click="radioClicked('{{ $option }}')" wire:model="selectedStatus">
                    {{ $option }}
                    <i class="input-helper"></i></label>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <div>Answer: {{ $selectedStatus }}</div> --}}
</div>