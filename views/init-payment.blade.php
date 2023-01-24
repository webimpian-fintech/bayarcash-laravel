<style>
    #FPXloaderDiv {
        position:fixed;
        z-index:500;
        left:0;
        top:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.25);
        background-image:url('{{ asset('/vendor/bayarcash-laravel/images/bayarcash-loader.svg') }}');
        background-repeat:no-repeat;
        background-position:center;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }
</style>

<div id="FPXloaderDiv" style="">
    <h4 style="margin-top:12em;">Processing...</h4>
</div>

<form id="FPXpaymentForm" method="POST" action="{{ $api_url }}">
    
    @foreach ($data as $row => $value)
        <input name="{{ $row }}" type="hidden" value="{{ $value }}">
    @endforeach
    
    <input id="fpxSubmitBtn" type="submit" class="button alt" value="Proceed" style="display: none;">
</form>

<script>
    document.getElementById("FPXpaymentForm").submit();
</script>
