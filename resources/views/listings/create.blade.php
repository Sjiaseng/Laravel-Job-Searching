
<x-layout>

    <x-card class="bg-gray-50 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1"> 
                Create a Gig
            </h2>
            <p class="mb-4"> Post a Gig to Find a Developer </p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for= "company" class = "inline-block text-lg mb-2">
                    Company name
                </label>
                <input type="text" placeholder="Abc Company" class="border border-gray-200 rounded p-2 w-full" name="company" value="{{old('company')}}" />

                @error('company')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror

            </div>

            <div class = "mb-6">
                <label for = "title" class= "inline-block text-lg mb-2">
                    Job Title
                </label>
                <input type="text" placeholder="Software Engineer" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}" />
                
                @error('title')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror

            </div>

            <div class = "mb-6">
                <label for = "location" class= "inline-block text-lg mb-2">
                    Job Location
                </label>
                <input type="text" placeholder="California, US" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{old('location')}}" />
            
                @error('location')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror

            </div>

            <div class = "mb-6">
                <label for = "email" class= "inline-block text-lg mb-2">
                    Contact Email
                </label>
                <input type="text" placeholder="abc@gmail.com" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
                
                @error('email')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror            
            
            </div>

            <div class = "mb-6">
                <label for = "website" class= "inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" placeholder="https://..." class="border border-gray-200 rounded p-2 w-full" name="website" value="{{old('website')}}"/>
                
                @error('website')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror            
            
            </div>

            <div class = "mb-6">
                <label for = "tags" class= "inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" placeholder="Laravel, Backend, Postgres, etc" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{old('tags')}}" />
            
                @error('tags')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror            
            
            </div>

            <div class = "mb-6">
                <label for = "logo" class= "inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" value="{{old('logo')}}" />
            
                @error('logo')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror                 
            
            </div>

            <div class = "mb-6">
                <label for = "description" class= "inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc" value="{{old('description')}}"></textarea>
                
                @error('description')
                    <p class="text-red-500 text-xs mt1">{{$message}}</p>
                @enderror            
            
            </div>
            
            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            <div>
        </form>
    </x-card>

</x-layout>
