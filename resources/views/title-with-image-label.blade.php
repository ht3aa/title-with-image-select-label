<div>
    <div class="flex items-center gap-2">
        @if ($image)
        <div>
            <div >
                <img src="{{ $image }}" alt="{{ $title }}" role="img" class="w-{{ $width ?? '20' }}" />
            </div>
        </div>
        @endif
 
        <div>
            <p >{{ $title }}</p>
        </div>
    </div>
</div>
