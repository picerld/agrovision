<x-guest-layout>
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex items-end h-32 bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt=""
                    src="{{ asset('images/agrovision.jpg') }}"
                    class="absolute inset-0 object-cover w-full h-full opacity-50" />

                <div class="hidden lg:relative lg:block lg:p-12">
                    <a class="block text-white" href="#">
                        <span class="sr-only">Home</span>
                        {{-- <h4 class="text-sm italic font-bold">Agrovision Technology</h4> --}}
                    </a>
                    
                    <h2 class="mt-2 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Sebelas Cipta Mandiri
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                        Platform digital (Agrovision) yang memberikan kemudahan bagi petani untuk mengelola
                        pendistribusian bibit dan pupuk secara digital.
                    </p>
                </div>
            </section>

            <main
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="w-full max-w-md">
                    <!-- Form title -->
                    <div class="flex flex-col items-center">
                        <h2 class="mb-4 text-3xl font-semibold text-gray-800">Login to Agrovision</h2>
                        <p class="text-gray-600">Enter your username below to login to your account.</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST" class="grid grid-cols-6 gap-6 mt-8">
                        @csrf
                        <div class="col-span-6">
                            <label for="Username" class="block text-sm font-medium text-gray-700"> Username </label>

                            <input type="text" id="Username" name="username" placeholder="agrovision"
                                class="w-full mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>

                            <input type="password" id="Password" name="password" placeholder="*******"
                                class="w-full mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- <div class="col-span-6">
                            <label for="MarketingAccept" class="flex gap-4">
                                <input type="checkbox" id="MarketingAccept" name="marketing_accept"
                                    class="bg-white border-gray-200 rounded-md shadow-sm size-5" />
    
                                <span class="text-sm text-gray-700">
                                    I want to receive emails about events, product updates and company announcements.
                                </span>
                            </label>
                        </div> --}}

                        <div class="col-span-6">
                            <p class="text-sm text-gray-500">
                                By logging in, you agree to our
                                <a href="#" class="text-gray-700 underline"> terms and conditions </a>
                                and
                                <a href="#" class="text-gray-700 underline">privacy policy</a>.
                            </p>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button
                                class="w-full text-sm font-medium text-white normal-case bg-black rounded-lg shadow-md btn hover:bg-gray-800 btn-lg">
                                Sign in with Username
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-guest-layout>
