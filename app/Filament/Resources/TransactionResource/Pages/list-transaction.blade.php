@extends('filament::resources.pages.list-records')

@section('content')
    {{ $this->table }}
@endsection

@section('scripts')
<script>
    window.addEventListener('showPrintOptions', event => {
        const id = event.detail.id;
        if (confirm("Klik OK untuk Print langsung, Cancel untuk Download PDF")) {
            window.open(`/admin/transactions/${id}/print`, '_blank').focus();
        } else {
            window.open(`/admin/transactions/${id}/download-pdf`, '_blank').focus();
        }
    });
</script>

@endsection
