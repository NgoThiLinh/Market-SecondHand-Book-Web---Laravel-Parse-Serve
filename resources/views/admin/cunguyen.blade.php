<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal">
        {{ __('cunguyen_welcome')}}               
    </p>

    <a href="{{ url('/') }}">
        <button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
        {{ __('gohome')}}  
        </button>
    </a>
    <a href="{{ route('change-language',['language' => 'vi']) }}">
        <button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
        {{ __('vietnamese')}}  
        </button>
    </a>
    <a href="{{ route('change-language',['language' => 'en' ]) }}">
        <button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
        {{ __('english')}}  
        </button>
    </a>
    <a href="{{ route('send') }}">
        <button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
        Send mail
        </button>
    </a>

    <form action="{{ url('admin/cunguyen') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="filesTest" required="true">
        <br/>
        <input type="submit" value="upload">
    </form>
    <br>


    <select name="country" class="countries" id="countryId">
        <option value="">Chọn tỉnh</option>
        @foreach($city as $newdata)

            @foreach($newdata as $hi)
                <option value="">{{$hi['name']}}</option>
            @endforeach
        @endforeach
    </select>

   

  

    <select name="state" class="states" id="stateId">
        <option value="">Chọn huyện</option>
    </select>

    <select name="city" class="cities" id="cityId">
        <option value="">Chọn xã</option>
    </select>

    

</body>
</html>