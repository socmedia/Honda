<a href="{{$link}}" {{ $attributes }}
    class=" bg-white rounded-lg shadow ease-out transition-transform transition-medium py-3 px-3 w-full flex items-center focus:outline-none focus-visible:underline">
    {{$icon}}
    <span class="ml-2 font-medium transition-all ease-out transition-medium text-gray-700">
        {{$slot}}
    </span>
</a>
