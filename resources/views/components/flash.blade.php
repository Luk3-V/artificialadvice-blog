@if (session()->has('success'))
    <div class="inline-flex fixed bottom-4 right-4 bg-blue-500 text-white rounded-md py-2 px-4 text-sm"
        x-data="{ show:true }" x-init="setTimeout(() => show=false, 5000)" x-show="show">
        <p>{{ session('success') }}</p>

        <x-icon class="ml-2"
            name="close" @click="show = false"/>
    </div>
@endif