@extends('admin.base')

@section('title', 'Metrics admin area')

@section('admin-content')
    <h2>Metrics</h2>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                LabelBOT Events
                <span class="pull-right">{{ number_format($labelBotEventTotal) }}</span>
            </h3>
        </div>
        <div class="panel-body">
            @if ($labelBotEventTotal > 0)
                <div id="metrics-labelbot-events">
                    <pie-chart v-bind:data="data"></pie-chart>
                </div>
            @else
                <p class="text-muted">No LabelBOT events have been collected yet.</p>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        biigle.$declare('metrics.labelBotEventData', {!! json_encode($labelBotEventData) !!});
    </script>
    {{vite_hot(base_path('vendor/biigle/metrics/hot'), ['src/resources/assets/js/admin.js'], 'vendor/metrics')}}
@endpush
