<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="alert" >

        <h1 id="dt">{{now()->format('g:i:s A')}}</h1>

    </div>

    @push('script')
        <script>
            function getRandomColor() {
                const hexLetters = 'abcdef1234567890';
                let hex = '#';
                for (let i = 1; i <= 6; i++) {
                    hex += hexLetters[Math.floor(Math.random() * hexLetters.length)];
                }
                return hex;
            }
            let dt = document.getElementById('dt')

            setInterval(function () {
                let date = new Date();
                date = date.toLocaleTimeString()
                dt.innerText = date
               dt.style.color = getRandomColor()

            },1000)
            dt.addEventListener('mouseenter',function () {
                dt.style.transform = 'scale(1.5)'
                dt.style.fontWeight = '900'

            })
            dt.addEventListener('mouseout',function () {
                dt.style.transform = 'scale(1)'
                dt.style.fontWeight = '500'

            })
        </script>
    @endpush

</x-app-layout>
