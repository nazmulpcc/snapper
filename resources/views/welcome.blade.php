@extends('layouts.app')

@section('content')
    <div class="px-4 py-8 sm:px-0">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Enter a page url
                </h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>
                        We will create a pdf with your given link bla bla bala
                    </p>
                </div>
                <form class="mt-5 sm:flex sm:items-center" method="POST">
                    @csrf
                    <div class="w-full sm:max-w-xs">
                        <label for="url" class="sr-only">URL</label>
                        <input type="text" name="url" id="url" value="{{ request('url') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="https://google.com">
                    </div>
                    <button type="submit" class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Generate
                    </button>
                    <button type="submit" class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Customize
                    </button>
                </form>
                @isset($file)
                <div class="border-t -mx-6 px-4 pt-5 border-gray-200">
                    <a href="{{ url("storage/images/{$file}.png") }}">
                        <button class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Download Image
                        </button>
                    </a>
                    <a href="{{ url("storage/pdf/{$file}.pdf") }}">
                        <button class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Download PDF
                        </button>
                    </a>
                </div>
                @endisset
            </div>
        </div>

    </div>
@endsection
