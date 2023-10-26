<div class= "container">
@include('commons.error_messages')
    <form method="POST" id="form1" action="{{ route('gpt') }}">
        @csrf
        <div class="form-group mt-3">
            <div class="form-group">
                <label for="title">あなたの好きな風景をもとにAIが提案</label>
                <br>
                <input type="text" id="sbox" class="form-controll w-50" placeholder="海のきれいな場所・満点の星空が見える場所・静かな森" name="sentence">
                <input type="submit" id="sbtn" value="探す" class="ml-3">
            </div>    
        </div>
    </form>
</div>


