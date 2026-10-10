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

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Ask BIIGLE Events
                <span class="pull-right">{{ number_format($askBiigleEventTotal) }}</span>
            </h3>
        </div>
        @if ($askBiigleEventTotal > 0)
            {{-- The Ask BIIGLE events are independent counts and not parts of a whole,
                 so they are shown as a table and not as a pie chart. --}}
            <table class="table table-striped">
                <tbody>
                    @foreach ($askBiigleEventData as $event)
                        <tr>
                            <td>{{ $event['name'] }}</td>
                            <td class="text-right">{{ number_format($event['value']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="panel-body">
                <p class="text-muted">No Ask BIIGLE events have been collected yet.</p>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script type="module">
        biigle.$declare('metrics.labelBotEventData', {!! json_encode($labelBotEventData) !!});
    </script>
    {{vite_hot(base_path('vendor/biigle/metrics/hot'), ['src/resources/assets/js/admin.js'], 'vendor/metrics')}}
@endpush
