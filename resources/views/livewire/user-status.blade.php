<div>
    <label class="toggle-switch">
        <input wire:model.lazy="isActive" type="checkbox" role="switch" @if($isActive) checked @endif >
        <span class="toggle-slider round"></span>
    </label>  
</div>
