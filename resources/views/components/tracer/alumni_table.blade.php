@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $tracers */
@endphp

<div class="bg-white p-8 rounded-[40px] shadow-2xl border border-gray-100">
    <div class="p-8 bg-gray-50 border-b mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Data Alumni</h2>
        <p class="text-gray-500 mt-2">Tracer study alumni untuk akreditasi sekolah</p>
    </div>


    @if($tracers->count() === 0)
        <p class="text-gray-500 text-center py-12">Belum ada data tracer alumni.</p>
    @else
        @php
            $perRow = 5;
            $buffer = [];
        @endphp

        @foreach($tracers as $tracer)
            @php $buffer[] = $tracer; @endphp

            @if(count($buffer) === $perRow)
            <div class="grid" style="grid-template-columns: repeat(5, 1fr); gap: 4px; margin-bottom: 6px;">
                @foreach($buffer as $t)
                        <div class="bg-white border border-gray-100 p-1.5 rounded-lg">
                            <div class="flex items-center gap-1">
                                <span class="text-[11px] font-semibold text-gray-800 truncate">
                                    {{ $t->nama }}
                                </span>
                                <span class="text-[9px] leading-none px-1 py-0.5 bg-emerald-100 text-emerald-800 rounded-full font-bold whitespace-nowrap">
                                    {{ $t->status }}
                                </span>
                            </div>
                            <div class="text-[11px] text-gray-700 truncate leading-tight">
                                {{ $t->pekerjaan_kuliah }} ({{ $t->angkatan }})
                            </div>
                            @if($t->detail)
                                <div class="text-[10px] text-gray-500 italic truncate leading-tight">
                                    {{ $t->detail }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @php $buffer = []; @endphp
            @endif
        @endforeach

        @if(count($buffer) > 0)
            <div class="grid" style="grid-template-columns: repeat(5, 1fr); gap: 4px; margin-bottom: 6px;">
                @foreach($buffer as $t)
                    <div class="bg-white border border-gray-100 p-1.5 rounded-lg">
                        <div class="flex items-center gap-1">
                            <span class="text-[11px] font-semibold text-gray-800 truncate">
                                {{ $t->nama }}
                            </span>
                            <span class="text-[9px] leading-none px-1 py-0.5 bg-emerald-100 text-emerald-800 rounded-full font-bold whitespace-nowrap">
                                {{ $t->status }}
                            </span>
                        </div>
                        <div class="text-[11px] text-gray-700 truncate leading-tight">
                            {{ $t->pekerjaan_kuliah }} ({{ $t->angkatan }})
                        </div>
                        @if($t->detail)
                            <div class="text-[10px] text-gray-500 italic truncate leading-tight">
                                {{ $t->detail }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    @endif

    <div class="mt-6">{{ $tracers->links() }}</div>

</div>



