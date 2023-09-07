<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->posisi === 'SPV' || auth()->user()->posisi === 'Manajer' ? __('Approval') : __('Edit Product') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{ route('products.updateData', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (auth()->user()->posisi === 'SPV' || auth()->user()->posisi === 'Manajer')
            <div class="flex w-full mb-3">
                <div class="w-full">
                    <!-- Model -->
                    <div class="">
                        <div class="font-bold">
                            Model
                        </div>
                        <div>
                            <input type="text" name="model" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" placeholder="Model" readonly value="{{ $product->model }}">
                        </div>
                    </div>
                    <!-- LINE -->
                    <div class="">
                        <div class="font-bold">
                            Line
                        </div>
                        <div>
                            <input type="text" name="line" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" placeholder="Line" readonly value="{{ $product->line }}">
                        </div>
                    </div>
                    <!-- Start Date -->
                    <div class="">
                        <div class="font-bold">
                            Start Date
                        </div>
                        <div>
                            <input type="date" name="start_date" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" readonly value="{{ $product->start_date }}">
                        </div>
                    </div>
                    <!-- Planning Finished -->
                    <div class="">
                        <div class="font-bold">
                            Planning Finished
                        </div>
                        <div>
                            <input type="date" name="planning_finished" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" readonly value="{{ $product->planning_finished }}">
                        </div>
                    </div>
                    <!-- Target Check -->
                    <div class="">
                        <div class="font-bold">
                            Target Check
                        </div>
                        <div>
                            <input type="number" name="target_check" placeholder="Target Check" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" readonly value="{{ $product->target_check }}">
                        </div>
                    </div>
                    <!-- Finish Check -->
                    <div class="">
                        <div class="font-bold">
                            Finish Check
                        </div>
                        <div>
                            <input type="number" name="finish_check" placeholder="Finish Check" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" readonly value="{{ $product->finish_check }}">
                        </div>
                    </div>
                    <!-- Document -->
                    <div class="">
                        <div>
                            @if ($product->document)
                            <div class="mt-2">
                                <a href="{{ Storage::url($product->document) }}" class="text-blue-500 underline" target="_blank">Lihat File</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <br>
                    <hr>
                    <!-- Approval -->
                    <div class="">
                        <div class="font-bold">
                            Approval
                        </div>
                        <div>
                            @if (auth()->user()->posisi === 'SPV')
                            <select name="approval" required class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md">
                                <option value="" selected disabled>Select</option>
                                <option value="Approved by SPV">Approved</option>
                                <option value="Decline">Decline</option>
                            </select>
                            @elseif (auth()->user()->posisi === 'Manajer')
                            <select name="approval" required class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md">
                                <option value="" selected disabled>Select</option>
                                <option value="Approved by Manager">Approved</option>
                                <option value="Decline">Decline</option>
                            </select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="flex w-full mb-3">
                <div class="w-full">
                    <!-- Model -->
                    <div class="">
                        <div class="font-bold">
                            Model
                        </div>
                        <div>
                            <input type="text" name="model" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" placeholder="Model" value="{{ $product->model }}">
                        </div>
                    </div>
                    <!-- LINE -->
                    <div class="">
                        <div class="font-bold">
                            Line
                        </div>
                        <div>
                            <input type="text" name="line" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" placeholder="Line" value="{{ $product->line }}">
                        </div>
                    </div>
                    <!-- Start Date -->
                    <div class="">
                        <div class="font-bold">
                            Start Date
                        </div>
                        <div>
                            <input type="date" name="start_date" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" value="{{ $product->start_date }}">
                        </div>
                    </div>
                    <!-- Planning Finished -->
                    <div class="">
                        <div class="font-bold">
                            Planning Finished
                        </div>
                        <div>
                            <input type="date" name="planning_finished" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" value="{{ $product->planning_finished }}">
                        </div>
                    </div>
                    <!-- Target Check -->
                    <div class="">
                        <div class="font-bold">
                            Target Check
                        </div>
                        <div>
                            <input type="number" name="target_check" placeholder="Target Check" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" value="{{ $product->target_check }}">
                        </div>
                    </div>
                    <!-- Finish Check -->
                    <div class="">
                        <div class="font-bold">
                            Finish Check
                        </div>
                        <div>
                            <input type="number" name="finish_check" placeholder="Finish Check" class="w-11/12 md:w-8/12 lg:w-4/12 border-2 border-gray-300 px-2 py-1 rounded-md" value="{{ $product->finish_check }}">
                        </div>
                    </div>
                    <!-- Document -->
                    <div class="">
                        <div class="font-bold">
                            Document
                        </div>
                        <div>
                            @if ($product->document)
                            <div class="mt-2">
                                <a href="{{ Storage::url($product->document) }}" class="text-blue-500 underline" target="_blank">Lihat File</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <input type="submit" value="Simpan" class="p-2 bg-green-300 inline-block font-bold text-white mx-2 rounded-md cursor-pointer hover:bg-green-500">
        </form>
    </div>
</x-app-layout>