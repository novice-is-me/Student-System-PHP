<x-layouts.app>
<div class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign Up</h2>
  </div>
  
  <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{ route('register') }}" method="POST">
      @csrf
      <div>
        <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name:</label>
        <div class="mt-2">
          <input id="first_name" name="first_name" type="first_name" autocomplete="first_name" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      <div>
        <div class="flex items-center justify-between">
          <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name:</label>
        </div>
        <div class="mt-2">
          <input id="last_name" name="last_name" type="last_name" autocomplete="last_name" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      <div>
        <div class="flex items-center justify-between">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email:</label>
        </div>
        <div class="mt-2">
          <input id="email" name="email" type="email" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="new-password" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      <div>
        <div class="flex items-center justify-between">
          <label for="password-confirm" class="block text-sm font-medium leading-6 text-gray-900  @error('password') is-invalid @enderror">Confirm Password</label>
        </div>
        <div class="mt-2">
          <input id="password-confirm" name="password_confirmation" type="password" autocomplete="new-password" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      @error('password')
      <span class="itext-red-400 italic text-sm" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror 
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
      </div>
    </form>
  </div>
</div>
</form>  
</x-layouts.app>
