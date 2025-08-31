<div class="flex items-center {{ $bgColor }} border 
            hover:from-slate-50 hover:to-blue-300
            px-1 py-1.5 rounded-md shadow space-x-2 transition-colors">
    <div class="{{ $iconColor }} p-1 rounded-md">
        {!! $icon !!}
    </div>
    <span class="font-semibold text-sm text-slate-700">{!! $btnText !!}</span>
</div>
