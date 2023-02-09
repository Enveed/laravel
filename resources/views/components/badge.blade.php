@if (!isset($show) || $show)
    <span style="background-color: #28a745;" class="badge badge-{{ $type ?? 'success' }}">{{ $slot }}</span>
@endif
